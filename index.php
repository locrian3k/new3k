<?php 
$pageTitle = "3Kingdoms - Home";
include 'includes/header.php'; 
?>

  <main id="content">
    <article>
      <section class="hero overlay">
        <h1 class="dark">WELCOME TO THREE KINGDOMS</h1>
        <!-- PLAY NOW -->
        <div class="nav-play-now">
          <button
            class="glowing-btn"
            type="button"
            title="Play 3Kingdoms Now"
            onclick="window.open('https://client.wemudtogether.com');">

            <span class="glowing-txt">Play Now</span>
          </button>
        </div>
        <div class="scroller" data-speed="fast">
          <ul class="tag-list scroller__inner">
            <li><a href="#">Over 700 Areas to Explore</a></li>
            <li>Active Playerbase</li>
            <li>Dedicated Area for Newcomers</li>
            <li>Regular Updates</li>
            <li>Invasions</li>
            <li>Over 700 Areas to Explore</li>
            <li>3 Unique Realms</li>
            <li>Chaos</li>
            <li>Fantasy</li>
            <li>Science</li>
            <li>Dungeons</li>
          </ul>
        </div>
        <div class="scroller scroller_img_area" data-direction="right" data-speed="slow">
          <div class="scroller__inner">
            <img src="/images/scrolling/aruwins_windmill.png"
              loading="lazy" 
              alt="AI generated image windmill in the background of wheat fields" 
              title="Aruwin's Windmill" />
            <img src="/images/scrolling/captain_thistlebeard.png"
              loading="lazy" 
              alt="AI generated image of a short pirate in the main estate room of a ship"
              title="Captain Thistlebeard" />                       
            <img src="/images/scrolling/fern_man_science.png"
              loading="lazy" 
              alt="AI generated image of a giant man covered in plants" 
              title="Fern Man" />
            <img src="/images/scrolling/gamers_house.png" 
              loading="lazy" 
              alt="AI generated image of an extremely messy room"
              title="Gamer's House" />
            <img src="/images/scrolling/icy_blue_portal.png"
              loading="lazy" 
              alt="AI generated image of a frozen tundra with people made of ice" 
              title="Land of the Ice People" />
            <img src="/images/scrolling/lyriac.png" 
              loading="lazy" 
              alt="AI generated image of a fearsome dark knight"
              title="Lyriac" />
            <img src="/images/scrolling/mahjongg.png"
              loading="lazy" 
              alt="AI generated image of a dark forest with a mahjongg gameboard on a wooden table" 
              title="Mahjongg" />
            <img src="/images/scrolling/mantis_swamp.png" 
              loading="lazy" 
              alt="AI generated image of a swamp filled with giant mantes"
              title="Mantis Swamp" />
            <img src="/images/scrolling/murusFaralain.png" 
              loading="lazy" 
              alt="AI generated image of an ancient ruined city"
              title="Murus Faralain" />                
            <img src="/images/scrolling/westerseaDocks.png"
              loading="lazy" 
              alt="AI generated image of boat docks" 
              title="Westersea Docks" />
          </div>
        </div>
        <BR>
        <h2 class="light">EXPLORE THE REALMS TODAY</h2>
      </section>
      <hr class="hr-gradient">
    </article>
    <br>
    <br>
    <article id="about">
      <section>
        <div>
          <h3>Adventure Awaits!</h3>
          <img src="/images/3k_logo_shield_transparent.png" alt="Three Kingdoms logo">

          <div>
            <p>
              Over 32 Years of Free Online Adventure. Dive into 3Kingdoms, a premier online game with decades of continuous developmen where thousands of players have trusted us to deliver a rich, immersive experience with endless areas to explore.
            </p>
          </div>

          <div>
            <h3>Endless Areas to Explore</h3>
            <p>
              Explore thousands of rooms, hundreds of areas, a plethora of quests, and billions of possibilities. Simple enough to pick up quickly, yet complex enough to challenge you for years, 3Kingdoms is the largest and most advanced online adventure available.
            </p>
          </div>    

          <div>
            <h3>Three Unique Realms</h3>
            <p>
              Based around the vibrant town of Pinnacle, 3Kingdoms invites you to explore three distinct realms:
              <br><br>
              <span class="">Fantasy</span>, a medieval world teeming with orcs, elves, and dragons;
              <br>
              <span class="blue">Science</span>, a post-apocalyptic future scarred by war; and
              <br>
              <span class="orange">Chaos</span>, where fantastical and scientific forces collide, creating creatures beyond imagination.
            </p>
            <div class="img-display">
              <img src="/images/3k_fantasy_logo_transparent.png" alt="Three Kingdoms fantasy logo">
              <img src="/images/3k_chaos_logo_transparent.png" alt="Three Kingdoms chaos logo">
              <img src="/images/3k_fantasy_logo_transparent.png" alt="Three Kingdoms fantasy logo">
            </div>
            <p>
              Choose from over a dozen guilds like Knights, Necromancers, Juggernauts, and more. Guilds grant special powers, social hubs, and opportunities to team up with other players. Customize your character with comprehensive skills and abilities that make every journey unique.
            </p>
          </div>

        </div>
      </section>
      <hr class="hr-gradient">
    </article>
    <article>
        <div class="sister-site">
          <img src="/images/3S_logo.png" alt="3Scapes logo">          
          <h2 class="center">EXPLORE OUR SISTER MUD, 3SCAPES, FOR MORE FUN!</h2>
        </div>
        <hr class="hr-gradient">
    </article>
  </main>

  <?php include 'includes/footer.php'; ?>
  <script src="/design/script/script_main.js"></script>
</body>

</html>