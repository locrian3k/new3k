<?php
$pageTitle = "Who's Online - 3Kingdoms";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

/**
 * WHOLIST DATA SOURCE OPTIONS:
 *
 * Option 1: Socket connection to MUD
 * ----------------------------------
 * $socket = fsockopen("3k.org", 3000, $errno, $errstr, 5);
 * fwrite($socket, "who\n");
 * $data = stream_get_contents($socket);
 * fclose($socket);
 *
 * Option 2: Read from MUD-generated data file
 * --------------------------------------------
 * $whoData = file_get_contents('/path/to/mud/who_data.json');
 * $players = json_decode($whoData, true);
 *
 * Option 3: Fetch from API endpoint
 * ---------------------------------
 * $whoData = file_get_contents('https://3k.org/api/who.json');
 * $players = json_decode($whoData, true);
 *
 * Option 4: Include MUD-generated HTML directly
 * ----------------------------------------------
 * The original site appears to use this method - the MUD generates
 * an HTML file that gets included or the PHP connects to the MUD
 * and parses the 'who' output.
 */

// Placeholder function - replace with actual data source
function getWholistData() {
    // TODO: Implement actual data fetching from MUD
    // For now, return sample structure
    return [
        'uptime' => 'Data unavailable',
        'reboot' => 'Data unavailable',
        'playerCount' => 0,
        'timestamp' => date('D M d H:i:s Y T'),
        'players' => []
    ];
}

// Try to fetch real data from the original source
function fetchFromOriginalSource() {
    $url = 'https://www.3k.org/wholist.php';

    $context = stream_context_create([
        'http' => [
            'timeout' => 5,
            'user_agent' => 'Mozilla/5.0 (compatible; 3K Website)'
        ]
    ]);

    $html = @file_get_contents($url, false, $context);

    if ($html === false) {
        return null;
    }

    return parseWholistHtml($html);
}

// Parse the HTML from original wholist
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

// Attempt to get data
$whoData = fetchFromOriginalSource();

if (!$whoData) {
    $whoData = getWholistData();
}
?>

<!-- Main Content -->
<main id="content">
    <!-- Hero Section -->
    <section class="hero hero-compact">
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
                    <a href="/connect/" class="btn-primary">Connect to 3Kingdoms</a>
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
                    <a href="/connect/" class="btn-primary">Play Now</a>
                    <a href="/about/" class="btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
</body>
</html>
