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
      <button class="realm-tab active" data-realm="fantasy" aria-selected="true">
        <i class="fa-solid fa-hat-wizard"></i>
        <span>Fantasy</span>
      </button>
      <button class="realm-tab" data-realm="science" aria-selected="false">
        <i class="fa-solid fa-atom"></i>
        <span>Science</span>
      </button>
      <button class="realm-tab" data-realm="chaos" aria-selected="false">
        <i class="fa-solid fa-burst"></i>
        <span>Chaos</span>
      </button>
    </div>

    <!-- Fantasy Realm Content -->
    <div class="realm-content active" id="fantasy">
      <div class="realm-header fantasy">
        <img src="/images/logo/3k_fantasy_logo_transparent_small.png" alt="Fantasy Realm" class="realm-content-logo" />
        <h2 class="realm-content-title">The Fantasy Realm</h2>
        <p class="realm-content-tagline">Where magic and myth come alive</p>
        <div class="realm-description">
          <p>
            From the dank swamps south of the thriving city of Wayhaven to the icy reaches of Niroth, this gargantuan realm poses a challenge to any would-be explorer. Rich in original theme and boasting over 250 areas, Fantasy has something for every level of player.
          </p>
          <p>
            Dragons slumber in hidden grottos, dwarves mine the hills, elves reside in the forests, man toils in the cities and all manner of creatures both fair and foul roam the lands. Some only wish to live in peace while others lie in wait, eager to prey on unfortunate victims. So strap on your armour, grab your weapon, and don't forget your torch. Adventure awaits!
          </p>
        </div>
      </div>

      <div class="realm-body">

        <div class="realm-features">
          <h3>Notable Locations</h3>
          <div class="realm-features-grid">
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/aruwins_windmill.png');">
              <h4>Aruwin's Windmill</h4>
              <p>A mysterious windmill on the outskirts of civilization, home to secrets and strange happenings.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/captain_thistlebeard.png');">
              <h4>Thistlebeard's Galleon</h4>
              <p>The legendary pirate captain's ship, sailing the treacherous waters in search of plunder.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/ravenloftBarovia.png');">
              <h4>Barovia</h4>
              <p>The cursed domain of Strahd, where darkness reigns eternal and vampires stalk the mist-shrouded lands.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/rocs_nest.png');">
              <h4>Roc's Nest</h4>
              <p>High atop treacherous peaks, the giant roc guards its nest with deadly vigilance.</p>
            </div>
          </div>
        </div>

        <div class="realm-guilds">
          <h3>Fantasy Guilds</h3>
          <p>Several guilds call the Fantasy realm their primary home:</p>
          <ul class="realm-guild-list">
            <li><strong>Knights</strong> - Noble warriors bound by honor and duty</li>
            <li><strong>Mages</strong> - Masters of arcane arts and elemental forces</li>
            <li><strong>Necromancers</strong> - Dark practitioners who command the undead</li>
            <li><strong>Clerics</strong> - Divine servants wielding holy power</li>
            <li><strong>Bards</strong> - Wandering musicians whose songs carry magic</li>
          </ul>
        </div>

      </div>
    </div>

    <!-- Science Realm Content -->
    <div class="realm-content" id="science">
      <div class="realm-header science">
        <img src="/images/logo/3k_science_logo_transparent_small.png" alt="Science Realm" class="realm-content-logo" />
        <h2 class="realm-content-title">The Science Realm</h2>
        <p class="realm-content-tagline">A post-apocalyptic future awaits</p>
        <div class="realm-description">
          <p>
            Step through a portal into a realm waiting to be explored. From the shining cyber cities of New America to the desolate wastelands of the Techno-Ruins, the realm of Science offers a host of wonders as yet undiscovered.
          </p>
          <p>
            Explore Mars, and find out if it really does have a red sky - combat the Borg in a fight for survival - attempt to survive the perils of the deadly traffic of Atlanta, or just hang out at the Nano Cantina. Science offers a challenge for players of all levels. Step into the future and visit the realm of Science. You never know what you'll find!
          </p>
        </div>
      </div>

      <div class="realm-body">

        <div class="realm-features">
          <h3>Notable Locations</h3>
          <div class="realm-features-grid">
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/gen_lab.png');">
              <h4>Gen Labs</h4>
              <p>Cutting-edge research facilities where the boundaries of human evolution are pushed ever further.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/houstonTransport.png');">
              <h4>Midway Space Station</h4>
              <p>Humanity's foothold in space, where the elite live above the troubles of Earth.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/lastChanceTruckStop.png');">
              <h4>Last Chance Truck Stop</h4>
              <p>A haven for road warriors and wanderers in the irradiated wastelands between cities.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/fern_man_science.png');">
              <h4>Fern Man's Domain</h4>
              <p>A bizarre corner of the realm where plant and machine have merged in unexpected ways.</p>
            </div>
          </div>
        </div>

        <div class="realm-guilds">
          <h3>Science Guilds</h3>
          <p>These guilds thrive in the technological landscape:</p>
          <ul class="realm-guild-list">
            <li><strong>Juggernauts</strong> - Heavily armored combat specialists with devastating firepower</li>
            <li><strong>Cyborgs</strong> - Human-machine hybrids enhanced beyond natural limits</li>
            <li><strong>Engineers</strong> - Technical geniuses who bend technology to their will</li>
            <li><strong>Psicorps</strong> - Psychic operatives with powers of the mind</li>
          </ul>
        </div>

      </div>
    </div>

    <!-- Chaos Realm Content -->
    <div class="realm-content" id="chaos">
      <div class="realm-header chaos">
        <img src="/images/logo/3k_chaos_logo_transparent_small.png" alt="Chaos Realm" class="realm-content-logo" />
        <h2 class="realm-content-title">The Chaos Realm</h2>
        <p class="realm-content-tagline">Where reality bends and breaks</p>
        <div class="realm-description">
          <p>
            Through the swirling vortex of mist and nightmare that brushes the northern edge of Pinnacle, you find the twisted realm of Chaos. Bring your wits, but leave your assumptions behind, because this realm will challenge your mind and blow away all that you think you know.
          </p>
          <p>
            Be you strong or weak, young or old, Chaos holds a place for you somewhere in its mystifying depths. Terrifying monsters coexist with cartoon heroes, fantastic characters mix with the unknown and the strange and familiar mingle to produce the unexpected. Come and expect the unexpected!
          </p>
        </div>
      </div>

      <div class="realm-body">

        <div class="realm-features">
          <h3>Notable Locations</h3>
          <div class="realm-features-grid">
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/gamers_house.png');">
              <h4>Gamer's House</h4>
              <p>A peculiar dwelling where reality and games blur together in unexpected ways.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/mahjongg.png');">
              <h4>Mahjongg</h4>
              <p>An ancient gaming hall where tiles hold more power than they appear.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/terras_terrific_treehouse.png');">
              <h4>Terra's Terrific Treehouse</h4>
              <p>A whimsical treehouse that defies the laws of physics and architecture.</p>
            </div>
            <div class="realm-feature-item" style="background-image: url('/images/scrolling/icy_blue_portal.png');">
              <h4>The Icy Blue Portal</h4>
              <p>A shimmering gateway to unknown dimensions, frozen in eternal twilight.</p>
            </div>
          </div>
        </div>

        <div class="realm-guilds">
          <h3>Chaos Guilds</h3>
          <p>Those who embrace the unpredictable find their home here:</p>
          <ul class="realm-guild-list">
            <li><strong>Changelings</strong> - Shapeshifters who adapt to any situation</li>
            <li><strong>Bladesingers</strong> - Warriors who weave magic into their combat techniques</li>
            <li><strong>Monks</strong> - Disciplined martial artists who find order within chaos</li>
          </ul>
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