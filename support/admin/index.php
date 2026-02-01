<?php
$pageTitle = "Administration - 3Kingdoms";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Main Content -->
<main id="content">
  <!-- Hero Section -->
  <section class="hero hero-default">
    <div class="hero-content">
      <h1 class="hero-title">The Administration</h1>
      <p class="hero-subtitle">The Wizards Behind the Realms</p>
    </div>
  </section>

  <!-- Introduction -->
  <section class="admin-intro">
    <div class="admin-container">
      <p>
        Behind the scenes of 3Kingdoms, a dedicated team of volunteer wizards works tirelessly
        to maintain, develop, and improve the realms. These individuals donate their time and
        expertise to keep the adventure alive for players around the world.
      </p>
      <p>
        The wizardhood is organized into four orders, each responsible for different aspects
        of the game: <strong>Areas</strong>, <strong>Guilds</strong>, <strong>Mudlib</strong>,
        and <strong>Ethos</strong>. Together, they ensure 3Kingdoms continues to evolve while
        honoring over three decades of gaming history.
      </p>
    </div>
  </section>

  <!-- Orders Explanation -->
  <section class="admin-orders">
    <div class="admin-container">
      <div class="section-header">
        <h2 class="section-title">The Four Orders</h2>
        <p class="section-subtitle">How we organize the work behind the realms</p>
      </div>

      <div class="orders-grid">
        <div class="order-card">
          <div class="order-icon">
            <i class="fa-solid fa-map"></i>
          </div>
          <h3>Areas</h3>
          <p>
            Handles all reviews, maintenance, and planning for the vast areas that make
            3Kingdoms the expansive world it is. From dark dungeons to bustling cities,
            the Areas order keeps every corner of the realms alive.
          </p>
        </div>

        <div class="order-card">
          <div class="order-icon">
            <i class="fa-solid fa-shield-halved"></i>
          </div>
          <h3>Guilds</h3>
          <p>
            Manages the development and maintenance of player guilds. Each guild represents
            a unique path through the game, and this order ensures they remain balanced,
            engaging, and full of new content.
          </p>
        </div>

        <div class="order-card">
          <div class="order-icon">
            <i class="fa-solid fa-terminal"></i>
          </div>
          <h3>Mudlib</h3>
          <p>
            The technical backbone of 3Kingdoms. Mudlib manages the core systems, tools,
            and infrastructure that make everything possible. They turn the impossible
            into reality through code.
          </p>
        </div>

        <div class="order-card">
          <div class="order-icon">
            <i class="fa-solid fa-scale-balanced"></i>
          </div>
          <h3>Ethos</h3>
          <p>
            Handles community matters including conflict resolution, rule enforcement,
            public channels, and the recruitment and mentoring of new wizards. They
            keep the community healthy and welcoming.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Archons Section -->
  <section class="admin-archons">
    <div class="admin-container">
      <div class="section-header">
        <h2 class="section-title">Archons</h2>
        <p class="section-subtitle">Senior administrators and order leaders</p>
      </div>

      <div class="archons-grid">
        <div class="archon-card">
          <div class="archon-icon order-guilds">
            <i class="fa-solid fa-shield-halved"></i>
          </div>
          <h3>Tensor</h3>
          <span class="archon-order order-guilds">Guilds</span>
          <p>
            Necromancers Guild, Raveloft, Ant Caves, Der'Thalas, Katin, Lonely Keep,
            and countless other areas and systems.
          </p>
        </div>

        <div class="archon-card">
          <div class="archon-icon order-mudlib">
            <i class="fa-solid fa-terminal"></i>
          </div>
          <h3>Rastafan</h3>
          <span class="archon-order order-mudlib">Mudlib</span>
          <p>
            Monks, Mages, Elementals, Bards guilds. The Abyss, Underdark, Hell,
            and extensive mudlib development.
          </p>
        </div>

        <div class="archon-card">
          <div class="archon-icon order-ethos">
            <i class="fa-solid fa-scale-balanced"></i>
          </div>
          <h3>Kikipopo</h3>
          <span class="archon-order order-ethos">Ethos</span>
          <p>
            Knights Guild, Knight recode, Bailout Quest, Section Z, and community management.
          </p>
        </div>

        <div class="archon-card">
          <div class="archon-icon order-areas">
            <i class="fa-solid fa-map"></i>
          </div>
          <h3>Adalius</h3>
          <span class="archon-order order-areas">Areas</span>
          <span class="archon-order order-admin">Administration</span>
          <p>
            Long-time contributor to the realms, game administration, and author of
            the <a href="/resources/primer/index.html" target="_blank">3K Coding Primer</a>.
          </p>
        </div>

        <div class="archon-card">
          <div class="archon-icon order-admin">
            <i class="fa-solid fa-tower-observation"></i>
          </div>
          <h3>Turnhold</h3>
          <span class="archon-order order-admin">Administration</span>
          <p>
            Dedicated administrator helping guide the future of 3Kingdoms.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Wizards Section -->
  <section class="admin-wizards">
    <div class="admin-container">
      <div class="section-header">
        <h2 class="section-title">Wizards</h2>
        <p class="section-subtitle">The builders and maintainers of the realms</p>
      </div>

      <div class="wizards-grid">
        <div class="wizard-card">
          <div class="wizard-icon order-mudlib">
            <i class="fa-solid fa-terminal"></i>
          </div>
          <h3>Thor</h3>
          <span class="wizard-order order-mudlib">Mudlib</span>
          <p>Server Administration</p>
        </div>

        <div class="wizard-card">
          <div class="wizard-icon order-mudlib">
            <i class="fa-solid fa-terminal"></i>
          </div>
          <h3>Flaxen</h3>
          <span class="wizard-order order-mudlib">Mudlib</span>
          <span class="wizard-order order-areas">Areas</span>
          <p>Sii Guild, Crafting, Missions, Professions</p>
        </div>

        <div class="wizard-card">
          <div class="wizard-icon order-guilds">
            <i class="fa-solid fa-shield-halved"></i>
          </div>
          <h3>Frank</h3>
          <span class="wizard-order order-guilds">Guilds</span>
          <span class="wizard-order order-areas">Areas</span>
          <p>Mage Guild, Guild maintenance, Realm development</p>
        </div>

        <div class="wizard-card">
          <div class="wizard-icon order-guilds">
            <i class="fa-solid fa-shield-halved"></i>
          </div>
          <h3>Crolack</h3>
          <span class="wizard-order order-guilds">Guilds</span>
          <p>Psicorps Guild, Realm development</p>
        </div>
      </div>

      <!-- New Wizards -->
      <div class="new-wizards">
        <h3>Welcome Our Newest Wizards</h3>
        <div class="new-wizards-list">
          <div class="new-wizard">
            <i class="fa-solid fa-star"></i>
            <span>Canislupus</span>
          </div>          
          <div class="new-wizard">
            <i class="fa-solid fa-map"></i>
            <span>Mimic</span>
          </div>
          <div class="new-wizard">
            <i class="fa-solid fa-star"></i>
            <span>Quirk</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Become a Wizard -->
  <section class="admin-join">
    <div class="admin-container">
      <div class="join-card">
        <h2>Interested in Becoming a Wizard?</h2>
        <p>
          The wizardhood is always looking for dedicated players who want to give back
          to the community. If you're passionate about 3Kingdoms and have ideas for
          improving the game, consider applying to become a wizard.
        </p>
        <p>
          To get started, check out the <strong><a href="/resources/primer/index.html">3K Coding Primer</a></strong>,
          a comprehensive guide written by Adalius that covers everything from LPC basics
          to building your own areas, monsters, and more.
        </p>
        <p>
          When you're ready, speak with any current wizard in-game or contact the Ethos
          order to learn more about the application process.
        </p>
        <div class="join-actions">
          <a href="/resources/primer/index.html" class="btn-primary">
            <i class="fa-solid fa-book"></i>
            Read the Primer
          </a>
          <a href="/support/contact/index.php" class="btn-secondary">
            <i class="fa-solid fa-envelope"></i>
            Contact Us
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="admin-cta">
    <div class="admin-container">
      <h2>Experience Their Work</h2>
      <p>Jump into 3Kingdoms and explore the realms our wizards have crafted!</p>
      <div class="cta-buttons">
        <a href="https://client.wemudtogether.com" target="_blank" class="btn-primary">
          Play Now
        </a>
        <a href="/about/3kingdoms/index.php" class="btn-secondary">Learn More</a>
      </div>
    </div>
  </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
</body>

</html>
