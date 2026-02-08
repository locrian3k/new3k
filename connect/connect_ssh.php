<?php
$pageTitle = "SSH Tunneling - 3Kingdoms";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Main Content -->
<main id="content">
    <!-- Hero Section -->
    <section class="hero hero-compact">
        <div class="hero-content">
            <h1 class="hero-title">SSH Tunneling</h1>
            <p class="hero-subtitle">Connect through firewalls using an encrypted tunnel</p>
        </div>
    </section>

    <!-- Introduction -->
    <section class="ssh-intro">
        <div class="container">
            <div class="intro-content">
                <p class="lead-text">
                    SSH tunneling can help you connect to 3Kingdoms if you're behind a corporate firewall
                    that blocks normal telnet access. By creating an encrypted tunnel through an SSH connection,
                    you can often bypass these restrictions.
                </p>
                <p>
                    This guide walks you through setting up PuTTY (a small, powerful, and popular connection program)
                    to create an SSH tunnel that routes your MUD connection through an intermediate server.
                </p>
            </div>
        </div>
    </section>

    <!-- Requirements -->
    <section class="ssh-section">
        <div class="container">
            <h2>What You'll Need</h2>
            <div class="requirements-grid">
                <div class="requirement-card">
                    <div class="requirement-icon">
                        <i class="fa-solid fa-server"></i>
                    </div>
                    <h3>SSH Server Access</h3>
                    <p>
                        You'll need access to an SSH server to use as a "leap pad." This could be a personal server,
                        a friend's server, or a shell account. Ask around on the MUD - someone may be able to help.
                    </p>
                </div>
                <div class="requirement-card">
                    <div class="requirement-icon">
                        <i class="fa-solid fa-download"></i>
                    </div>
                    <h3>PuTTY</h3>
                    <p>
                        Download PuTTY (version 0.59 or greater) from
                        <a href="https://www.putty.org/" target="_blank" rel="noopener">putty.org</a>.
                        It's a tiny, portable program with no installation required - just run the executable.
                    </p>
                </div>
                <div class="requirement-card">
                    <div class="requirement-icon">
                        <i class="fa-solid fa-terminal"></i>
                    </div>
                    <h3>MUD Client</h3>
                    <p>
                        Your preferred MUD client (or even basic telnet). Once the tunnel is set up,
                        you'll connect through it using your normal client.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Setup Steps -->
    <section class="ssh-section ssh-section-alt">
        <div class="container">
            <h2>Setting Up PuTTY</h2>

            <div class="setup-steps">
                <!-- Step 1 -->
                <div class="setup-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Configure the Session</h3>
                        <p>Open PuTTY and configure the following settings in the <strong>Session</strong> category:</p>
                        <ul class="config-list">
                            <li><strong>Host Name:</strong> The address of your SSH "leap pad" server</li>
                            <li><strong>Port:</strong> 22</li>
                            <li><strong>Connection type:</strong> SSH</li>
                        </ul>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="setup-step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Configure the Tunnel</h3>
                        <p>
                            Navigate to <strong>Connection &rarr; SSH &rarr; Tunnels</strong> in the left panel.
                            This is where you set up the port forwarding that routes your connection through the tunnel.
                        </p>
                        <ul class="config-list">
                            <li><strong>Source port:</strong> 23</li>
                            <li><strong>Destination:</strong> 3k.org:3000</li>
                            <li>Make sure <strong>Local</strong> is selected</li>
                            <li>Click <strong>Add</strong> - you should see "L23 3k.org:3000" appear in the list</li>
                        </ul>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="setup-step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Save Your Session</h3>
                        <p>
                            Go back to <strong>Session</strong>, enter a name in "Saved Sessions" (like "3K Tunnel"),
                            and click <strong>Save</strong>. This way you won't have to reconfigure everything each time.
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="setup-step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Connect Through the Tunnel</h3>
                        <p>
                            Click <strong>Open</strong> in PuTTY to connect to your SSH server.
                            Log in with your credentials. Keep this window open - it maintains your tunnel.
                        </p>
                        <p>
                            Now, in your MUD client, instead of connecting to <code>3k.org:3000</code>,
                            connect to:
                        </p>
                        <div class="connection-info">
                            <code>localhost:23</code>
                        </div>
                        <p>Your connection will be routed through the SSH tunnel to 3Kingdoms!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Important Notes -->
    <section class="ssh-section">
        <div class="container">
            <h2>Important Notes</h2>

            <div class="notes-grid">
                <div class="note-card note-warning">
                    <div class="note-icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div class="note-content">
                        <h3>Keep PuTTY Running</h3>
                        <p>
                            You must keep PuTTY connected to maintain the tunnel. If you close it,
                            your MUD client will lose its connection path.
                        </p>
                    </div>
                </div>

                <div class="note-card note-info">
                    <div class="note-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div class="note-content">
                        <h3>SSH Encryption</h3>
                        <p>
                            Your data is encrypted through the tunnel, so network administrators cannot
                            see the content of your connection - only that encrypted traffic is flowing.
                        </p>
                    </div>
                </div>

                <div class="note-card note-tip">
                    <div class="note-icon">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                    <div class="note-content">
                        <h3>Low Bandwidth</h3>
                        <p>
                            Text-based MUDs like 3Kingdoms use very little bandwidth, making them
                            ideal for tunneled connections that might otherwise attract attention.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Workplace Considerations -->
    <section class="ssh-section ssh-section-alt">
        <div class="container">
            <h2>Workplace Considerations</h2>
            <div class="considerations-content">
                <p>If you're using this at work, keep these points in mind:</p>
                <ul class="considerations-list">
                    <li>
                        <i class="fa-solid fa-eye"></i>
                        <span>IT staff can see the SSH server you're connected to</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-chart-line"></i>
                        <span>They can see data streaming across the tunnel if they're monitoring</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-lock"></i>
                        <span>They cannot examine the content due to SSH encryption</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-comments"></i>
                        <span>Be prepared to explain it as a technical resource or discussion forum if asked</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-scale-balanced"></i>
                        <span>Don't abuse it - moderate usage is less likely to raise questions</span>
                    </li>
                </ul>
                <p class="disclaimer">
                    <strong>Disclaimer:</strong> Always follow your workplace's acceptable use policies.
                    This guide is provided for educational purposes.
                </p>
            </div>
        </div>
    </section>

    <!-- Back to Connect -->
    <section class="ssh-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Connect?</h2>
                <p>Once your tunnel is set up, you're ready to adventure in the realms!</p>
                <div class="cta-buttons">
                    <a href="/connect/" class="btn-secondary">Back to Connect Options</a>
                    <a href="https://client.wemudtogether.com" target="_blank" class="btn-primary">Play Now</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
</body>
</html>
