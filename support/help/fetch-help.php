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

    // Build "See also" from keywords (excluding common terms)
    $seeAlso = array_filter($keywords, function($kw) {
        return !in_array(strtolower($kw), ['general', 'misc', 'miscellaneous']);
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

    // Add body content
    $output .= '<div class="help-body">' . $html . '</div>';

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

