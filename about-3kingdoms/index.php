<?php 
$pageTitle = "3Kingdoms - Home";
include 'includes/header.php'; 
?>

    
  <!-- Main Content -->
  <main id="content">
    <!-- Hero Section -->
    <section class="hero hero-about" style="min-height: 60vh; background: linear-gradient(135deg, rgba(7, 15, 25, 0.95), rgba(25, 52, 85, 0.9)), url('/images/castle-images/beautiful-fantasy-landscape-castle-stunning-illustration-232263945_iconl_wide_nowm.webp') center/cover no-repeat;">
      <div class="hero-content">
        <h1 class="hero-title" style="font-size: clamp(2rem, 6vw, 4rem);">About 3Kingdoms</h1>
        <p class="hero-subtitle">
          Over 32 Years of Unparalleled Text-Based Adventure
        </p>
        <div class="hero-actions">
          <button
            class="btn-primary"
            onclick="window.open('https://client.wemudtogether.com');">
            Start Your Adventure
          </button>
        </div>
      </div>
    </section>

    <!-- Introduction Section -->
    <section style="padding: var(--space-3xl) var(--space-lg); background: var(--clr-black); border-bottom: 0.05rem solid var(--clr-accent-main);">
      <div style="max-width: 900px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: var(--space-2xl);">
          <a href="/images/pinnacle.jpg" target="_blank">
            <img src="/images/pinnacle.jpg" alt="The mighty town of Pinnacle" style="max-width: 100%; height: auto; border-radius: var(--card-border-radius); border: 2px solid var(--clr-accent-main); box-shadow: 0 10px 40px rgba(212, 74, 2, 0.3); margin-bottom: var(--space-sm);" />
            <p style="font-size: var(--fs-body-small); color: var(--clr-text-secondary); font-style: italic;">Click to enlarge - The mighty town of Pinnacle</p>
          </a>
        </div>

        <div style="font-family: var(--ff-body); font-size: var(--fs-body-large); line-height: var(--lh-normal); color: var(--clr-text-primary);">
          <p>3Kingdoms is a <strong style="color: var(--clr-text-heading);">free</strong>, unparalleled adventure which through many years of active development has grown to be the largest and most advanced multiplayer online role-playing game in existence. Based around the mighty town of <a href="/images/pinnacle.jpg" target="_blank">Pinnacle</a>, three colossal realms beckon you to explore their mysteries.</p>

          <p>These kingdoms are known as: <strong style="color: var(--clr-fantasy);">Fantasy</strong>, a vast medieval realm full of orcs, elves, dragons, and other mythical creatures; <strong style="color: var(--clr-science);">Science</strong>, a post-apocalyptic, war-torn world set in the not-so-distant future; and <strong style="color: var(--clr-chaos);">Chaos</strong>, a transient realm where the enormous realities of Fantasy and Science collide to produce creatures so bizarre that they have yet to be categorized.</p>

          <p style="text-align: center; margin: var(--space-xl) 0;">
            <a href="/connect.php" style="font-size: var(--fs-body-large); color: var(--clr-text-heading); font-weight: var(--fw-body-bold); text-decoration: underline;">Cut to the chase and learn how to play now</a> or keep reading...
          </p>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section style="padding: var(--space-3xl) var(--space-lg); background: linear-gradient(180deg, var(--clr-bg-main), var(--clr-black)); border-bottom: 0.05rem solid var(--clr-accent-main);">
      <div style="max-width: 1000px; margin: 0 auto;">
        <h2 class="section-title" style="text-align: center; margin-bottom: var(--space-2xl);">Your Questions Answered</h2>

        <div style="display: grid; gap: var(--space-xl);">
          <!-- FAQ Item -->
          <div style="background: rgba(25, 52, 85, 0.3); border: 2px solid rgba(212, 74, 2, 0.3); border-radius: var(--card-border-radius); padding: var(--space-lg);">
            <h3 style="color: var(--clr-text-heading); font-family: var(--ff-heading); font-size: var(--fs-h3); margin-bottom: var(--space-md);">What exactly is the game?</h3>
            <p style="color: var(--clr-text-primary); line-height: var(--lh-normal);">Well, 3Kingdoms (or "3K" if you will) is a text-based adventure. If you've been around a while, think of games such as Zork or Adventure. In 3K, you "read" the world as you play and interact with it, using thousands of intuitive verb commands. Want to wield that sword you just found? You would enter "wield sword". Want to take a closer look at that desk in the secret room you just found? You would enter "examine desk" and then maybe follow up with "search desk" for a closer look. To help you out in the game, all you need to do is type "help" to give you access to 3K's expansive help files. Beyond that, the same files are available online <a href="/help/index.php">right here</a> if you ever need them.</p>
          </div>

          <!-- FAQ Item -->
          <div style="background: rgba(25, 52, 85, 0.3); border: 2px solid rgba(99, 160, 195, 0.3); border-radius: var(--card-border-radius); padding: var(--space-lg);">
            <h3 style="color: var(--clr-text-heading); font-family: var(--ff-heading); font-size: var(--fs-h3); margin-bottom: var(--space-md);">Text? You're kidding me - I want graphics!</h3>
            <p style="color: var(--clr-text-primary); line-height: var(--lh-normal);">There are all kinds of games nowadays where you can get a fancy wrapper around a basic game concept, but we can give you something they cannot. We can guarantee you that the world you experience on 3Kingdoms will be uniquely <em>yours</em>. Why? Think about why the book is always better than the movie. Your imagination is the key. That dragon you see in your head will <em>always</em> beat out the one that some game developer drew up in Photoshop.</p>
          </div>

          <!-- FAQ Item -->
          <div style="background: rgba(25, 52, 85, 0.3); border: 2px solid rgba(212, 160, 46, 0.3); border-radius: var(--card-border-radius); padding: var(--space-lg);">
            <h3 style="color: var(--clr-text-heading); font-family: var(--ff-heading); font-size: var(--fs-h3); margin-bottom: var(--space-md);">So, Multiplayer? What do you mean exactly?</h3>
            <p style="color: var(--clr-text-primary); line-height: var(--lh-normal);">We mean just that. You are sharing 3Kingdoms with thousands of other real people all around the world - dozens to hundreds online at any given time. Now, not everyone is on at the same time - we all have real lives right? Rest assured, they will be back in a few hours to join you in your adventures. You'll meet them, trade with them, join guilds with them and down the road, go out on exciting adventures with them. The community is what really sets 3K apart, and you too can be part of it.</p>
          </div>

          <!-- FAQ Item -->
          <div style="background: rgba(25, 52, 85, 0.3); border: 2px solid rgba(212, 74, 2, 0.3); border-radius: var(--card-border-radius); padding: var(--space-lg);">
            <h3 style="color: var(--clr-text-heading); font-family: var(--ff-heading); font-size: var(--fs-h3); margin-bottom: var(--space-md);">Didn't someone mention somewhere that this can be played from work?</h3>
            <p style="color: var(--clr-text-primary); line-height: var(--lh-normal);">Yes, easily. Being text-based, you don't need anything more than basic telnet to play, meaning you can keep it secret from the boss. Of course, you'll eventually want to upgrade to a more robust gaming client down the road, but even some of these have strategically designed "boss buttons" that will instantly hide the game should you find the need.</p>
          </div>

          <!-- FAQ Item -->
          <div style="background: rgba(25, 52, 85, 0.3); border: 2px solid rgba(99, 160, 195, 0.3); border-radius: var(--card-border-radius); padding: var(--space-lg);">
            <h3 style="color: var(--clr-text-heading); font-family: var(--ff-heading); font-size: var(--fs-h3); margin-bottom: var(--space-md);">Ok, you referred to the 3K 'community' up there? What's that all about?</h3>
            <p style="color: var(--clr-text-primary); line-height: var(--lh-normal); margin-bottom: var(--space-md);">3K is a sort of family, albeit a very large one. Many of our players have been around for years, and some even longer than that. That's the beauty of 3K. Not only does the game change, develop and grow, but so does the community as new people arrive to join our family.</p>
            <p style="color: var(--clr-text-primary); line-height: var(--lh-normal);">Additionally, being that 3Kingdoms is a vast community of many real people, there have been many opportunities for those people to meet beyond the game. From individual couples "hooking up" on their own, to annual, 3K sponsored, <a href="/omp.php">Official Mud Parties</a> (OMP's), many of the gamers have come to be good friends with other people in real life. In fact, there have even been marriages that have resulted from people meeting on 3Kingdoms. No kidding!</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Detailed Features Section -->
    <section style="padding: var(--space-3xl) var(--space-lg); background: var(--clr-black); border-bottom: 0.05rem solid var(--clr-accent-main);">
      <div style="max-width: 1000px; margin: 0 auto;">
        <h2 class="section-title" style="text-align: center; margin-bottom: var(--space-md);">Sounds Cool, Tell Me More</h2>
        <p style="text-align: center; color: var(--clr-text-secondary); font-size: var(--fs-body-large); margin-bottom: var(--space-2xl);">Discover what makes 3Kingdoms truly legendary</p>

        <div style="font-family: var(--ff-body); font-size: var(--fs-body); line-height: var(--lh-normal); color: var(--clr-text-primary);">
          <div style="margin-bottom: var(--space-xl);">
            <h3 style="color: var(--clr-text-heading); font-family: var(--ff-heading); font-size: var(--fs-h3); margin-bottom: var(--space-md); display: flex; align-items: center; gap: var(--space-sm);">
              <i class="fas fa-shield-alt" style="color: var(--clr-accent-main);"></i>
              Guilds
            </h3>
            <p>During your exploration of the realms, you have the opportunity to join any of our fantastic guilds. These guilds, like the Necromancers, the Juggernauts, the Knights, the Breed and many others, allow you to become part of a group and gives you a place to socialize with hundreds of other players that share your interests. Guilds also grant you unique, special powers, furthering your abilities as you explore the vast expanses of each realm. Beyond that, the guilds are massively developed entities unto themselves. You may even find yourself so immersed in the guilds themselves, that you may not even leave the guild halls...nah, you'll get out there and have all kinds of fun in the realms too.</p>
          </div>

          <div style="margin-bottom: var(--space-xl);">
            <h3 style="color: var(--clr-text-heading); font-family: var(--ff-heading); font-size: var(--fs-h3); margin-bottom: var(--space-md); display: flex; align-items: center; gap: var(--space-sm);">
              <i class="fas fa-trophy" style="color: var(--clr-accent-main);"></i>
              Quests
            </h3>
            <p>To challenge you, 3Kingdoms offers you the chance to complete wondrous quests, not unlike the legendary Quest for the Holy Grail. These quests, scattered throughout the realms (and even across them in some cases), tax your intellect as you attempt to solve puzzles, find hidden items, explore dank caverns, and even take on mighty foes to complete the quest and receive the treasured prize. Quests range from simple tasks that take mere minutes to solve, to the most expansive ones that may take you months to complete.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Features List Section -->
    <section style="padding: var(--space-3xl) var(--space-lg); background: linear-gradient(135deg, rgba(212, 74, 2, 0.1), rgba(25, 52, 85, 0.2)); border-bottom: 0.05rem solid var(--clr-accent-main);">
      <div style="max-width: 1000px; margin: 0 auto;">
        <h2 class="section-title" style="text-align: center; margin-bottom: var(--space-2xl);">Exciting Features</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--space-md);">
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Thousands of fellow players to meet and interact with throughout the game</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">More than <em style="color: var(--clr-text-heading);">700+</em> unique areas to explore within the gargantuan realms</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">A dedicated wizard (coder/creator) base with over a century of mudding experience</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Guilds you can join that will blow you away with their content, details, history and wondrous powers</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Unlimited advancement potential including highmortal status and other benefits for ultra-high level players</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Full ANSI color support</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Advanced character customization</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Evocative area themes with robust atmosphere and extensive interaction</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Special holiday events and exciting "wizard boon" days</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Numerous non-combat areas including arcades, awesome virtual simulations, casinos and popular card and board games</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Player owned houses</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Clan World, a simulated player killing area having no effect on your characters</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">Real life gatherings of friends you meet on the game</p>
          </div>
          <div style="display: flex; gap: var(--space-sm); align-items: flex-start;">
            <i class="fas fa-check-circle" style="color: var(--clr-accent-main); font-size: 1.2rem; margin-top: 0.25rem; flex-shrink: 0;"></i>
            <p style="color: var(--clr-text-primary); margin: 0;">And much, much more...</p>
          </div>
        </div>

        <div style="margin-top: var(--space-2xl); padding: var(--space-lg); background: rgba(25, 52, 85, 0.3); border: 2px solid var(--clr-accent-blue); border-radius: var(--card-border-radius); text-align: center;">
          <p style="color: var(--clr-text-primary); line-height: var(--lh-normal); font-size: var(--fs-body-large);">
            3Kingdoms is also the first <a href="https://www.gameaxle.com/cgi-bin/index.pl" target="_blank" style="color: var(--clr-accent-blue); font-weight: var(--fw-body-bold);">Portal™</a>-enhanced MUD! Upgrade your mudding experience with sounds and images from the game, in addition to all the macros, triggers and alias functions you've come to expect from the most advanced MUD client on the planet.
          </p>
        </div>
      </div>
    </section>

    <!-- Call To Action Section -->
    <section class="cta-section">
      <div class="cta-content">
        <h2 class="cta-title">Live the Adventure</h2>
        <p class="cta-text">
          3Kingdoms combines all these features, and so much more, to give you an experience that will stay with you for the rest of your life.
        </p>

        <div class="cta-buttons">
          <button
            class="btn-primary"
            onclick="window.open('https://client.wemudtogether.com');">
            Start Playing Now
          </button>
          <a href="/connect.php" class="btn-secondary">Connection Options</a>
        </div>
      </div>
    </section>
  </main>

  <?php include 'includes/footer.php'; ?>