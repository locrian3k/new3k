<?php
/**
 * Help File Content Fetcher
 *
 * This endpoint fetches help file content for display in the modal.
 * It reads from the MUD-exported helpdocs file and parses the
 * 3K help file format with metadata headers and color codes.
 *
 * Usage: fetch-help.php?topic=alias
 * Returns: JSON with formatted HTML content or error
 */

header('Content-Type: application/json');

// Load configuration and functions
$config = include __DIR__ . '/config.php';
include __DIR__ . '/functions.php';

// Get the requested topic
$topic = isset($_GET['topic']) ? trim($_GET['topic']) : '';

// Validate topic
// Allow alphanumeric, underscores, hyphens, and specific special chars (!, ?, ')
// Block path traversal characters (.., /, \) and other dangerous chars
if (empty($topic) ||
    !preg_match('/^[a-zA-Z0-9_\-!?\' ]+$/', $topic) ||
    preg_match('/\.\./', $topic)) {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid topic specified'
    ]);
    exit;
}

// Find the topic in the helpdocs file
$helpdocsFile = $config['helpdocs_file'] ?? '';
$rawContent = findTopicInHelpdocs($topic, $helpdocsFile);

if ($rawContent === false) {
    echo json_encode([
        'success' => false,
        'error' => 'Help file not found: ' . $topic
    ]);
    exit;
}

// Parse the 3K help file format
$parsed = parseHelpFile($rawContent, $config);

echo json_encode([
    'success' => true,
    'topic' => $topic,
    'header' => $parsed['header'],
    'content' => $parsed['html'],
    'keywords' => $parsed['keywords'],
    'seeAlso' => $parsed['seeAlso'],
    'source' => 'local'
]);

/**
 * Parse a 3K help file format
 *
 * Format:
 * keywords: word1, word2, word3
 * aliases: alias1, alias2
 * short: Short description
 * header: Display Header Title
 *
 * Body content here with @color:'text'@ markup
 *
 * @param string $content Raw file content
 * @param array $config Configuration array for file validation
 * @return array Parsed data with 'header', 'html', 'keywords', 'seeAlso'
 */
function parseHelpFile($content, $config = []) {
    $lines = explode("\n", $content);
    $metadata = [];
    $bodyLines = [];
    $inBody = false;

    // Parse metadata and body
    foreach ($lines as $line) {
        if (!$inBody) {
            // Check for metadata lines
            if (preg_match('/^(keywords|aliases|short|header):\s*(.*)$/i', $line, $matches)) {
                $key = strtolower($matches[1]);
                $metadata[$key] = trim($matches[2]);
                continue;
            }
            // Empty line or non-metadata line starts the body
            if (trim($line) === '' && empty($metadata)) {
                continue; // Skip leading empty lines
            }
            if (!preg_match('/^[a-z]+:/i', $line)) {
                $inBody = true;
            }
        }

        if ($inBody) {
            $bodyLines[] = $line;
        }
    }

    // Get header and keywords
    $header = $metadata['header'] ?? '';
    $keywords = [];
    if (!empty($metadata['keywords'])) {
        $keywords = array_map('trim', explode(',', $metadata['keywords']));
    }

    // Build "See also" from keywords (excluding category labels)
    // These are MUD help topic categories, not individual help files
    $categoryKeywords = [
        'important', 'general', 'basic', 'color',
        'combat', 'guilds', 'souls', 'miscellaneous', 'misc',
        'highmort', 'highmortal', 'wizard', 'mortal'
    ];
    $seeAlso = array_filter($keywords, function($kw) use ($categoryKeywords) {
        return !in_array(strtolower($kw), $categoryKeywords);
    });

    // Process body content
    $body = implode("\n", $bodyLines);
    $body = trim($body);

    // Remove decorative "Topic:" sections (different from header: metadata)
    // Format: @color:::::...:::::\n    Topic: name\n:::::...::::@\n
    // These are decorative headers that duplicate the header: metadata
    // Pattern 1: Lines that are just colons with optional @color prefix/suffix
    $body = preg_replace('/^@?[a-z]*:*::{4,}:*@?\s*$/im', '', $body);
    // Pattern 2: Lines with "Topic:" preceded by whitespace (indented topic lines)
    $body = preg_replace('/^\s+Topic:\s*[^\n]+$/im', '', $body);
    // Clean up any resulting multiple blank lines
    $body = preg_replace('/\n{3,}/', "\n\n", $body);
    $body = trim($body);

    // Extract "See Also:" from body content if present
    $bodySeeAlso = [];
    if (preg_match('/@?yellow:?\'?See\s+Also:\s*([^@\']+)\'?@?|See\s+Also:\s*(.+)$/im', $body, $seeAlsoMatch)) {
        // Get the matched topics (either from colored or plain format)
        $topicsStr = !empty($seeAlsoMatch[1]) ? $seeAlsoMatch[1] : ($seeAlsoMatch[2] ?? '');
        // Parse comma-separated topics
        $bodySeeAlso = array_map('trim', explode(',', $topicsStr));
        // Clean up any trailing punctuation
        $bodySeeAlso = array_map(function($t) {
            return rtrim(trim($t), '.');
        }, $bodySeeAlso);
        // Filter out empty values
        $bodySeeAlso = array_filter($bodySeeAlso);

        // Remove the "See Also:" line from the body since we'll add it formatted
        $body = preg_replace('/@?yellow:?\'?See\s+Also:\s*[^@\']+\'?@?\s*$/im', '', $body);
        $body = preg_replace('/See\s+Also:\s*.+$/im', '', $body);
        $body = trim($body);
    }

    // Merge keywords-based and body-based see also lists
    $seeAlso = array_unique(array_merge(array_values($seeAlso), $bodySeeAlso));

    // Convert to HTML
    $html = formatHelpContent($body, $header, $seeAlso, $config);

    return [
        'header' => $header,
        'html' => $html,
        'keywords' => $keywords,
        'seeAlso' => $seeAlso
    ];
}

/**
 * Format help content to HTML with styling
 *
 * @param string $body The body content
 * @param string $header The header title
 * @param array $seeAlso Related topics
 * @param array $config Configuration array for file validation
 * @return string Formatted HTML
 */
function formatHelpContent($body, $header, $seeAlso, $config = []) {
    // Escape HTML entities first
    $html = htmlspecialchars($body, ENT_QUOTES, 'UTF-8');

    // Parse color codes: @color:'text'@ or @color:text@
    // Common colors: hired (red), yellow, green, blue, cyan, magenta, white, bold
    $colorMap = [
        'hired' => 'help-color-red',
        'red' => 'help-color-red',
        'yellow' => 'help-color-yellow',
        'green' => 'help-color-green',
        'blue' => 'help-color-blue',
        'cyan' => 'help-color-cyan',
        'magenta' => 'help-color-magenta',
        'white' => 'help-color-white',
        'bold' => 'help-color-bold',
        'orange' => 'help-color-orange'
    ];

    // Match @color:'text'@ or @color:text@ patterns
    $html = preg_replace_callback(
        "/@([a-z]+):'([^']*)'@|@([a-z]+):([^@]*)@/i",
        function($matches) use ($colorMap) {
            // Determine which capture group matched
            if (!empty($matches[1])) {
                $color = strtolower($matches[1]);
                $text = $matches[2];
            } else {
                $color = strtolower($matches[3]);
                $text = $matches[4];
            }

            $class = $colorMap[$color] ?? 'help-color-default';
            return '<span class="' . $class . '">' . $text . '</span>';
        },
        $html
    );

    // Build the complete formatted output
    $output = '';

    // Add header with decorative border
    if (!empty($header)) {
        $borderLine = str_repeat(':', 70);
        $headerPadded = str_pad($header, 60, ' ', STR_PAD_BOTH);
        $output .= '<div class="help-header-box">';
        $output .= '<span class="help-border">' . $borderLine . '</span>' . "\n";
        $output .= '<span class="help-header-title">' . htmlspecialchars($headerPadded) . '</span>' . "\n";
        $output .= '<span class="help-border">' . $borderLine . '</span>';
        $output .= '</div>' . "\n";
    }

    // Convert body text into structured HTML
    // The raw text has paragraphs (separated by blank lines), bullet lists (* and -),
    // command examples (lines starting with >), and aligned/table data.
    // We convert these to proper HTML so they wrap naturally on mobile.
    $bodyHtml = convertHelpBodyToHtml($html);
    $output .= '<div class="help-body">' . $bodyHtml . '</div>';

    // Add "See also" section
    if (!empty($seeAlso)) {
        // Sort alphabetically
        $seeAlso = array_values($seeAlso);
        sort($seeAlso, SORT_STRING | SORT_FLAG_CASE);

        $seeAlsoLinks = [];
        foreach ($seeAlso as $topic) {
            $topic = trim($topic);
            if (empty($topic)) continue;

            // Check if this topic exists in our help system
            $topicExists = false;
            if (!empty($config)) {
                $topicExists = topicExistsInHelp($topic, $config);
            }

            if ($topicExists) {
                // Create a clickable button for existing topics
                $seeAlsoLinks[] = '<button type="button" class="help-see-also-link" data-topic="' . htmlspecialchars($topic) . '">' . htmlspecialchars($topic) . '</button>';
            } else {
                // Display as plain text (styled but not clickable) for non-existent topics
                $seeAlsoLinks[] = '<span class="help-see-also-text">' . htmlspecialchars($topic) . '</span>';
            }
        }

        if (!empty($seeAlsoLinks)) {
            $output .= "\n" . '<div class="help-see-also">';
            $output .= '<span class="help-color-yellow">See also:</span>  ';
            $output .= implode(', ', $seeAlsoLinks) . '.';
            $output .= '</div>';
        }
    }

    return $output;
}

/**
 * Convert help body text into structured HTML
 *
 * Splits text on blank lines into paragraph blocks, then detects whether
 * each block is a bullet list, pre-formatted/aligned data, or a regular
 * paragraph. This produces proper HTML that wraps on mobile instead of
 * requiring horizontal scrolling (like <pre> would).
 *
 * @param string $html Body text (already HTML-escaped with color spans applied)
 * @return string Structured HTML with <p>, <ul>, <li>, <br>, etc.
 */
function convertHelpBodyToHtml($html) {
    // Split on blank lines (two or more newlines) to get paragraph blocks
    $blocks = preg_split('/\n{2,}/', $html);
    $bodyHtml = '';

    foreach ($blocks as $block) {
        $block = trim($block);
        if (empty($block)) continue;

        $lines = explode("\n", $block);

        // Detect block type by checking what the lines look like
        if (isListBlock($lines)) {
            $bodyHtml .= convertListBlock($lines);
        } elseif (isPreformattedBlock($lines)) {
            $bodyHtml .= '<div class="help-pre">' . $block . '</div>';
        } else {
            $bodyHtml .= convertParagraphBlock($lines);
        }
    }

    return $bodyHtml;
}

/**
 * Check if a block of lines looks like a bullet list
 *
 * A block is a list if at least one line starts with whitespace followed
 * by * or - and then a space (bullet markers).
 *
 * @param array $lines Lines of text
 * @return bool True if this block contains bullet items
 */
function isListBlock($lines) {
    foreach ($lines as $line) {
        if (preg_match('/^\s+[\*\-]\s/', $line)) {
            return true;
        }
    }
    return false;
}

/**
 * Check if a block looks like pre-formatted/aligned data
 *
 * Detects table-like content where lines are aligned with multiple spaces
 * between columns (e.g., the purge level table). A block qualifies if
 * most lines start with whitespace AND contain internal gaps of 2+ spaces
 * between words (column alignment).
 *
 * @param array $lines Lines of text
 * @return bool True if this block looks like aligned/tabular data
 */
function isPreformattedBlock($lines) {
    if (count($lines) < 2) return false;

    $alignedCount = 0;
    $nonEmptyCount = 0;

    foreach ($lines as $line) {
        if (trim($line) === '') continue;
        $nonEmptyCount++;

        // Line starts with whitespace AND has internal multi-space gaps (column alignment)
        // or contains tab characters
        if ((preg_match('/^\s{2,}/', $line) && preg_match('/\S\s{3,}\S/', $line))
            || strpos($line, "\t") !== false) {
            $alignedCount++;
        }
    }

    // If most non-empty lines look aligned, treat as pre-formatted
    return ($nonEmptyCount > 0 && $alignedCount / $nonEmptyCount >= 0.6);
}

/**
 * Convert a bullet list block into HTML <ul><li> structure
 *
 * Handles lines starting with * or - as list items. Lines that don't start
 * with a bullet but are indented get appended to the previous list item
 * as continuation text. Non-list lines before or after the list portion
 * are output as paragraphs.
 *
 * @param array $lines Lines of text
 * @return string HTML with <ul>/<li> elements
 */
function convertListBlock($lines) {
    $html = '';
    $inList = false;
    $pendingText = [];

    foreach ($lines as $line) {
        $trimmed = trim($line);
        if ($trimmed === '') continue;

        // Is this a bullet line?
        if (preg_match('/^\s+[\*\-]\s+(.*)$/', $line, $match)) {
            // Flush any pending non-list text as a paragraph
            if (!empty($pendingText) && !$inList) {
                $html .= '<p>' . implode('<br>', $pendingText) . '</p>';
                $pendingText = [];
            }

            // Start list if not already in one
            if (!$inList) {
                $html .= '<ul>';
                $inList = true;
            }

            // Close previous <li> if there was one, start new
            if (!empty($pendingText)) {
                $html .= ' ' . implode('<br>', $pendingText);
                $pendingText = [];
            }
            // Check if there's already an open <li> to close
            if (strpos($html, '<li>') !== false && substr_count($html, '<li>') > substr_count($html, '</li>')) {
                $html .= '</li>';
            }
            $html .= '<li>' . trim($match[1]);
        } elseif ($inList) {
            // Continuation line inside a list - append to current <li>
            $html .= '<br>' . $trimmed;
        } else {
            // Regular text before the list starts
            $pendingText[] = $trimmed;
        }
    }

    // Close any open list
    if ($inList) {
        $html .= '</li></ul>';
    }

    // Flush any remaining text
    if (!empty($pendingText)) {
        $html .= '<p>' . implode('<br>', $pendingText) . '</p>';
    }

    return $html;
}

/**
 * Convert a regular paragraph block into HTML
 *
 * Wraps the block in <p> tags with single newlines converted to <br>.
 * Lines starting with > (MUD command examples) are wrapped in <code>.
 *
 * @param array $lines Lines of text
 * @return string HTML paragraph
 */
function convertParagraphBlock($lines) {
    $processed = [];

    foreach ($lines as $line) {
        $trimmedLine = trim($line);

        // MUD command example: >kill bandersnatch
        if (preg_match('/^&gt;(.*)$/', $trimmedLine, $match)) {
            $processed[] = '<code class="help-example">&gt;' . $match[1] . '</code>';
        } else {
            $processed[] = $line;
        }
    }

    return '<p>' . implode('<br>', $processed) . '</p>';
}

/**
 * Check if a topic exists in our help system
 *
 * Checks static categories first (fast), then the helpdocs file.
 *
 * @param string $topic The topic to check
 * @param array $config Configuration array
 * @return bool True if the topic exists
 */
function topicExistsInHelp($topic, $config) {
    $topicLower = strtolower($topic);

    // Check static categories first (fast, in-memory)
    $categories = $config['categories'] ?? [];
    foreach ($categories as $cat) {
        foreach ($cat['files'] as $file => $title) {
            if (strtolower($file) === $topicLower) {
                return true;
            }
        }
    }

    // Check helpdocs file (covers uncategorized topics)
    $helpdocsFile = $config['helpdocs_file'] ?? '';
    if (!empty($helpdocsFile)) {
        $content = findTopicInHelpdocs($topic, $helpdocsFile);
        return ($content !== false);
    }

    return false;
}

