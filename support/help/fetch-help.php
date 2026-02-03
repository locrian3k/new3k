<?php
/**
 * Help File Content Fetcher
 *
 * This endpoint fetches help file content for display in the modal.
 * It supports both local files and external URLs.
 *
 * Usage: fetch-help.php?topic=alias
 * Returns: JSON with content or error
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

    $content = file_get_contents($filepath);

    if ($content === false) {
        echo json_encode([
            'success' => false,
            'error' => 'Unable to read help file'
        ]);
        exit;
    }

    echo json_encode([
        'success' => true,
        'topic' => $topic,
        'content' => $content,
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

    // Extract just the main content from the HTML response
    // The 3k.org help pages have the content in a specific format
    $content = extractHelpContent($response);

    echo json_encode([
        'success' => true,
        'topic' => $topic,
        'content' => $content,
        'source' => 'external'
    ]);
}

/**
 * Extract help content from HTML response
 *
 * This function attempts to extract just the help file content
 * from the full HTML page returned by 3k.org
 */
function extractHelpContent($html) {
    // Try to find content within <pre> tags (common for help files)
    if (preg_match('/<pre[^>]*>(.*?)<\/pre>/is', $html, $matches)) {
        return html_entity_decode(strip_tags($matches[1]));
    }

    // Try to find content within <body> tags
    if (preg_match('/<body[^>]*>(.*?)<\/body>/is', $html, $matches)) {
        $body = $matches[1];
        // Remove script and style tags
        $body = preg_replace('/<script[^>]*>.*?<\/script>/is', '', $body);
        $body = preg_replace('/<style[^>]*>.*?<\/style>/is', '', $body);
        // Convert <br> to newlines
        $body = preg_replace('/<br\s*\/?>/i', "\n", $body);
        // Strip remaining HTML tags
        $body = strip_tags($body);
        // Decode HTML entities
        $body = html_entity_decode($body);
        // Clean up whitespace
        $body = trim($body);
        return $body;
    }

    // Fallback: return cleaned HTML
    $content = strip_tags($html);
    $content = html_entity_decode($content);
    return trim($content);
}
