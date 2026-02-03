<?php
/**
 * Help File Content Fetcher
 *
 * This endpoint fetches help file content for display in the modal.
 * It supports both local files and external URLs, and parses the
 * 3K help file format with metadata headers and color codes.
 *
 * Usage: fetch-help.php?topic=alias
 * Returns: JSON with formatted HTML content or error
 */

header('Content-Type: application/json');

// Load configuration
$config = include __DIR__ . '/config.php';

// Get the requested topic
$topic = isset($_GET['topic']) ? trim($_GET['topic']) : '';

// Validate topic (only allow alphanumeric, underscores, and hyphens)
if (empty($topic) || !preg_match('/^[a-zA-Z0-9_-]+$/', $topic)) {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid topic specified'
    ]);
    exit;
}

// Determine content source
$contentSource = $config['content_source'] ?? 'external';

if ($contentSource === 'local') {
    // Read from local directory
    $helpDirectory = $config['help_directory'] ?? '';
    $fileExtension = $config['file_extension'] ?? '';

    if (empty($helpDirectory)) {
        echo json_encode([
            'success' => false,
            'error' => 'Help directory not configured'
        ]);
        exit;
    }

    // Build the file path
    $filename = $topic;
    if (!empty($fileExtension)) {
        $filename .= '.' . $fileExtension;
    }
    $filepath = rtrim($helpDirectory, '/') . '/' . $filename;

    // Security check: ensure path doesn't escape help directory
    $realHelpDir = realpath($helpDirectory);
    $realFilePath = realpath($filepath);

    if ($realFilePath === false || strpos($realFilePath, $realHelpDir) !== 0) {
        echo json_encode([
            'success' => false,
            'error' => 'Help file not found'
        ]);
        exit;
    }

    if (!file_exists($filepath) || !is_readable($filepath)) {
        echo json_encode([
            'success' => false,
            'error' => 'Help file not found: ' . $topic
        ]);
        exit;
    }

    $rawContent = file_get_contents($filepath);

    if ($rawContent === false) {
        echo json_encode([
            'success' => false,
            'error' => 'Unable to read help file'
        ]);
        exit;
    }

    // Parse the 3K help file format
    $parsed = parseHelpFile($rawContent);

    echo json_encode([
        'success' => true,
        'topic' => $topic,
        'header' => $parsed['header'],
        'content' => $parsed['html'],
        'keywords' => $parsed['keywords'],
        'seeAlso' => $parsed['seeAlso'],
        'source' => 'local'
    ]);

} else {
    // Fetch from external URL
    $externalUrl = $config['external_url'] ?? 'https://3k.org/help/';
    $urlSuffix = $config['url_suffix'] ?? '.php';

    $url = $externalUrl . urlencode($topic) . $urlSuffix;

    // Use cURL to fetch the content
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_USERAGENT => '3Kingdoms Help Fetcher'
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    if ($response === false || !empty($error)) {
        echo json_encode([
            'success' => false,
            'error' => 'Unable to fetch help file: ' . $error
        ]);
        exit;
    }

    if ($httpCode !== 200) {
        echo json_encode([
            'success' => false,
            'error' => 'Help file not found (HTTP ' . $httpCode . ')'
        ]);
        exit;
    }

    // Extract content from HTML and format it
    $content = extractAndFormatExternalContent($response);

    echo json_encode([
        'success' => true,
        'topic' => $topic,
        'header' => '',
        'content' => $content,
        'keywords' => [],
        'seeAlso' => [],
        'source' => 'external'
    ]);
}

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
 * @return array Parsed data with 'header', 'html', 'keywords', 'seeAlso'
 */
function parseHelpFile($content) {
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

    // Convert to HTML
    $html = formatHelpContent($body, $header, $seeAlso);

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
 * @return string Formatted HTML
 */
function formatHelpContent($body, $header, $seeAlso) {
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

        $seeAlsoLinks = array_map(function($topic) {
            $topic = trim($topic);
            return '<button type="button" class="help-see-also-link" data-topic="' . htmlspecialchars($topic) . '">' . htmlspecialchars($topic) . '</button>';
        }, $seeAlso);

        $output .= "\n" . '<div class="help-see-also">';
        $output .= '<span class="help-color-yellow">See also:</span>  ';
        $output .= implode(', ', $seeAlsoLinks) . '.';
        $output .= '</div>';
    }

    return $output;
}

/**
 * Extract and format content from external HTML response
 *
 * @param string $html Raw HTML response
 * @return string Formatted content
 */
function extractAndFormatExternalContent($html) {
    $content = '';

    // Try to find content within <pre> tags
    if (preg_match('/<pre[^>]*>(.*?)<\/pre>/is', $html, $matches)) {
        $content = $matches[1];
    }
    // Try to find content within <body> tags
    elseif (preg_match('/<body[^>]*>(.*?)<\/body>/is', $html, $matches)) {
        $content = $matches[1];
        // Remove script and style tags
        $content = preg_replace('/<script[^>]*>.*?<\/script>/is', '', $content);
        $content = preg_replace('/<style[^>]*>.*?<\/style>/is', '', $content);
    }
    else {
        // Fallback: use as-is
        $content = $html;
    }

    // Remove "Close Window" link and its container
    // Format: <center><a href="javascript:window.close()">Close Window</a></center>
    $content = preg_replace('/<center>\s*<a[^>]*javascript:window\.close\(\)[^>]*>[^<]*<\/a>\s*<\/center>/is', '', $content);
    // Also try without center tags
    $content = preg_replace('/<a[^>]*javascript:window\.close\(\)[^>]*>[^<]*<\/a>/is', '', $content);

    // Convert the ::: decoration lines to a CSS class we can hide on mobile
    // Format: <FONT COLOR="#990033"> ::::::...</FONT>
    $content = preg_replace(
        '/<FONT\s+COLOR=["\']?#990033["\']?[^>]*>\s*:+\s*<\/FONT>/is',
        '<span class="help-border">::::::::::::::::::::::::::::::</span>',
        $content
    );

    // Convert the Topic title to a styled span (trim the whitespace)
    // Format: <FONT COLOR="#FFFF00"> Topic: Arena</FONT>
    $content = preg_replace_callback(
        '/<FONT\s+COLOR=["\']?#FFFF00["\']?[^>]*>([^<]+)<\/FONT>/is',
        function($matches) {
            return '<span class="help-header-title">' . trim($matches[1]) . '</span>';
        },
        $content
    );

    // Remove excessive blank lines (more than 2 newlines in a row)
    $content = preg_replace('/\n{3,}/', "\n\n", $content);

    // Trim leading whitespace from each line (the original has centered text with spaces)
    $lines = explode("\n", $content);
    $lines = array_map('trim', $lines);
    $content = implode("\n", $lines);

    // Handle "See also" section
    // Format: See also: <A HREF="pk.php">pk</A>, <A HREF="kill.php">kill</A>, ...
    if (preg_match('/See\s+also:\s*(.*?)(?:\n|$)/is', $content, $seeAlsoMatch)) {
        $seeAlsoLine = $seeAlsoMatch[0];
        $seeAlsoContent = $seeAlsoMatch[1];

        // Extract HTML-style links: <A HREF="topic.php">text</A>
        preg_match_all('/<a\s+href=["\']?([^"\'>\s]+\.php)["\']?[^>]*>([^<]+)<\/a>/is', $seeAlsoContent, $linkMatches, PREG_SET_ORDER);

        if (!empty($linkMatches)) {
            // Sort links alphabetically by link text
            usort($linkMatches, function($a, $b) {
                return strcasecmp(trim($a[2]), trim($b[2]));
            });

            // Build sorted buttons
            $sortedButtons = [];
            foreach ($linkMatches as $match) {
                $topic = basename($match[1], '.php'); // Get filename without .php
                $text = trim($match[2]);
                $sortedButtons[] = '<button type="button" class="help-see-also-link" data-topic="' . htmlspecialchars($topic) . '">' . htmlspecialchars($text) . '</button>';
            }

            // Replace the See also line with sorted version
            $newSeeAlso = '<span class="help-color-yellow">See also:</span>  ' . implode(', ', $sortedButtons) . '.';
            $content = str_replace($seeAlsoLine, $newSeeAlso . "\n", $content);
        }
    }

    // Convert any remaining HTML-style <a> tags to buttons
    $content = preg_replace_callback(
        '/<a\s+href=["\']?([^"\'>\s]+\.php)["\']?[^>]*>([^<]+)<\/a>/is',
        function($matches) {
            $topic = basename($matches[1], '.php');
            $text = trim($matches[2]);
            return '<button type="button" class="help-see-also-link" data-topic="' . htmlspecialchars($topic) . '">' . htmlspecialchars($text) . '</button>';
        },
        $content
    );

    return '<div class="help-body">' . trim($content) . '</div>';
}
