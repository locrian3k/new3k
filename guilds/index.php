<?php
$pageTitle = "Guilds - 3Kingdoms";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Main Content -->
<main id="content">
  <!-- Hero Section -->
  <section class="hero hero-guild">
    <div class="hero-content">
      <h1 class="hero-title">Guilds of 3Kingdoms</h1>
      <p class="hero-subtitle">Choose Your Path to Power</p>
    </div>
  </section>

  <!-- Introduction -->
  <section class="guilds-intro">
    <div class="guilds-container">
      <p class="intro-text">
        Guilds are the heart of your character's identity in 3Kingdoms. Each guild offers unique powers,
        abilities, and playstyles. Whether you seek the arcane mysteries of magic, the discipline of
        martial combat, or the technological edge of science fiction, there's a guild waiting for you.
      </p>
      <p class="intro-text">
        New players start in the <strong>Adventurer</strong> guild and can join a full guild upon reaching
        Level 5. Choose wisely, your guild will shape your entire journey through the realms.
      </p>
    </div>
  </section>

  <!-- Adventurer - Starting Guild -->
  <section class="guilds-section guilds-starter">
    <div class="guilds-container">
      <div class="section-header">
        <h2 class="section-title">Starting Guild</h2>
        <p class="section-subtitle">Where every adventurer begins their journey</p>
      </div>

      <div class="guild-split guild-split-single">
        <!-- Adventurer -->
        <div class="guild-split-card card-blue">
          <img src="/images/logo/guilds/guild_logo_adventurer.png" alt="Adventurer Guild" class="guild-split-logo" loading="lazy">
          <h3>Adventurer</h3>
          <span class="guild-split-badge">Default Starting Guild</span>
          <p>Your default starting guild. Learn the basics with consider, fireball, shock, and missile spells. The Adventurer's advancement room is up from the Login room. Join a full guild upon reaching Level 5.</p>
          <div class="guild-split-requirements">
            <span class="guild-tag">Starter</span>
            <span class="guild-tag">Level 1-5</span>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Core Guilds -->
  <section class="guilds-section guilds-core">
    <div class="guilds-container">
      <div class="section-header">
        <h2 class="section-title">Core Guilds</h2>
        <p class="section-subtitle">Quick-start guilds designed for casual players - faster advancement with level caps</p>
      </div>

      <div class="guild-split guild-split-quad">
        <!-- Android -->
        <div class="guild-split-card card-gold">
          <img src="/images/logo/guilds/guild_logo_android.png" alt="Android Guild" class="guild-split-logo" loading="lazy">
          <h3>Android</h3>
          <span class="guild-split-badge">Core</span>
          <p>Highly customizable robots that can deal death or absorb the most deadly of blows. With an array of components, they fit any situation - offensive, defensive, or balanced.</p>
          <div class="guild-split-requirements">
            <span class="guild-tag">Customizable</span>
            <span class="guild-tag">Versatile</span>
          </div>
        </div>

        <!-- Cleric -->
        <div class="guild-split-card card-gold">
          <img src="/images/logo/guilds/guild_logo_cleric.png" alt="Cleric Guild" class="guild-split-logo" loading="lazy">
          <h3>Cleric</h3>
          <span class="guild-split-badge">Core</span>
          <p>Spiritual healers with offensive and defensive spells. Learn healing, utility spells, and powerful attacks that target an opponent's weakest defenses.</p>
          <div class="guild-split-requirements">
            <span class="guild-tag">Healer</span>
            <span class="guild-tag">Spellcaster</span>
          </div>
        </div>

        <!-- Fighter -->
        <div class="guild-split-card card-gold">
          <img src="/images/logo/guilds/guild_logo_fighter.png" alt="Fighter Guild" class="guild-split-logo" loading="lazy">
          <h3>Fighter</h3>
          <span class="guild-split-badge">Core</span>
          <p>Elite warriors focused on physical combat. Absorb huge attacks with armour and destroy opponents with weapons. Equipment is key to overwhelming stronger enemies.</p>
          <div class="guild-split-requirements">
            <span class="guild-tag">Tank</span>
            <span class="guild-tag">Melee</span>
          </div>
        </div>

        <!-- Sorcerer -->
        <div class="guild-split-card card-gold">
          <img src="/images/logo/guilds/guild_logo_sorcerer.png" alt="Sorcerer Guild" class="guild-split-logo" loading="lazy">
          <h3>Sorcerer</h3>
          <span class="guild-split-badge">Core</span>
          <p>Masters of elemental magics. Fire and ice bend to their will for protection and destruction. At high levels, summon powerful golems to defend in battle.</p>
          <div class="guild-split-requirements">
            <span class="guild-tag">Caster</span>
            <span class="guild-tag">Elemental</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Full Guilds -->
  <section class="guilds-section guilds-full">
    <div class="guilds-container">
      <div class="section-header">
        <h2 class="section-title">Full Guilds</h2>
        <p class="section-subtitle">Traditional guilds with deeper progression, unique themes, and no level caps</p>
        <p class="flip-hint"><i class="fa-solid fa-hand-pointer"></i> Click a card to learn more</p>
      </div>

      <div class="guild-flip-grid">
        <!-- Angel -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Angel</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Divine</span>
                <span class="guild-tag">Balance</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_angel.png" alt="Angel Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Angel</h3>
              <p>Mortals imbued with divine spark to restore cosmic balance. Develop martial combat, divine powers, or combine both. Your wings await.</p>
              <p class="guild-help-hint">In-game: <code>help angel</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Bards -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Bard</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Versatile</span>
                <span class="guild-tag">Music</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_bard.png" alt="Bards Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Bard</h3>
              <p>Passionate souls nourished by beauty and drawn to mystery. Master deadly combat songs, pure physical combat, soothing instruments, or shadow arts to gather knowledge unseen.</p>
              <p class="guild-help-hint">In-game: <code>help bards</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Bladesingers -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Bladesinger</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Elven</span>
                <span class="guild-tag">Runes</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_bladesinger.png" alt="Bladesingers Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Bladesinger</h3>
              <p>Ancient elven warriors returned to teach the old ways. Master fighting styles, read ancient runes, and call upon the Unseelie Court of the faerie world to enhance your combat.</p>
              <p class="guild-help-hint">In-game: <code>help bladesingers</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Breed -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Breed</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Psionic</span>
                <span class="guild-tag">Ancient</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_breed.png" alt="Breed Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Breed</h3>
              <p>One of the eldest races, returned from exile with the power of the mind. Secretive, diverse, and highly individual. Each Breed forges their own destiny.</p>
              <p class="guild-help-hint">In-game: <code>help breed</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Changelings -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Changeling</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Shapeshifter</span>
                <span class="guild-tag">Unique</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_changeling.png" alt="Changelings Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Changeling</h3>
              <p>An ancient race with unnatural control over their cells. Shapeshift into mammals, reptiles, avians, and rumored dinosaur forms with lethal natural weaponry.</p>
              <p class="guild-help-hint">In-game: <code>help changelings</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Cyborg -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Cyborg</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Implants</span>
                <span class="guild-tag">Tech</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_cyborg.png" alt="Cyborg Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Cyborg</h3>
              <p>"More human than human." The Cybernetic Research Corporation provides implants designed to maximize damage resistance, environmental mastery, and dealing death.</p>
              <p class="guild-help-hint">In-game: <code>help cyborg</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Elemental -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Elemental</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Elements</span>
                <span class="guild-tag">Offensive</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_elemental.png" alt="Elemental Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Elemental</h3>
              <p>Draw power from Fire, Water, Air, and Earth. Master each element independently before combining them. Renowned for sheer force and environmental manipulation.</p>
              <p class="guild-help-hint">In-game: <code>help elemental</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Fremen -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Fremen</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Dune</span>
                <span class="guild-tag">Tribal</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_fremen.png" alt="Fremen Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Fremen</h3>
              <p>Fierce desert warriors from Arrakis. Swift attacks, mental anguish, mind control, and meditative self-healing. Enhanced fighting in groups.</p>
              <p class="guild-help-hint">In-game: <code>help fremen</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Gentech -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Gentech</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Genetic</span>
                <span class="guild-tag">Experimental</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_gentech.png" alt="Gentech Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Gentech</h3>
              <p>Refugees from a future sector war. Balance genetic enhancement and advanced technology. Perform experiments to acquire any power - the guild of choice.</p>
              <p class="guild-help-hint">In-game: <code>help gentech</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Jedi -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Jedi</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Star Wars</span>
                <span class="guild-tag">Force</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_jedi.png" alt="Jedi Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Jedi</h3>
              <p>No two Jedi advance the same way. Choose from 17 careers and 49 ability skills. Lightsabers, lightning, healing - all available if you train. Beware the Dark Side.</p>
              <p class="guild-help-hint">In-game: <code>help jedi</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Juggernaut -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Juggernaut</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Battletech</span>
                <span class="guild-tag">Battle armor</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_juggernaut.png" alt="Juggernaut Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Juggernaut</h3>
              <p>Battletech-themed Elementals in Main Battle Armour. Choose suits ranging from purely offensive to purely defensive. Divided into clans with their own leadership.</p>
              <p class="guild-help-hint">In-game: <code>help juggernaut</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Knight -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Knight</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Honor</span>
                <span class="guild-tag">Warrior</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_knight.png" alt="Knight Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Knight</h3>
              <p>Powerful warriors whose strength is sheathed within a code of honour. Not perfect, but always reaching for higher ideals. Glory in battle with noble purpose.</p>
              <p class="guild-help-hint">In-game: <code>help knight</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Mage -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Mage</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Arcane</span>
                <span class="guild-tag">Summons</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_mage.png" alt="Mage Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Mage</h3>
              <p>Masters of sorcery with over 100 spells. Conjure powerful beasts, change form, and float above the ground. Trade physical strength for arcane power.</p>
              <p class="guild-help-hint">In-game: <code>help mage</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Monk -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Monk</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Martial Arts</span>
                <span class="guild-tag">Unarmed</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_monk.png" alt="Monk Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Monk</h3>
              <p>Born fighters needing no weapon or heavy armour. Study, meditate, and fight with bare hands. DEX and INT determine your devastating combat ability.</p>
              <p class="guild-help-hint">In-game: <code>help monk</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Necromancer -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Necromancer</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Dark Magic</span>
                <span class="guild-tag">Macabre</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_necromancer.png" alt="Necromancer Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Necromancer</h3>
              <p>Command ancient energies and ethereal forces. Hundreds of powers, extreme complexity, and hidden secrets await. The most intense guild experience in 3Kingdoms.</p>
              <p class="guild-help-hint">In-game: <code>help necromancer</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Priest -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Priest</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Divine</span>
                <span class="guild-tag">Pious</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_priest.png" alt="Priest Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Priest</h3>
              <p>Devoted followers granted extraordinary powers by their deities. Choose from 12 gods - good, neutral, or evil. Heal, damage, control weather and elements.</p>
              <p class="guild-help-hint">In-game: <code>help priest</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Psicorps -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Psicorps</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Psionic</span>
                <span class="guild-tag">Military</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_psicorps.png" alt="Psicorps Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Psicorps</h3>
              <p>Secret Marine Corps division using Psionic Implant Modules. Highly configurable - swap powers anytime to match the situation. Tank, DPS, or anything between.</p>
              <p class="guild-help-hint">In-game: <code>help psicorps</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>

        <!-- Sii -->
        <div class="guild-flip-card">
          <div class="guild-flip-inner">
            <div class="guild-flip-front">
              <h3 class="guild-name">Sii</h3>
              <div class="guild-flip-tags">
                <span class="guild-tag">Symbiont</span>
                <span class="guild-tag">Alien</span>
              </div>
              <img src="/images/logo/guilds/guild_logo_sii.png" alt="Sii Guild" class="guild-flip-logo" loading="lazy">
              <div class="flip-indicator"><span>More info</span><i class="fas fa-sync-alt"></i></div>
            </div>
            <div class="guild-flip-back">
              <h3 class="guild-name">Sii</h3>
              <p>Alien symbionts that merge with host bodies. Inhabit prepared "forms" - leathery winged creatures, lizard humanoids, or human bodies. Adapt to survive.</p>
              <p class="guild-help-hint">In-game: <code>help sii</code></p>
              <div class="flip-indicator"><span>Back</span><i class="fas fa-sync-alt"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Advanced Guilds -->
  <section class="guilds-section guilds-advanced">
    <div class="guilds-container">
      <div class="section-header">
        <h2 class="section-title">Advanced Guilds</h2>
        <p class="section-subtitle">For those who have achieved great power and seek even more</p>
      </div>

      <div class="guild-split">
        <!-- Ascended -->
        <div class="guild-split-card card-purple">
          <img src="/images/logo/guilds/guild_logo_ascended.png" alt="Ascended Guild" class="guild-split-logo" loading="lazy">
          <h3>Ascended</h3>
          <span class="guild-split-badge">High Mortal</span>
          <p>Leave behind your physical shell and become the immortal manifestation of your soul. Tanks and protectors of large groups. You do not need to leave your mortal guild to join.</p>
          <div class="guild-split-requirements">
            <span class="guild-tag">Level 90+</span>
            <span class="guild-tag">High Mortal Status</span>
            <span class="guild-tag">Secondary Guild</span>
          </div>
        </div>

        <!-- Eternal -->
        <div class="guild-split-card card-purple">
          <img src="/images/logo/guilds/guild_logo_eternal.png" alt="Eternal Guild" class="guild-split-logo" loading="lazy">
          <h3>Eternal</h3>
          <span class="guild-split-badge">???</span>
          <p class="guild-mystery">The path to becoming Eternal is known only to those who walk it. This guild reveals itself when you reach the required milestone. No spoilers here - your journey will show the way.</p>
          <div class="guild-split-requirements">
            <span class="guild-tag">Secret</span>
            <span class="guild-tag">Discover In-Game</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="guilds-cta">
    <div class="guilds-container">
      <h2>Ready to Choose Your Path?</h2>
      <p>Connect to 3Kingdoms and explore the guild halls. Talk to guild members, ask questions, and find the perfect fit for your playstyle.</p>
      <div class="cta-buttons">
        <a href="https://client.wemudtogether.com" target="_blank" class="btn-primary">Play Now</a>
        <a href="/connect/index.php" class="btn-secondary">Connection Options</a>
      </div>
    </div>
  </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
</body>

</html>
