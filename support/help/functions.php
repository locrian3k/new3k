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
        $scannedFiles = scanAllHelpSources($config);

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

    // Fallback to static categories
    return $config['categories'];
}

/**
 * Scan all configured help sources for files
 *
 * @param array $config Configuration array
 * @return array Associative array of filename => display name
 */
function scanAllHelpSources($config) {
    $allFiles = [];
    $basePath = $config['help_base_path'] ?? '';
    $sources = $config['help_sources'] ?? [];
    $extension = $config['file_extension'] ?? '';
    $globalExcludeFolders = $config['global_exclude_folders'] ?? [];
    $globalExcludeFiles = $config['global_exclude_files'] ?? [];

    foreach ($sources as $sourceId => $sourceConfig) {
        $sourcePath = $basePath . ($sourceConfig['path'] ?? '');

        if (!is_dir($sourcePath)) {
            continue;
        }

        // Scan root files if configured
        if (!empty($sourceConfig['include_root_files'])) {
            $rootFiles = scanDirectoryForFiles($sourcePath, $extension, $globalExcludeFiles);
            $allFiles = array_merge($allFiles, $rootFiles);
        }

        // Handle subfolders
        $subfolderConfig = $sourceConfig['subfolders'] ?? [];
        $mode = $subfolderConfig['mode'] ?? 'exclude';
        $list = $subfolderConfig['list'] ?? [];

        // Get all subdirectories
        $subdirs = glob($sourcePath . '*', GLOB_ONLYDIR);

        foreach ($subdirs as $subdir) {
            $subdirName = basename($subdir);

            // Skip hidden directories
            if (strpos($subdirName, '.') === 0) {
                continue;
            }

            // Skip globally excluded folders
            if (in_array($subdirName, $globalExcludeFolders)) {
                continue;
            }

            // Check if we should include this subfolder
            $shouldInclude = false;
            if ($mode === 'include') {
                // Only include if in the list
                $shouldInclude = in_array($subdirName, $list);
            } else {
                // Include unless in the exclude list
                $shouldInclude = !in_array($subdirName, $list);
            }

            if ($shouldInclude) {
                // Recursively scan this subfolder (passing global excludes)
                $subFiles = scanDirectoryRecursive($subdir, $extension, $globalExcludeFolders, $globalExcludeFiles);
                $allFiles = array_merge($allFiles, $subFiles);
            }
        }
    }

    ksort($allFiles);
    return $allFiles;
}

/**
 * Scan a single directory for help files (non-recursive)
 *
 * @param string $directory Path to the directory
 * @param string $extension File extension to look for (without dot), or empty for no extension
 * @param array $excludeFiles File names to exclude (without extension)
 * @return array Associative array of filename => display name
 */
function scanDirectoryForFiles($directory, $extension = '', $excludeFiles = []) {
    $files = [];

    // Get all items in the directory
    $items = glob(rtrim($directory, '/') . '/*');

    foreach ($items as $filepath) {
        // Skip directories
        if (is_dir($filepath)) {
            continue;
        }

        $basename = basename($filepath);

        // Skip hidden files
        if (strpos($basename, '.') === 0) {
            continue;
        }

        // If we're looking for extensionless files, skip files with extensions
        if (empty($extension) && strpos($basename, '.') !== false) {
            continue;
        }

        // If we're looking for specific extension, check it
        if (!empty($extension)) {
            $fileExt = pathinfo($filepath, PATHINFO_EXTENSION);
            if ($fileExt !== $extension) {
                continue;
            }
        }

        $filename = pathinfo($filepath, PATHINFO_FILENAME);

        // Skip excluded files
        if (in_array($filename, $excludeFiles)) {
            continue;
        }

        // Use lowercase filename as display name
        $files[$filename] = strtolower($filename);
    }

    return $files;
}

/**
 * Recursively scan a directory for help files
 *
 * @param string $directory Path to the directory
 * @param string $extension File extension to look for
 * @param array $globalExcludeFolders Folder names to always exclude
 * @param array $globalExcludeFiles File names to always exclude (without extension)
 * @return array Associative array of filename => display name
 */
function scanDirectoryRecursive($directory, $extension = '', $globalExcludeFolders = [], $globalExcludeFiles = []) {
    $files = [];

    // Scan current directory
    $files = array_merge($files, scanDirectoryForFiles($directory, $extension, $globalExcludeFiles));

    // Scan subdirectories
    $subdirs = glob($directory . '/*', GLOB_ONLYDIR);
    foreach ($subdirs as $subdir) {
        $subdirName = basename($subdir);

        // Skip hidden directories
        if (strpos($subdirName, '.') === 0) {
            continue;
        }

        // Skip globally excluded folders
        if (in_array($subdirName, $globalExcludeFolders)) {
            continue;
        }

        $subFiles = scanDirectoryRecursive($subdir, $extension, $globalExcludeFolders, $globalExcludeFiles);
        $files = array_merge($files, $subFiles);
    }

    return $files;
}

/**
 * Find a help file in the configured sources
 *
 * @param string $topic The help topic/filename to find
 * @param array $config Configuration array
 * @return string|false The full path to the file, or false if not found
 */
function findHelpFile($topic, $config) {
    $basePath = $config['help_base_path'] ?? '';
    $sources = $config['help_sources'] ?? [];
    $extension = $config['file_extension'] ?? '';
    $globalExclude = $config['global_exclude_folders'] ?? [];

    // Build the filename
    $filename = $topic;
    if (!empty($extension)) {
        $filename .= '.' . $extension;
    }

    foreach ($sources as $sourceId => $sourceConfig) {
        $sourcePath = $basePath . ($sourceConfig['path'] ?? '');

        if (!is_dir($sourcePath)) {
            continue;
        }

        // Check root directory if configured
        if (!empty($sourceConfig['include_root_files'])) {
            $filepath = $sourcePath . $filename;
            if (file_exists($filepath) && is_readable($filepath)) {
                return $filepath;
            }
        }

        // Handle subfolders
        $subfolderConfig = $sourceConfig['subfolders'] ?? [];
        $mode = $subfolderConfig['mode'] ?? 'exclude';
        $list = $subfolderConfig['list'] ?? [];

        // Get all subdirectories
        $subdirs = glob($sourcePath . '*', GLOB_ONLYDIR);

        foreach ($subdirs as $subdir) {
            $subdirName = basename($subdir);

            // Skip hidden directories
            if (strpos($subdirName, '.') === 0) {
                continue;
            }

            // Skip globally excluded folders
            if (in_array($subdirName, $globalExclude)) {
                continue;
            }

            // Check if we should search this subfolder
            $shouldSearch = false;
            if ($mode === 'include') {
                $shouldSearch = in_array($subdirName, $list);
            } else {
                $shouldSearch = !in_array($subdirName, $list);
            }

            if ($shouldSearch) {
                // Search recursively in this subfolder
                $found = findFileRecursive($subdir, $filename, $globalExclude);
                if ($found !== false) {
                    return $found;
                }
            }
        }
    }

    return false;
}

/**
 * Recursively search for a file in a directory
 *
 * @param string $directory Directory to search
 * @param string $filename Filename to find
 * @param array $globalExclude Folder names to always exclude
 * @return string|false Full path if found, false otherwise
 */
function findFileRecursive($directory, $filename, $globalExclude = []) {
    // Check current directory
    $filepath = rtrim($directory, '/') . '/' . $filename;
    if (file_exists($filepath) && is_readable($filepath)) {
        return $filepath;
    }

    // Check subdirectories
    $subdirs = glob($directory . '/*', GLOB_ONLYDIR);
    foreach ($subdirs as $subdir) {
        $subdirName = basename($subdir);

        // Skip hidden directories
        if (strpos($subdirName, '.') === 0) {
            continue;
        }

        // Skip globally excluded folders
        if (in_array($subdirName, $globalExclude)) {
            continue;
        }

        $found = findFileRecursive($subdir, $filename, $globalExclude);
        if ($found !== false) {
            return $found;
        }
    }

    return false;
}

/**
 * Read a local help file's content
 *
 * @param string $topic The help topic/filename
 * @param array $config Configuration array
 * @return array ['success' => bool, 'content' => string, 'error' => string]
 */
function readLocalHelpFile($topic, $config) {
    $filepath = findHelpFile($topic, $config);

    if ($filepath === false) {
        return [
            'success' => false,
            'error' => 'Help file not found: ' . $topic
        ];
    }

    // Security: Ensure the resolved path is within allowed directories
    $basePath = realpath($config['help_base_path'] ?? '');
    $realFilePath = realpath($filepath);

    if ($realFilePath === false || strpos($realFilePath, $basePath) !== 0) {
        return [
            'success' => false,
            'error' => 'Invalid help file path'
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
