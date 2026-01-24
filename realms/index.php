<?php
$pageTitle = "The Three Realms - 3Kingdoms";
include '../includes/header.php';
?>

		<!-- Main Content -->
		<main id="content">
			<!-- Hero Section -->
			<section class="hero hero-realms">
				<div class="hero-content">
					<h1 class="hero-title">The Three Realms</h1>
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
						<img
							src="/images/logo/3k_fantasy_logo_transparent_small.png"
							alt="Fantasy Realm"
							class="realm-content-logo" />
						<h2 class="realm-content-title">The Fantasy Realm</h2>
						<p class="realm-content-tagline">Where magic and myth come alive</p>
					</div>

					<div class="realm-body">
						<div class="realm-description">
							<p>
								Step into a medieval world teeming with orcs, elves, dragons, and ancient magic.
								The Fantasy realm is the heart of classic adventure, where brave heroes forge
								their legends through steel and sorcery.
							</p>
							<p>
								From the towering spires of mystical castles to the depths of dragon-guarded
								dungeons, every corner holds secrets waiting to be discovered. Ancient forests
								whisper of forgotten lore, while dark caverns echo with the growls of creatures
								best left undisturbed.
							</p>
						</div>

						<div class="realm-features">
							<h3>Notable Locations</h3>
							<div class="realm-features-grid">
								<div class="realm-feature-item">
									<i class="fa-solid fa-tower-observation"></i>
									<h4>Ravenloft</h4>
									<p>The cursed domain of Strahd, where darkness reigns eternal and vampires stalk the mist-shrouded lands.</p>
								</div>
								<div class="realm-feature-item">
									<i class="fa-solid fa-tree"></i>
									<h4>Elven Forests</h4>
									<p>Ancient woodlands home to the elder races, where trees older than memory guard timeless secrets.</p>
								</div>
								<div class="realm-feature-item">
									<i class="fa-solid fa-mountain"></i>
									<h4>Dragon Peaks</h4>
									<p>Treacherous mountains where legendary wyrms make their lairs atop hoards of stolen treasure.</p>
								</div>
								<div class="realm-feature-item">
									<i class="fa-solid fa-dungeon"></i>
									<h4>The Underdark</h4>
									<p>A vast underground network of caverns filled with dangers that never see the light of day.</p>
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

						<div class="realm-images">
							<div class="realm-image-grid">
								<img src="/images/scrolling/ravenloftBarovia.png" alt="Ravenloft Barovia">
								<img src="/images/scrolling/aruwins_windmill.png" alt="Aruwin's Windmill">
								<img src="/images/scrolling/captain_thistlebeard.png" alt="Captain Thistlebeard">
								<img src="/images/scrolling/rocs_nest.png" alt="Roc's Nest">
							</div>
						</div>
					</div>
				</div>

				<!-- Science Realm Content -->
				<div class="realm-content" id="science">
					<div class="realm-header science">
						<img
							src="/images/logo/3k_science_logo_transparent_small.png"
							alt="Science Realm"
							class="realm-content-logo" />
						<h2 class="realm-content-title">The Science Realm</h2>
						<p class="realm-content-tagline">A post-apocalyptic future awaits</p>
					</div>

					<div class="realm-body">
						<div class="realm-description">
							<p>
								Welcome to a world scarred by nuclear war and rebuilt through advanced technology.
								The Science realm is a gritty cyberpunk landscape where megacorporations vie for
								power and humanity struggles to survive among the ruins of the old world.
							</p>
							<p>
								Neon-lit cities rise from the ashes, their streets patrolled by corporate security
								forces and prowled by gangs of chrome-enhanced outlaws. Space stations orbit
								overhead, and the secrets of genetic engineering have created wonders and horrors alike.
							</p>
						</div>

						<div class="realm-features">
							<h3>Notable Locations</h3>
							<div class="realm-features-grid">
								<div class="realm-feature-item">
									<i class="fa-solid fa-city"></i>
									<h4>Houston Metroplex</h4>
									<p>A sprawling megacity where corporate towers cast shadows over the struggling masses below.</p>
								</div>
								<div class="realm-feature-item">
									<i class="fa-solid fa-flask"></i>
									<h4>Gen Labs</h4>
									<p>Cutting-edge research facilities where the boundaries of human evolution are pushed ever further.</p>
								</div>
								<div class="realm-feature-item">
									<i class="fa-solid fa-truck"></i>
									<h4>Last Chance Truck Stop</h4>
									<p>A haven for road warriors and wanderers in the irradiated wastelands between cities.</p>
								</div>
								<div class="realm-feature-item">
									<i class="fa-solid fa-satellite"></i>
									<h4>Orbital Stations</h4>
									<p>Humanity's foothold in space, where the elite live above the troubles of Earth.</p>
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

						<div class="realm-images">
							<div class="realm-image-grid">
								<img src="/images/scrolling/houstonTransport.png" alt="Houston Transport">
								<img src="/images/scrolling/gen_lab.png" alt="Gen Lab">
								<img src="/images/scrolling/lastChanceTruckStop.png" alt="Last Chance Truck Stop">
								<img src="/images/scrolling/fern_man_science.png" alt="Science Fern Man">
							</div>
						</div>
					</div>
				</div>

				<!-- Chaos Realm Content -->
				<div class="realm-content" id="chaos">
					<div class="realm-header chaos">
						<img
							src="/images/logo/3k_chaos_logo_transparent_small.png"
							alt="Chaos Realm"
							class="realm-content-logo" />
						<h2 class="realm-content-title">The Chaos Realm</h2>
						<p class="realm-content-tagline">Where reality bends and breaks</p>
					</div>

					<div class="realm-body">
						<div class="realm-description">
							<p>
								Enter a dimension where the laws of nature hold no sway. The Chaos realm exists
								at the intersection of Fantasy and Science, a place where magic and technology
								collide to create something entirely unpredictable.
							</p>
							<p>
								Here you'll find creatures that defy classification, landscapes that shift
								without warning, and challenges that require both sword and circuit to overcome.
								The Chaos realm rewards those who can adapt to the unexpected and thrive in
								an environment where nothing is certain.
							</p>
						</div>

						<div class="realm-features">
							<h3>Notable Locations</h3>
							<div class="realm-features-grid">
								<div class="realm-feature-item">
									<i class="fa-solid fa-door-open"></i>
									<h4>The Rift Zones</h4>
									<p>Unstable areas where portals to other dimensions open and close without warning.</p>
								</div>
								<div class="realm-feature-item">
									<i class="fa-solid fa-cloud-bolt"></i>
									<h4>Storm Wastes</h4>
									<p>Lands perpetually wracked by magical and electrical storms of immense power.</p>
								</div>
								<div class="realm-feature-item">
									<i class="fa-solid fa-mask"></i>
									<h4>The Twisted Carnival</h4>
									<p>An otherworldly circus where entertainment and terror are indistinguishable.</p>
								</div>
								<div class="realm-feature-item">
									<i class="fa-solid fa-diamond"></i>
									<h4>Crystal Caverns</h4>
									<p>Underground labyrinths where crystalline formations pulse with chaotic energy.</p>
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

						<div class="realm-images">
							<div class="realm-image-grid">
								<img src="/images/scrolling/icy_blue_portal.png" alt="Icy Blue Portal">
								<img src="/images/scrolling/mantis_swamp.png" alt="Mantis Swamp">
								<img src="/images/scrolling/lyriac.png" alt="Lyriac">
								<img src="/images/scrolling/murusFaralain.png" alt="Murus Faralain">
							</div>
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
						<button
							class="btn-primary"
							onclick="window.open('https://client.wemudtogether.com');">
							Start Playing
						</button>
						<a href="/guilds/index.php" class="btn-secondary">Explore Guilds</a>
					</div>
				</div>
			</section>
		</main>

<?php include '../includes/footer.php'; ?>
