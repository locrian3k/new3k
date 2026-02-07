<?php
/**
 * Debug script to check help file paths
 * Access this via: http://localhost/support/help/debug.php
 * DELETE THIS FILE after debugging!
 */

header('Content-Type: text/plain');

echo "=== Help Files Debug ===\n\n";

// Load config
$config = include __DIR__ . '/config.php';
include __DIR__ . '/functions.php';

echo "1. Path Information:\n";
echo "   __DIR__ = " . __DIR__ . "\n";
echo "   dirname(__DIR__, 3) = " . dirname(__DIR__, 3) . "\n";
echo "   help_base_path from config = " . $config['help_base_path'] . "\n";
echo "   realpath(help_base_path) = " . (realpath($config['help_base_path']) ?: 'FALSE') . "\n";
echo "\n";

echo "2. Checking help source paths:\n";
$basePath = $config['help_base_path'];
foreach ($config['help_sources'] as $sourceId => $sourceConfig) {
    $sourcePath = $basePath . ($sourceConfig['path'] ?? '');
    echo "   Source '$sourceId':\n";
    echo "      Path: $sourcePath\n";
    echo "      Exists: " . (is_dir($sourcePath) ? 'YES' : 'NO') . "\n";
    echo "      realpath: " . (realpath($sourcePath) ?: 'FALSE') . "\n";
}
echo "\n";

echo "3. Scanning for files:\n";
$allFiles = scanAllHelpSources($config);
echo "   Total files found: " . count($allFiles) . "\n";
if (count($allFiles) > 0) {
    echo "   First 10 files:\n";
    $i = 0;
    foreach ($allFiles as $file => $title) {
        echo "      - $file => $title\n";
        if (++$i >= 10) break;
    }
}
echo "\n";

echo "4. Testing findHelpFile for 'alias':\n";
$filepath = findHelpFile('alias', $config);
echo "   Result: " . ($filepath ?: 'FALSE (not found)') . "\n";
if ($filepath) {
    echo "   File exists: " . (file_exists($filepath) ? 'YES' : 'NO') . "\n";
    echo "   Is readable: " . (is_readable($filepath) ? 'YES' : 'NO') . "\n";
}
echo "\n";

echo "5. Testing findHelpFile for 'anarchy':\n";
$filepath = findHelpFile('anarchy', $config);
echo "   Result: " . ($filepath ?: 'FALSE (not found)') . "\n";
echo "\n";

echo "=== End Debug ===\n";
