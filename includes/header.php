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
    <!-- THIS CODE ALLOWS SCREEN READERS TO SKIP THE NAVIGATION MENU AND VIEW CONTENT OF PAGE -->
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
        <!-- HAMBURGER -->
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

        <!-- NAV CONTENT -->
        <div class="nav-content">
          <ul
            id="primary-navigation"
            class="primary-navigation"
            data-state="closed">

            <li><a href="/index.php" id="home">Home</a></li>
            <li><a href="/about.php">About</a></li>
            <li><a href="/guilds.php">Guilds</a></li>
            <li><a href="/how-to-play.php">How to Play</a></li>
            <li><a href="/vafs.php"><abbr title="Voluntary Access Fees">VAFs</abbr></a></li>
            <li><a href="/contact.php">Contact</a></li>

          </ul>
        </div>
      </nav>
      
    </div>
    <hr class="hr-gradient">
  </header>