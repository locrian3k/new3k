<?php
/**
 * Help Page Functions
 *
 * Functions for loading and processing help file data.
 * Help content is read from a single 'helpdocs' file submitted by Adalius' script.
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

    if ($source === 'hybrid') {
        // Hybrid mode: use static categories + add uncategorized topics from helpdocs
        $categories = $config['categories'];
        $categorizedFiles = [];

        // Collect all files that are already in categories
        foreach ($categories as $cat) {
            foreach ($cat['files'] as $file => $title) {
                $categorizedFiles[$file] = true;
            }
        }

        // Parse helpdocs to find uncategorized topics
        $helpdocsFile = $config['helpdocs_file'] ?? '';
        if (!empty($helpdocsFile) && file_exists($helpdocsFile)) {
            $excluded = $config['excluded_topics'] ?? [];
            $allTopics = getHelpdocsTopicList($helpdocsFile, $excluded);
            $uncategorized = [];

            foreach ($allTopics as $topic => $title) {
                if (!isset($categorizedFiles[$topic])) {
                    $uncategorized[$topic] = $title;
                }
            }

            if (!empty($uncategorized)) {
                ksort($uncategorized);
                $categories['uncategorized'] = [
                    'title' => 'Other Topics',
                    'icon' => 'fa-solid fa-folder',
                    'description' => 'Additional help files',
                    'files' => $uncategorized
                ];
            }
        }

        return $categories;
    }

    // Fallback to static categories
    return $config['categories'];
}

/**
 * Get a list of all topics in the helpdocs file
 *
 * @param string $helpdocsPath Path to the helpdocs file
 * @param array $excluded Topic names to exclude (test files, wizard-only, etc.)
 * @return array Associative array of topic => display name
 */
function getHelpdocsTopicList($helpdocsPath, $excluded = []) {
    $topics = [];

    $content = @file_get_contents($helpdocsPath);
    if ($content === false) {
        return $topics;
    }

    // Split by separator
    $entries = preg_split('/^-{4,}\s*$/m', $content);

    foreach ($entries as $entry) {
        $entry = trim($entry);
        if (empty($entry)) continue;

        // Extract topic name from file path
        // Handles both formats:
        //   /cmds/mortal/acopy.c  -> acopy  (command files have .c extension)
        //   /help/IMPORTANT/rules -> rules  (help files have no extension)
        if (preg_match('/^file:\s*\/.*\/([^\/]+?)(?:\.c)?\s*$/m', $entry, $match)) {
            $topic = $match[1];
            // Skip excluded topics (test files, wizard-only, etc.)
            if (in_array(strtolower($topic), array_map('strtolower', $excluded))) {
                continue;
            }
            $topics[$topic] = $topic;
        }
    }

    return $topics;
}

/**
 * Find and return help content for a topic from the helpdocs file
 *
 * @param string $topic The help topic to find
 * @param string $helpdocsPath Path to the helpdocs file
 * @return string|false The help content, or false if not found
 */
function findTopicInHelpdocs($topic, $helpdocsPath) {
    if (empty($helpdocsPath) || !file_exists($helpdocsPath)) {
        return false;
    }

    $content = @file_get_contents($helpdocsPath);
    if ($content === false) {
        return false;
    }

    // Split by separator
    $entries = preg_split('/^-{4,}\s*$/m', $content);
    $topicLower = strtolower($topic);

    foreach ($entries as $entry) {
        $entry = trim($entry);
        if (empty($entry)) continue;

        // Check if this entry matches the requested topic
        // Match by filename: /cmds/mortal/acopy.c -> acopy, or /help/IMPORTANT/rules -> rules
        if (preg_match('/^file:\s*\/.*\/([^\/]+?)(?:\.c)?\s*$/m', $entry, $match)) {
            $entryTopic = strtolower($match[1]);
            if ($entryTopic === $topicLower) {
                // Remove the "file:" line from the content before returning
                $helpContent = preg_replace('/^file:\s*.*$/m', '', $entry, 1);
                return trim($helpContent);
            }
        }

        // Also check aliases
        if (preg_match('/^aliases:\s*(.+)$/m', $entry, $aliasMatch)) {
            $aliases = array_map('trim', explode(',', $aliasMatch[1]));
            foreach ($aliases as $alias) {
                if (strtolower($alias) === $topicLower) {
                    $helpContent = preg_replace('/^file:\s*.*$/m', '', $entry, 1);
                    return trim($helpContent);
                }
            }
        }
    }

    return false;
}
