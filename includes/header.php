<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>3Kingdoms</title>

		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta
			name="description"
			content="Join 3Kingdoms MUD - Over 32 years of epic adventure across Fantasy, Science, and Chaos realms. 700+ areas, active community, free to play." />
		<meta
			name="keywords"
			content="3Kingdoms, MUD, text-based game, fantasy, sci-fi, multiplayer, online RPG" />
		<meta name="author" content="The Marble Group" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="theme-color" content="#000000" />

		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
			integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer" />
		<link rel="icon" href="/favicon.ico" sizes="any" />
		<link rel="stylesheet" href="/design/style/styles_main.css" />
	</head>

	<body>
		<!-- Accessibility -->
		<div class="accessibility">
			<div id="skip-to-content">
				<a href="#content" id="skip-to-content-link">SKIP TO CONTENT</a>
				<button onclick="topFunction()" id="GoToTopBtn" title="Go to top">
					<strong>Top</strong>
				</button>
			</div>
		</div>

		<!-- Header -->
		<header class="site-header">
			<div class="inner">
				<div id="HeaderLogo">
					<a href="/index.php" class="nav-logo">
						<img
							src="/images/logo/3k_logo_shield_transparent.png"
							class="logo-image"
							alt="Three Kingdoms logo"
							title="Home" />
					</a>
				</div>

				<nav class="site-nav" aria-label="Primary">
					<button
						id="menu-toggle"
						class="menu-toggle"
						aria-expanded="false"
						aria-controls="primary-navigation"
						aria-label="Open menu">
						<span class="hamburger" title="Menu">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>

					<div class="nav-content">
						<ul
							id="primary-navigation"
							class="primary-navigation"
							data-state="closed">
							<li><a href="/index.php">Home</a></li>
							<li class="has-dropdown">
								<button class="dropdown-toggle" aria-expanded="false">
									<span class="arrow">About</span>
								</button>
								<ul class="dropdown">
									<li><a href="/about/3k/index.php">3Kingdoms</a></li>
									<li><a href="/about/3s/index.php">3Scapes</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<button class="dropdown-toggle" aria-expanded="false">
									<span class="arrow">Play</span>
								</button>
								<ul class="dropdown">
									<li><a href="/connect.php">Quick Connect</a></li>
									<li>
										<a href="/connect/index.php">Connection Options</a>
									</li>
								</ul>
							</li>
							<li><a href="/guilds/index.php">Guilds</a></li>
							<li class="has-dropdown">
								<button class="dropdown-toggle" aria-expanded="false">
									<span class="arrow">Community</span>
								</button>
								<ul class="dropdown">
									<li>
										<a href="http://forums.3k.org" target="_blank">Forums</a>
									</li>
                  <li><a href="/community/wholist.php">Who's Online</a></li>
                  <li><a href="/community/omp/index.php">OMPs</a></li>
									<li>
										<a href="http://3kwiki.com/wiki" target="_blank">Wiki</a>
									</li>
									<li>
										<a href="https://wemudtogether.com" target="_blank"
											>We Mud Together</a>
									</li>
								</ul>
							</li>
							<li class="has-dropdown">
								<button class="dropdown-toggle" aria-expanded="false">
									<span class="arrow">Support</span>
								</button>
								<ul class="dropdown">
									<li>
										<a href="/support/vafs/index.php">
                      <abbr title="Voluntary Access Fees">VAFs</abbr>
                    </a>
									</li>
									<li><a href="/support/contact/index.php">Contact</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>