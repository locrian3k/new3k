<?php
$pageTitle = "Contact Us - 3Kingdoms";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Main Content -->
<main id="content">
  <!-- Hero Section -->
  <section class="hero hero-default">
    <div class="hero-content">
      <h1 class="hero-title">Contact Us</h1>
      <p class="hero-subtitle">Get in Touch with 3Kingdoms</p>
    </div>
  </section>

  <!-- Introduction -->
  <section class="contact-intro">
    <div class="contact-container">
      <div class="intro-card">
        <h2>How Can We Help?</h2>
        <p>
          Whether you have questions about the game, feedback on our website, or need assistance
          with your account, we're here to help. Choose the appropriate contact method below
          to ensure your message reaches the right people.
        </p>
        <p>
          For the fastest response to gameplay questions, we recommend asking in-game or
          visiting our <a href="https://forums.3k.org" target="_blank">community forums</a>
          where experienced players and staff are always happy to help.
        </p>
      </div>
    </div>
  </section>

  <!-- Contact Methods -->
  <section class="contact-methods">
    <div class="contact-container">
      <div class="section-header">
        <h2 class="section-title">Contact Methods</h2>
        <p class="section-subtitle">Choose the best way to reach us</p>
      </div>

      <div class="contact-grid">
        <!-- Web Related -->
        <div class="contact-card">
          <div class="contact-card-header">
            <i class="fa-solid fa-globe"></i>
            <h3>Web Related Queries</h3>
          </div>
          <p>
            For questions, complaints, or suggestions about our website and all other sites
            hosted at 3k.org, please contact our webmaster.
          </p>
          <div class="contact-info">
            <a href="mailto:webmaster@3k.org" class="contact-email">
              <i class="fa-solid fa-envelope"></i>
              webmaster@3k.org
            </a>
          </div>
          <p class="contact-note">
            All emails will be read within seven days. A response may not be returned to all
            messages, but your feedback is always welcome and helps us improve.
          </p>
        </div>

        <!-- MUD Related -->
        <div class="contact-card">
          <div class="contact-card-header">
            <i class="fa-solid fa-keyboard"></i>
            <h3>MUD Related Questions</h3>
          </div>
          <p>
            For questions about 3Kingdoms or 3Scapes gameplay, rules, or administration,
            you can reach our MUD team directly.
          </p>
          <div class="contact-info">
            <a href="mailto:mud@3k.org" class="contact-email">
              <i class="fa-solid fa-envelope"></i>
              mud@3k.org
            </a>
          </div>
          <p class="contact-note">
            Please keep your message brief and to the point. Many emails come to this account,
            and concise messages help us respond more efficiently. All questions will be read,
            but we cannot promise a response to every query.
          </p>
        </div>

        <!-- VAF Support -->
        <div class="contact-card">
          <div class="contact-card-header">
            <i class="fa-solid fa-credit-card"></i>
            <h3>VAF Support</h3>
          </div>
          <p>
            For questions about VAF credits, purchases, or rewards, use the in-game mail
            system to contact our VAF support team.
          </p>
          <div class="contact-info">
            <div class="contact-command">
              <i class="fa-solid fa-terminal"></i>
              <code>mail VAFS</code>
              <span class="contact-command-note">(in-game)</span>
            </div>
          </div>
          <p class="contact-note">
            This is the fastest way to get help with VAF-related issues. Make sure to include
            your character name and details about your purchase or question.
          </p>
        </div>

        <!-- Community Forums -->
        <div class="contact-card">
          <div class="contact-card-header">
            <i class="fa-solid fa-comments"></i>
            <h3>Community Forums</h3>
          </div>
          <p>
            For general questions, discussions, and connecting with the 3Kingdoms community,
            visit our forums where players and staff actively participate.
          </p>
          <div class="contact-info">
            <a href="https://forums.3k.org" target="_blank" class="contact-link">
              <i class="fa-solid fa-external-link-alt"></i>
              forums.3k.org
            </a>
          </div>
          <p class="contact-note">
            The forums are a great place to find answers to common questions, share experiences,
            and become part of our community.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- In-Game Help -->
  <section class="contact-ingame">
    <div class="contact-container">
      <div class="section-header">
        <h2 class="section-title">In-Game Resources</h2>
        <p class="section-subtitle">Get help while you play</p>
      </div>

      <div class="ingame-grid">
        <div class="ingame-card">
          <div class="ingame-icon">
            <i class="fa-solid fa-question-circle"></i>
          </div>
          <h3>Help Command</h3>
          <code>help &lt;topic&gt;</code>
          <p>Access the extensive in-game help system for information on commands, guilds, areas, and more.</p>
        </div>

        <div class="ingame-card">
          <div class="ingame-icon">
            <i class="fa-solid fa-user-group"></i>
          </div>
          <h3>Newbie Channel</h3>
          <code>newbie &lt;message&gt;</code>
          <p>Ask questions on the newbie channel - experienced players are always willing to help newcomers.</p>
        </div>

        <div class="ingame-card">
          <div class="ingame-icon">
            <i class="fa-solid fa-bullhorn"></i>
          </div>
          <h3>Chat Channel</h3>
          <code>flapchat &lt;message&gt;</code>
          <p>Join the general chat channel to connect with other players and get quick answers.</p>
        </div>

        <div class="ingame-card">
          <div class="ingame-icon">
            <i class="fa-solid fa-bug"></i>
          </div>
          <h3>Report Bugs</h3>
          <code>bug &lt;description&gt;</code>
          <p>Found a bug? Use the bug command to report issues directly to our development team.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="contact-cta">
    <div class="contact-container">
      <h2>Ready to Play?</h2>
      <p>Jump into 3Kingdoms and experience the adventure for yourself!</p>
      <div class="cta-buttons">
        <a href="https://client.wemudtogether.com" target="_blank" class="btn-primary">
          Play Now
        </a>
        <a href="/connect/index.php" class="btn-secondary">Connection Options</a>
      </div>
    </div>
  </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
</body>

</html>
