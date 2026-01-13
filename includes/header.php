<!DOCTYPE html>
<html lang="en-US">
<head>
  <title><?php echo isset($pageTitle) ? $pageTitle : '3Kingdoms - Home'; ?></title>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Official site for the MUD, Three Kingdoms.">
  <meta name="keywords" content="Three Kingdoms mud, text-based game, 3kingdoms">
  <meta name="author" content="Mimic">
  <meta name="format-detection" content="telephone=no">
  <meta name="theme-color" content="#000000">

  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">

  <link rel="stylesheet" href="/design/style/styles_main.css">
</head>

<body>

  <div class="accessibility">
    <div id="skip-to-content">
      <a href="#content" id="skip-to-content-link">
        SKIP TO CONTENT
      </a>

      <button onclick="topFunction()" id="GoToTopBtn" title="Go to top">
        <strong>Top</strong>
      </button>
    </div>
  </div>

  <header class="site-header">
    <div class="inner">
      <!-- LOGO -->
      <a href="/index.php" class="nav-logo">
        <img
          src="/images/3k_logo_shield_transparent.png"
          class="logo-image"
          alt="Three Kingdoms logo"
          title="Home">
      </a>

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

      <!-- NAVIGATION -->
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
									<li><a href="/about-3kingdoms.php">3Kingdoms</a></li>
									<li><a href="/about-3scapes.php">3Scapes</a></li>
								</ul>
							</li>

							<li class="has-dropdown">
								<button class="dropdown-toggle" aria-expanded="false">
									<span class="arrow">Play</span>
								</button>
								<ul class="dropdown">
									<li><a href="/about-3kingdoms.php">Quick Connect</a></li>
									<li><a href="/about-3scapes.php">Connection Options</a></li>
									<li><a href="/about-3scapes.php">Who's Online</a></li>
								</ul>
							</li>

							<li><a href="/guilds.php">Guilds</a></li>

							<li class="has-dropdown">
								<button class="dropdown-toggle" aria-expanded="false">
									<span class="arrow">Community</span>
								</button>
								<ul class="dropdown">
									<li>
										<a href="http://forums.3k.org" target="_blank">Forums</a>
									</li>
									<li><a href="/community/gallery.php">Gallery</a></li>
									<li><a href="/community/omp.php">OMPs</a></li>
									<li>
										<a href="http://3kwiki.com/wiki" target="_blank">Wiki</a>
									</li>
									<li>
										<a href="https://wemudtogether.com" target="_blank"
											>We Mud Together</a
										>
									</li>
									<li><a href="#">3K Fandom</a></li>
								</ul>
							</li>

							<li class="has-dropdown">
								<button class="dropdown-toggle" aria-expanded="false">
									<span class="arrow">Support</span>
								</button>
								<ul class="dropdown">
									<li>
										<a href="/support/vafs.php"
											><abbr title="Voluntary Access Fees">VAFs</abbr></a
										>
									</li>
									<li><a href="/support/contact.php">Contact</a></li>
								</ul>
							</li>
              
              <li>
                <a href="https://www.michrenfest.com/" target="_blank">
                  <h3>Michigan Renaissance Festival</h3>
                  <img src="http://www.gameaxle.com/images/RenFestBanner2025.jpg">
                  <p>
                    In the midwest? Check out the 2026 Michigan Renaissance Festival!
                    <br>
                    Aug 22-Oct 4
                  </p>
                </a>
              </li>

						</ul>
					</div>
				</nav>
    </div>
    <hr class="hr-gradient">
  </header>