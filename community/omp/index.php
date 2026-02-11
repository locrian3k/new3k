<?php
$pageTitle = "The Gatherings - Official MUD Parties";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<link rel="stylesheet" href="/design/style/styles_main.css">

<!-- Main Content -->
<main id="content">
  <!-- Hero Section -->
  <section class="hero hero-omp">
    <div class="hero-content">
      <h1 class="hero-title">The Gatherings</h1>
      <p class="hero-subtitle">Official MUD Parties Since 1998</p>
    </div>
  </section>

  <!-- Introduction Section -->
  <section class="omp-intro">
    <div class="omp-container">
      <div class="intro-content">
        <p class="lead-text">
          Since 1998, 3Kingdoms players have gathered once a year at an official MUD party (aka OMP).
          Players from as far as Australia and Sweden have journeyed to the United States
          to meet the people they've adventured with online.
        </p>
        <p>
          These gatherings have always included sponsored activities, plenty of time for
          socialization, fun and games. It's a chance to put faces to names and strengthen
          the bonds formed through years of shared adventures in the three realms.
        </p>
      </div>
    </div>

    <!-- Statistics -->
    <div class="omp-stats">
      <div class="omp-container">
        <div class="stats-grid">
          <div class="stat-item">
            <span class="stat-number">17</span>
            <span class="stat-label">Gatherings Held</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">25+</span>
            <span class="stat-label">Years of Tradition</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">14</span>
            <span class="stat-label">Cities Visited</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">1998</span>
            <span class="stat-label">First Gathering</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Gatherings Timeline -->
  <section class="omp-timeline">
    <div class="omp-container">
      <h2 class="section-title">A History of Gatherings</h2>
      <p class="section-subtitle">Click on any gathering to learn more about its stories and memories</p>

      <!-- Timeline generated dynamically from script_omp.js -->
      <div class="timeline" id="omp-timeline"></div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="omp-cta">
    <div class="omp-container">
      <div class="cta-content">
        <h2>Part of the Community</h2>
        <p>
          The gatherings are a testament to the lasting friendships formed through 3Kingdoms.
          While we may adventure in a virtual world, the connections we make are very real.
        </p>
        <div class="cta-buttons">
          <a href="https://client.wemudtogether.com" target="_blank" class="btn-primary">Join the Adventure</a>
          <a href="/community/wholist.php" class="btn-secondary">See Who's Online</a>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- OMP Modal -->
<div class="omp-modal" id="ompModal">
  <div class="omp-modal-content">
    <button class="omp-modal-close" aria-label="Close modal">&times;</button>
    <div class="omp-modal-header">
      <span class="modal-year"></span>
      <h2 class="modal-location"></h2>
      <p class="modal-dates"></p>
    </div>
    <div class="omp-modal-body">
      <!-- Content loaded dynamically -->
    </div>
  </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
<script src="/design/script/script_omp.js"></script>
</body>

</html>