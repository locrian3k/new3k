<?php
$pageTitle = "The Three Realms - 3Kingdoms";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Main Content -->
<main id="content">
  <!-- Hero Section -->
  <section class="hero hero-realms">
    <div class="hero-content">
      <h1 class="hero-title">The Realms</h1>
      <p class="hero-subtitle">
        Explore three distinct worlds, each with unique challenges, creatures, and legends
      </p>
    </div>
  </section>

  <!-- Realm Tabs Section -->
  <section class="realms-tabs-section">
    <div class="realm-tabs">
      <button id="fantasy-link" class="realm-tab active" data-realm="fantasy" aria-selected="true">
        <i class="fa-solid fa-hat-wizard"></i>
        <span>Fantasy</span>
      </button>
      <button id="science-link" class="realm-tab" data-realm="science" aria-selected="false">
        <i class="fa-solid fa-atom"></i>
        <span>Science</span>
      </button>
      <button id="chaos-link" class="realm-tab" data-realm="chaos" aria-selected="false">
        <i class="fa-solid fa-burst"></i>
        <span>Chaos</span>
      </button>
    </div>

    <!-- Fantasy Realm Content -->
    <div class="realm-content active" id="fantasy">
      <div class="realm-header fantasy">
        <img src="/images/logo/3k_fantasy_logo_transparent_small.png" alt="Fantasy Realm" class="realm-content-logo" />
        <h2 class="realm-content-title">The Fantasy Realm</h2>
        <p class="realm-content-tagline">Where magic and myth come alive.</p>
        <div class="realm-description">
          <p>
            From the dank swamps south of the thriving city of Wayhaven to the icy reaches of Niroth, this gargantuan
            realm poses a challenge to any would-be explorer. Rich in original theme and boasting over 250 areas,
            Fantasy has something for every level of player.
          </p>
          <p>
            Dragons slumber in hidden grottos, dwarves mine the hills, elves reside in the forests, man toils in the
            cities and all manner of creatures both fair and foul roam the lands. Some only wish to live in peace while
            others lie in wait, eager to prey on unfortunate victims. So strap on your armour, grab your weapon, and
            don't forget your torch. Adventure awaits!
          </p>
        </div>
      </div>

      <div class="realm-body">

        <div class="realm-features">
          <h3>Notable Locations</h3>
          <div class="realm-features-grid">
            <div class="realm-feature-item" style="background-image: url('/images/ai-areas/icy_blue_portal.png');">
              <h4>Land of the Ice People</h4>
              <p>A peaceful village tucked away in the deep frost.
              </p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/ai-areas/murusFaralain.png');">
              <h4>Murus Faralain</h4>
              <p>Lost in time, the fabled city of the elves was over-run by an orcish invasion over 600 years ago.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/ai-areas/westerseaDocks.png');">
              <h4>Westersea Docks</h4>
              <p>A major city full of ancient secrets and opportunity.</p>
            </div>
          </div>
        </div>

        <div class="realm-quests">
          <h3>Featured Quests</h3>
          <p>Fantasy offers 42 quests ranging from beginner puzzles to legendary challenges:</p>
          <div class="realm-quest-grid">
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Ravenloft</h4>
                <span class="quest-points">100 QP</span>
              </div>
              <p>Venture into the cursed domain of Strahd. Only the bravest and most skilled adventurers dare attempt this legendary challenge.</p>
            </div>
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Dragon Egg</h4>
                <span class="quest-points">50 QP</span>
              </div>
              <p>A dangerous quest involving the sacred eggs of dragonkind. Tread carefully around these ancient creatures.</p>
            </div>
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Haunted Manor</h4>
                <span class="quest-points">25 QP</span>
              </div>
              <p>Explore a decrepit mansion filled with restless spirits and uncover the dark secrets within its walls.</p>
            </div>
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Orc Slayer</h4>
                <span class="quest-points">10 QP</span>
              </div>
              <p>Prove your worth as a warrior by taking on the orc menace threatening the peaceful villages.</p>
            </div>
          </div>
          <p class="realm-quests-link">Type <code>questlist</code> in-game for a full list of quests.</p>
        </div>

        <div class="realm-nav-links">
          <span>Explore other realms:</span>
          <button class="realm-nav-btn science" data-realm="science">
            <i class="fa-solid fa-atom"></i> Science
          </button>
          <button class="realm-nav-btn chaos" data-realm="chaos">
            <i class="fa-solid fa-burst"></i> Chaos
          </button>
        </div>

      </div>
    </div>

    <!-- Science Realm Content -->
    <div class="realm-content" id="science">
      <div class="realm-header science">
        <img src="/images/logo/3k_science_logo_transparent_small.png" alt="Science Realm" class="realm-content-logo" />
        <h2 class="realm-content-title">The Science Realm</h2>
        <p class="realm-content-tagline">A post-apocalyptic future awaits.</p>
        <div class="realm-description">
          <p>
            Step through a portal into a realm waiting to be explored. From the shining cyber cities of New America to
            the desolate wastelands of the Techno-Ruins, the realm of Science offers a host of wonders as yet
            undiscovered.
          </p>
          <p>
            Explore Mars, and find out if it really does have a red sky - combat the Borg in a fight for survival -
            attempt to survive the perils of the deadly traffic of Atlanta, or just hang out at the Nano Cantina.
            Science offers a challenge for players of all levels. Step into the future and visit the realm of Science.
            You never know what you'll find!
          </p>
        </div>
      </div>

      <div class="realm-body">

        <div class="realm-features">
          <h3>Notable Locations</h3>
          <div class="realm-features-grid">
            <div class="realm-feature-item" style="background-image: url('/images/ai-areas/houstonTransport.png');">
              <h4>Midway Space Station</h4>
              <p>Humanity's foothold in space, where the elite live above the troubles of Earth.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/ai-areas/lastChanceTruckStop.png');">
              <h4>Last Chance Truck Stop</h4>
              <p>A haven for road warriors and wanderers in the irradiated wastelands between cities.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/ai-areas/mantis_swamp.png');">
              <h4>Mantis Swamp</h4>
              <p>A swampland ravaged by the nuclear fallout, occupied by monstrous mantises.</p>
            </div>
          </div>
        </div>

        <div class="realm-quests">
          <h3>Featured Quests</h3>
          <p>Science offers 9 quests in this high-tech realm:</p>
          <div class="realm-quest-grid">
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Megatech</h4>
                <span class="quest-points">65 QP</span>
              </div>
              <p>Infiltrate the massive Megatech corporation and uncover their darkest technological secrets.</p>
            </div>
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>The Project</h4>
                <span class="quest-points">55 QP</span>
              </div>
              <p>A mysterious government project has gone wrong. Investigate before it's too late.</p>
            </div>
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Shadowrun</h4>
                <span class="quest-points">30 QP</span>
              </div>
              <p>Enter the cyberpunk underworld where megacorps rule and runners live by their wits.</p>
            </div>
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Codename: Kodiak</h4>
                <span class="quest-points">5 QP</span>
              </div>
              <p>A perfect starting quest for new agents looking to prove themselves in the field.</p>
            </div>
          </div>
          <p class="realm-quests-link">Type <code>questlist</code> in-game for a full list of quests.</p>
        </div>

        <div class="realm-nav-links">
          <span>Explore other realms:</span>
          <button class="realm-nav-btn fantasy" data-realm="fantasy">
            <i class="fa-solid fa-hat-wizard"></i> Fantasy
          </button>
          <button class="realm-nav-btn chaos" data-realm="chaos">
            <i class="fa-solid fa-burst"></i> Chaos
          </button>
        </div>

      </div>
    </div>

    <!-- Chaos Realm Content -->
    <div class="realm-content" id="chaos">
      <div class="realm-header chaos">
        <img src="/images/logo/3k_chaos_logo_transparent_small.png" alt="Chaos Realm" class="realm-content-logo" />
        <h2 class="realm-content-title">The Chaos Realm</h2>
        <p class="realm-content-tagline">Where reality bends and breaks.</p>
        <div class="realm-description">
          <p>
            Through the swirling vortex of mist and nightmare that brushes the northern edge of Pinnacle, you find the
            twisted realm of Chaos. Bring your wits, but leave your assumptions behind, because this realm will
            challenge your mind and blow away all that you think you know.
          </p>
          <p>
            Be you strong or weak, young or old, Chaos holds a place for you somewhere in its mystifying depths.
            Terrifying monsters coexist with cartoon heroes, fantastic characters mix with the unknown and the strange
            and familiar mingle to produce the unexpected. Come and expect the unexpected!
          </p>
        </div>
      </div>

      <div class="realm-body">

        <div class="realm-features">
          <h3>Notable Locations</h3>
          <div class="realm-features-grid">
            <div class="realm-feature-item" style="background-image: url('/images/ai-areas/gamers_house.png');">
              <h4>Gamer's House</h4>
              <p>A peculiar dwelling where reality and games blur together in unexpected ways.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/ai-areas/mahjongg.png');">
              <h4>Mahjongg</h4>
              <p>An ancient gaming hall where tiles hold more power than they appear.</p>
            </div>
            <div class="realm-feature-item"
              style="background-image: url('/images/ai-areas/terras_terrific_treehouse.png');">
              <h4>Terra's Terrific Treehouse</h4>
              <p>An enormous tree, guarded by root warriors who serve their master, Terra.</p>
            </div>
          </div>
        </div>

        <div class="realm-quests">
          <h3>Featured Quests</h3>
          <p>Chaos offers 27 quests where reality bends and anything is possible:</p>
          <div class="realm-quest-grid">
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Evil God</h4>
                <span class="quest-points">90 QP</span>
              </div>
              <p>Confront a malevolent deity in this ultimate test of power and will. Few have survived the attempt.</p>
            </div>
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Mortal Kombat</h4>
                <span class="quest-points">45 QP</span>
              </div>
              <p>Enter the tournament where warriors from all realms fight for supremacy. Test your might!</p>
            </div>
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Dragonball Z</h4>
                <span class="quest-points">40 QP</span>
              </div>
              <p>Power levels are off the charts in this anime-inspired adventure across time and space.</p>
            </div>
            <div class="realm-quest-card">
              <div class="quest-header">
                <h4>Destroy Barney</h4>
                <span class="quest-points">10 QP</span>
              </div>
              <p>The purple menace must be stopped. A fan-favorite quest that's exactly what it sounds like.</p>
            </div>
          </div>
          <p class="realm-quests-link">Type <code>questlist</code> in-game for a full list of quests.</p>
        </div>

        <div class="realm-nav-links">
          <span>Explore other realms:</span>
          <button class="realm-nav-btn fantasy" data-realm="fantasy">
            <i class="fa-solid fa-hat-wizard"></i> Fantasy
          </button>
          <button class="realm-nav-btn science" data-realm="science">
            <i class="fa-solid fa-atom"></i> Science
          </button>
        </div>

      </div>
    </div>
  </section>

  <!-- Call To Action Section -->
  <section class="cta-section">
    <div class="cta-content">
      <h2 class="cta-title">Ready to Explore?</h2>
      <p class="cta-text">
        All three realms are accessible from the central hub of Pinnacle.
        Create your character and begin your journey today.
      </p>

      <div class="cta-buttons">
        <button class="btn-primary" onclick="window.open('https://client.wemudtogether.com');">
          Start Playing
        </button>
        <a href="/guilds/index.php" class="btn-secondary">Explore Guilds</a>
      </div>
    </div>
  </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
</body>

</html>