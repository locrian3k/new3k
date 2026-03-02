<?php
$pageTitle = "Who's Online - 3Kingdoms";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

/**
 * ==============================================================
 * WHOLIST CONFIGURATION
 * ==============================================================
 *
 * The MUD generates who_list2.html with the current player list.
 * Thor mapped the MUD's shared directory to /var/www/mudshare.
 * This path is outside the document root for security.
 */
$WHO_DATA_FILE = '/var/www/mudshare/wholist/who_list2.html';

/**
 * ==============================================================
 * DATA FETCHING FUNCTIONS
 * ==============================================================
 */

// Try to read from local MUD-generated file
function fetchFromLocalFile($filePath) {
    if (!file_exists($filePath)) {
        return null;
    }

    $html = @file_get_contents($filePath);
    if ($html === false) {
        return null;
    }

    return parseWholistHtml($html);
}

// Return empty data structure
function getEmptyWholistData() {
    return [
        'uptime' => '',
        'reboot' => '',
        'playerCount' => 0,
        'timestamp' => date('D M d H:i:s Y T'),
        'players' => [],
        'rawHtml' => ''
    ];
}

// Parse the HTML from MUD who output
function parseWholistHtml($html) {
    $data = [
        'uptime' => '',
        'reboot' => '',
        'playerCount' => 0,
        'timestamp' => date('D M d H:i:s Y T'),
        'players' => [],
        'rawHtml' => ''
    ];

    // Extract uptime
    if (preg_match('/Uptime is: ([^<]+)/', $html, $matches)) {
        $data['uptime'] = trim($matches[1]);
    }

    // Extract reboot time
    if (preg_match('/Reboot in: ([^<]+)/', $html, $matches)) {
        $data['reboot'] = trim($matches[1]);
    }

    // Extract player count
    if (preg_match('/(\d+) Visible Users/', $html, $matches)) {
        $data['playerCount'] = (int)$matches[1];
    }

    // Extract the player table
    if (preg_match('/<table border = 0>(.*?)<\/table>/s', $html, $matches)) {
        $data['rawHtml'] = $matches[1];

        // Parse individual players
        preg_match_all('/<tr><td align=center>\s*<span[^>]*>\[(\d+)\]<\/span><\/td>\s*<td>&nbsp;&nbsp;&nbsp;<\/td><td>(.*?)<\/td><\/tr>/s', $html, $playerMatches, PREG_SET_ORDER);

        foreach ($playerMatches as $match) {
            $level = $match[1];
            $playerHtml = $match[2];

            // Extract player names from the HTML
            preg_match_all('/<i><b>([^<]+)<\/b><\/i>/', $playerHtml, $nameMatches);

            foreach ($nameMatches[1] as $name) {
                $data['players'][] = [
                    'level' => $level,
                    'name' => $name,
                    'html' => $playerHtml
                ];
            }
        }
    }

    return $data;
}

/**
 * ==============================================================
 * FETCH DATA
 * ==============================================================
 */
$whoData = null;

// Try to read from local MUD-generated file
if (isset($WHO_DATA_FILE)) {
    $whoData = fetchFromLocalFile($WHO_DATA_FILE);
}

// Fallback: empty data (shown when MUD file is unavailable)
if (!$whoData) {
    $whoData = getEmptyWholistData();
}
?>

<!-- Main Content -->
<main id="content">
    <!-- Hero Section -->
    <section class="hero hero-who">
        <div class="hero-content">
            <h1 class="hero-title">Who's Online</h1>
            <p class="hero-subtitle">See who's adventuring in the realms right now</p>
        </div>
    </section>

    <!-- Server Status -->
    <section class="wholist-status">
        <div class="container">
            <div class="status-grid">
                <div class="status-item">
                    <span class="status-label">Players Online</span>
                    <span class="status-value"><?php echo $whoData['playerCount']; ?></span>
                </div>
                <div class="status-item">
                    <span class="status-label">Uptime</span>
                    <span class="status-value"><?php echo $whoData['uptime'] ?: 'N/A'; ?></span>
                </div>
                <div class="status-item">
                    <span class="status-label">Next Reboot</span>
                    <span class="status-value"><?php echo $whoData['reboot'] ?: 'N/A'; ?></span>
                </div>
            </div>
            <p class="status-timestamp">Last updated: <?php echo $whoData['timestamp']; ?></p>
        </div>
    </section>

    <!-- Player List -->
    <section class="wholist-players">
        <div class="container">
            <?php if (!empty($whoData['rawHtml'])): ?>
                <!-- Parsed from original source -->
                <div class="player-table-wrapper">
                    <table class="player-table">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Player</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $whoData['rawHtml']; ?>
                        </tbody>
                    </table>
                </div>
            <?php elseif (!empty($whoData['players'])): ?>
                <!-- Structured player data -->
                <div class="player-table-wrapper">
                    <table class="player-table">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Player</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($whoData['players'] as $player): ?>
                            <tr>
                                <td class="player-level">[<?php echo htmlspecialchars($player['level']); ?>]</td>
                                <td class="player-info"><?php echo $player['html']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <!-- No data available -->
                <div class="wholist-empty">
                    <div class="empty-icon">
                        <i class="fa-solid fa-users-slash"></i>
                    </div>
                    <h2>Unable to Retrieve Player List</h2>
                    <p>The player list is currently unavailable. This could be due to:</p>
                    <ul>
                        <li>Server maintenance</li>
                        <li>Connection issues</li>
                        <li>The MUD being in the process of rebooting</li>
                    </ul>
                    <p>Try refreshing in a few moments, or connect directly to see who's online:</p>
                    <a href="https://client.wemudtogether.com" target="_blank" class="btn-primary">Connect to 3Kingdoms</a>
                </div>
            <?php endif; ?>

            <p class="wholist-note">
                <i class="fa-solid fa-circle-info"></i>
                This list is updated every 5 minutes. Connect to see real-time player activity!
            </p>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="wholist-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Join the Adventure?</h2>
                <p>Connect now and become part of the 3Kingdoms community!</p>
                <div class="cta-buttons">
                    <a href="https://client.wemudtogether.com" target="_blank" class="btn-primary">Play Now</a>
                    <a href="/about/3kingdoms/index.php" class="btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
</body>
</html>
