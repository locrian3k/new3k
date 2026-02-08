<?php 
$pageTitle = "3Kingdoms - Home";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; 
?>

		<!-- Main Content -->
		<main id="content">
			<!-- Hero Section -->
			<section class="hero hero-index">
				<div class="hero-content">
					<img
						src="/images/logo/3k_logo_shield_transparent.png"
						alt="3Kingdoms logo"
						class="hero-logo" />
					<h1 class="hero-title">Three Kingdoms</h1>
					<p class="hero-subtitle">
						Epic Adventures Across Fantasy, Science & Chaos
					</p>

					<div class="hero-actions">
						<button
							class="btn-primary"
							onclick="window.open('https://client.wemudtogether.com');">
							Play Now
						</button>
						<a href="/about/3kingdoms/index.php" class="btn-secondary">Learn More</a>
					</div>

					<div class="stats-grid">
						<div class="stat-card">
							<span class="stat-number">3</span>
							<span class="stat-label">Realms</span>
						</div>
						<div class="stat-card">
							<span class="stat-number">32+</span>
							<span class="stat-label">Years</span>
						</div>
						<div class="stat-card">
							<span class="stat-number">700+</span>
							<span class="stat-label">Areas</span>
						</div>
						<div class="stat-card">
							<span class="stat-number"
								><i class="fa-solid fa-infinity"></i
							></span>
							<span class="stat-label">Adventures</span>
						</div>
					</div>
				</div>
			</section>

			<!-- Quick Access Section -->
			<section class="quick-access">
				<div class="quick-access-grid">
					<a
						href="https://client.wemudtogether.com"
						class="quick-link-card"
						target="_blank">
						<i class="fas fa-play-circle quick-link-icon"></i>
						<h3 class="quick-link-title">Play Now</h3>
						<p class="quick-link-desc">Jump directly into the game</p>
					</a>

					<a href="/support/vafs/index.php" class="quick-link-card">
						<i class="fas fa-heart quick-link-icon"></i>
						<h3 class="quick-link-title">Support Us</h3>
						<p class="quick-link-desc">VAFs & Donations</p>
					</a>

					<a href="/community/wholist.php" class="quick-link-card">
						<i class="fas fa-users quick-link-icon"></i>
						<h3 class="quick-link-title">Who's Online</h3>
						<p class="quick-link-desc">See current players</p>
					</a>

					<a
						href="http://forums.3k.org"
						class="quick-link-card"
						target="_blank">
						<i class="fas fa-comments quick-link-icon"></i>
						<h3 class="quick-link-title">Forums</h3>
						<p class="quick-link-desc">Join the discussion</p>
					</a>
				</div>
			</section>

			<!-- Realms Section -->
			<section class="realms-showcase">
				<div class="section-header">
					<h2 class="section-title">Three Unique Realms</h2>
					<p class="section-desc">
						Based around the vibrant town of Pinnacle, explore three distinct
						worlds with their own challenges, creatures, and legends
					</p>
				</div>

				<div class="realms-grid">
					<div class="realm-card fantasy">
						<img
							src="/images/logo/3k_fantasy_logo_transparent_small.png"
							alt="Fantasy Realm"
							class="realm-logo" />
						<h3 class="realm-title">Fantasy</h3>
						<p class="realm-desc">
							A medieval world teeming with orcs, elves, and dragons. Ancient
							castles, mystical forests, and legendary creatures await the
							brave.
						</p>
						<a href="/realms/index.php#fantasy" class="realm-link"
							>Explore Fantasy</a
						>
					</div>

					<div class="realm-card science">
						<img
							src="/images/logo/3k_science_logo_transparent_small.png"
							alt="Science Realm"
							class="realm-logo" />
						<h3 class="realm-title">Science</h3>
						<p class="realm-desc">
							A post-apocalyptic future scarred by war. Advanced technology,
							cybernetic enhancements, and the remnants of civilization collide.
						</p>
						<a href="/realms/index.php#science" class="realm-link"
							>Explore Science</a
						>
					</div>

					<div class="realm-card chaos">
						<img
							src="/images/logo/3k_chaos_logo_transparent_small.png"
							alt="Chaos Realm"
							class="realm-logo" />
						<h3 class="realm-title">Chaos</h3>
						<p class="realm-desc">
							Where fantastical and scientific forces collide, creating
							creatures beyond imagination. Reality bends in this unpredictable
							realm.
						</p>
						<a href="/realms/index.php#chaos" class="realm-link"
							>Explore Chaos</a
						>
					</div>
				</div>
			</section>

			<!-- Features Section -->
			<section class="features-section">
				<div class="section-header">
					<h2 class="section-title">Why 3Kingdoms?</h2>
				</div>

				<div class="features-grid">
					<div class="feature-card">
						<i class="fas fa-shield-alt feature-icon"></i>
						<h3 class="feature-title">15+ Guilds</h3>
						<p class="feature-desc">
							Knights, Necromancers, Juggernauts, and more. Each with unique
							powers and social hubs.
						</p>
					</div>

					<div class="feature-card">
						<i class="fas fa-map feature-icon"></i>
						<h3 class="feature-title">Massive World</h3>
						<p class="feature-desc">
							Thousands of rooms and hundreds of areas. Simple to start, deep
							enough for years of play.
						</p>
					</div>

					<div class="feature-card">
						<i class="fas fa-trophy feature-icon"></i>
						<h3 class="feature-title">Epic Quests</h3>
						<p class="feature-desc">
							Challenging quests, dynamic invasions, and endless adventures
							await discovery.
						</p>
					</div>

					<div class="feature-card">
						<i class="fas fa-users-cog feature-icon"></i>
						<h3 class="feature-title">Active Community</h3>
						<p class="feature-desc">
							Join a thriving playerbase with over 32 years of shared history
							and legends.
						</p>
					</div>
				</div>
			</section>

			<!-- Call To Action Section -->
			<section class="cta-section">
				<div class="cta-content">
					<h2 class="cta-title">Your Adventure Begins Today</h2>
					<p class="cta-text">
						Join thousands of players who have made 3Kingdoms their home. Free
						to play, easy to learn, impossible to master.
					</p>

					<div class="cta-buttons">
						<button
							class="btn-primary"
							onclick="window.open('https://client.wemudtogether.com');">
							Start Playing
						</button>
						<a href="/about/3kingdoms/index.php" class="btn-secondary">Read More</a>
					</div>
				</div>
			</section>

			<!-- Sister MUD -->
			<section
				style="
					padding: var(--space-2xl) var(--space-lg);
					background: var(--clr-black);
					text-align: center;
				">
				<a href="/about/3s/index.php">
					<img
						src="/images/logo/3S_logo_transparent.png"
						alt="3Scapes logo"
						class="hero-logo-sm" />
				</a>
				<h2
					style="
						color: var(--clr-text-heading);
						font-family: var(--ff-heading);
						font-size: 1.8rem;
						margin-bottom: var(--space-sm);
					">
					Explore 3Scapes
				</h2>
				<p
					style="
						color: var(--clr-text-secondary);
						font-family: var(--ff-body);
						font-size: 1.1rem;
					">
					Our sister MUD, where the rules are different.
				</p>
				<a href="/about/3s/index.php">
					<button class="btn-secondary">Learn About 3Scapes</button>
				</a>
			</section>
		</main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

		<script src="/design/script/script_main.js"></script>
	</body>
</html>