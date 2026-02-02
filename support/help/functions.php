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
        $extension = $config['file_extension'] ?? 'php';

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
 * @param string $extension File extension to look for (without dot)
 * @return array Associative array of filename => display name
 */
function scanHelpDirectory($directory, $extension) {
    $files = [];
    $pattern = $directory . '/*.' . $extension;

    foreach (glob($pattern) as $filepath) {
        $filename = pathinfo($filepath, PATHINFO_FILENAME);
        // Convert filename to display name (replace underscores)
        $displayName = ucwords(str_replace(['_', '-'], ' ', $filename));
        $files[$filename] = $displayName;
    }

    ksort($files);
    return $files;
}