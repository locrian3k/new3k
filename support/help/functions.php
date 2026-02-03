<?php
/**
 * Help Page Functions
 *
 * Functions for loading and processing help file data.
 */

/**
 * Get help files based on configuration
 *
 * @param array $config Configuration array from config.php
 * @return array Help categories with files
 */
function getHelpFiles($config) {
    $source = $config['source'] ?? 'static';

    if ($source === 'static') {
        return $config['categories'];
    }

    if ($source === 'directory' || $source === 'hybrid') {
        $directory = $config['help_directory'] ?? '';
        $extension = $config['file_extension'] ?? '';

        // If directory scanning is enabled and directory exists
        if (!empty($directory) && is_dir($directory)) {
            $scannedFiles = scanHelpDirectory($directory, $extension);

            if ($source === 'directory') {
                // Return all files in a single "All Help Files" category
                return [
                    'all' => [
                        'title' => 'All Help Files',
                        'icon' => 'fa-solid fa-folder-open',
                        'description' => 'Complete list of available help topics',
                        'files' => $scannedFiles
                    ]
                ];
            }

            // Hybrid mode: use static categories, add uncategorized files
            $categories = $config['categories'];
            $categorizedFiles = [];

            // Collect all files that are already in categories
            foreach ($categories as $cat) {
                foreach ($cat['files'] as $file => $title) {
                    $categorizedFiles[$file] = true;
                }
            }

            // Find uncategorized files
            $uncategorized = [];
            foreach ($scannedFiles as $file => $title) {
                if (!isset($categorizedFiles[$file])) {
                    $uncategorized[$file] = $title;
                }
            }

            // Add uncategorized files if any exist
            if (!empty($uncategorized)) {
                ksort($uncategorized);
                $categories['uncategorized'] = [
                    'title' => 'Other Topics',
                    'icon' => 'fa-solid fa-folder',
                    'description' => 'Additional help files',
                    'files' => $uncategorized
                ];
            }

            return $categories;
        }
    }

    // Fallback to static categories
    return $config['categories'];
}

/**
 * Scan a directory for help files
 *
 * @param string $directory Path to the help files directory
 * @param string $extension File extension to look for (without dot), or empty for no extension
 * @return array Associative array of filename => display name
 */
function scanHelpDirectory($directory, $extension = '') {
    $files = [];

    // Build the glob pattern
    if (!empty($extension)) {
        $pattern = rtrim($directory, '/') . '/*.' . $extension;
    } else {
        // For files without extension, get all files and filter out those with extensions
        $pattern = rtrim($directory, '/') . '/*';
    }

    foreach (glob($pattern) as $filepath) {
        // Skip directories
        if (is_dir($filepath)) {
            continue;
        }

        $basename = basename($filepath);

        // If we're looking for extensionless files, skip files with extensions
        if (empty($extension) && strpos($basename, '.') !== false) {
            continue;
        }

        $filename = pathinfo($filepath, PATHINFO_FILENAME);

        // Skip hidden files (starting with .)
        if (strpos($filename, '.') === 0) {
            continue;
        }

        // Use lowercase filename as display name (MUD is case-sensitive)
        $files[$filename] = strtolower($filename);
    }

    ksort($files);
    return $files;
}

/**
 * Read a local help file's content
 *
 * @param string $topic The help topic/filename
 * @param array $config Configuration array
 * @return array ['success' => bool, 'content' => string, 'error' => string]
 */
function readLocalHelpFile($topic, $config) {
    $directory = $config['help_directory'] ?? '';
    $extension = $config['file_extension'] ?? '';

    if (empty($directory)) {
        return [
            'success' => false,
            'error' => 'Help directory not configured'
        ];
    }

    // Build the file path
    $filename = $topic;
    if (!empty($extension)) {
        $filename .= '.' . $extension;
    }
    $filepath = rtrim($directory, '/') . '/' . $filename;

    // Security: Ensure the resolved path is within the help directory
    $realHelpDir = realpath($directory);
    $realFilePath = realpath($filepath);

    // realpath returns false if file doesn't exist
    if ($realFilePath === false) {
        return [
            'success' => false,
            'error' => 'Help file not found: ' . $topic
        ];
    }

    // Ensure we're not escaping the help directory (path traversal protection)
    if (strpos($realFilePath, $realHelpDir) !== 0) {
        return [
            'success' => false,
            'error' => 'Invalid help file path'
        ];
    }

    if (!is_readable($realFilePath)) {
        return [
            'success' => false,
            'error' => 'Help file not readable: ' . $topic
        ];
    }

    $content = file_get_contents($realFilePath);

    if ($content === false) {
        return [
            'success' => false,
            'error' => 'Unable to read help file'
        ];
    }

    return [
        'success' => true,
        'content' => $content
    ];
}
