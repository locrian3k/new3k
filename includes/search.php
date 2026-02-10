<?php
/**
 * Site Search API
 * Scans PHP pages for content and returns matching results as JSON
 */

// Searchable pages - path => default title
$searchablePages = [
    '/index.php' => 'Home - 3Kingdoms',
    '/about/3kingdoms/index.php' => 'About 3Kingdoms',
    '/about/3scapes/index.php' => '3Scapes',
    '/connect/index.php' => 'Connection Options',
    '/connect/connect_ssh.php' => 'SSH Tunneling Guide',
    '/realms/index.php' => 'The Three Realms',
    '/guilds/index.php' => 'Guilds',
    '/community/wholist.php' => "Who's Online",
    '/community/omp/index.php' => 'The Gatherings',
    '/support/help/index.php' => 'Help Files',
    '/support/contact/index.php' => 'Contact',
    '/support/vafs/index.php' => 'VAFs - Voluntary Access Fees',
    '/support/admin/index.php' => 'Administration',
];

/**
 * Extract text content from a PHP page file
 */
function extractPageContent($filePath) {
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . $filePath;

    if (!file_exists($fullPath)) {
        return null;
    }

    // Read file content
    $content = file_get_contents($fullPath);

    // Extract $pageTitle if defined
    preg_match('/\$pageTitle\s*=\s*["\']([^"\']+)["\']/', $content, $titleMatch);
    $pageTitle = isset($titleMatch[1]) ? $titleMatch[1] : basename($filePath);

    // Remove PHP tags and their contents
    $htmlContent = preg_replace('/<\?php.*?\?>/s', '', $content);

    // Remove script tags
    $htmlContent = preg_replace('/<script[^>]*>.*?<\/script>/is', '', $htmlContent);

    // Remove style tags
    $htmlContent = preg_replace('/<style[^>]*>.*?<\/style>/is', '', $htmlContent);

    // Remove HTML comments
    $htmlContent = preg_replace('/<!--.*?-->/s', '', $htmlContent);

    // Strip all HTML tags
    $textContent = strip_tags($htmlContent);

    // Decode HTML entities
    $textContent = html_entity_decode($textContent, ENT_QUOTES, 'UTF-8');

    // Normalize whitespace
    $textContent = preg_replace('/\s+/', ' ', $textContent);
    $textContent = trim($textContent);

    return [
        'title' => $pageTitle,
        'content' => $textContent,
        'path' => $filePath
    ];
}

/**
 * Extract a snippet with context around the matched term
 */
function extractSnippet($content, $term, $contextLength = 150) {
    $pos = stripos($content, $term);

    if ($pos === false) {
        // Return beginning of content if term not found
        $snippet = substr($content, 0, $contextLength);
        return strlen($content) > $contextLength ? $snippet . '...' : $snippet;
    }

    // Calculate start position (show context before match)
    $start = max(0, $pos - intval($contextLength / 2));

    // Find word boundary if not at start
    if ($start > 0) {
        $spacePos = strpos($content, ' ', $start);
        if ($spacePos !== false) {
            $start = $spacePos + 1;
        }
    }

    $snippet = substr($content, $start, $contextLength);

    // Add ellipsis if not at start/end
    if ($start > 0) {
        $snippet = '...' . $snippet;
    }
    if ($start + $contextLength < strlen($content)) {
        $snippet .= '...';
    }

    return $snippet;
}

/**
 * Perform search across all indexed pages
 */
function performSearch($query, $pages) {
    $results = [];
    $query = strtolower(trim($query));

    if (strlen($query) < 2) {
        return ['error' => 'Search query must be at least 2 characters'];
    }

    // Split query into terms
    $searchTerms = array_filter(explode(' ', $query), function($t) {
        return strlen($t) >= 2;
    });

    if (empty($searchTerms)) {
        return [];
    }

    foreach ($pages as $path => $defaultTitle) {
        $pageData = extractPageContent($path);

        if (!$pageData) continue;

        $contentLower = strtolower($pageData['content']);
        $titleLower = strtolower($pageData['title']);

        // Calculate relevance score
        $score = 0;
        $matchedTerms = 0;

        foreach ($searchTerms as $term) {
            // Title matches weighted higher
            if (stripos($titleLower, $term) !== false) {
                $score += 10;
                $matchedTerms++;
            }
            // Content matches
            $contentMatches = substr_count($contentLower, $term);
            if ($contentMatches > 0) {
                $score += $contentMatches;
                $matchedTerms++;
            }
        }

        // Only include if at least one term matched
        if ($score > 0) {
            // Extract snippet with context around first matched term
            $snippet = extractSnippet($pageData['content'], $searchTerms[0], 150);

            $results[] = [
                'title' => $pageData['title'],
                'path' => $path,
                'snippet' => $snippet,
                'score' => $score
            ];
        }
    }

    // Sort by relevance score descending
    usort($results, function($a, $b) {
        return $b['score'] - $a['score'];
    });

    return $results;
}

// API Endpoint Handler
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['q'])) {
    header('Content-Type: application/json');
    header('Cache-Control: no-cache');

    $query = $_GET['q'];

    // Sanitize input
    $query = htmlspecialchars($query, ENT_QUOTES, 'UTF-8');

    $results = performSearch($query, $searchablePages);

    echo json_encode([
        'results' => $results,
        'query' => $query,
        'count' => is_array($results) ? count($results) : 0
    ]);
    exit;
}
?>
