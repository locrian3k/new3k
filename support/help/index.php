<?php
$pageTitle = "Help Files - 3Kingdoms";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

// Load configuration and functions
$config = include __DIR__ . '/config.php';
include __DIR__ . '/functions.php';

// Get help categories based on config
$helpCategories = getHelpFiles($config);

// URL settings
$helpBaseUrl = $config['base_url'] ?? 'https://3k.org/help/';
$urlSuffix = $config['url_suffix'] ?? '.php';
$openInNewWindow = $config['open_in_new_window'] ?? true;
$linkTarget = $openInNewWindow ? '_blank' : '_self';
?>

<!-- Main Content -->
<main id="content">
  <!-- Hero Section -->
  <section class="hero hero-default">
    <div class="hero-content">
      <h1 class="hero-title">Help Files</h1>
      <p class="hero-subtitle">Your Guide to the Realms</p>
    </div>
  </section>

  <!-- Search Section -->
  <section class="help-search">
    <div class="help-container">
      <div class="search-box">
        <i class="fa-solid fa-search"></i>
        <input
          type="text"
          id="helpSearch"
          placeholder="Search help files..."
          autocomplete="off"
        >
        <button type="button" id="clearSearch" class="clear-btn" style="display: none;">
          <i class="fa-solid fa-times"></i>
        </button>
      </div>
      <p class="search-hint">
        <i class="fa-solid fa-lightbulb"></i>
        Tip: In-game, type <code>help &lt;topic&gt;</code> to access these files directly!
      </p>
    </div>
  </section>

  <!-- Help Categories -->
  <section class="help-categories">
    <div class="help-container">
      <?php foreach ($helpCategories as $categoryId => $category): ?>
      <div class="help-category" data-category="<?php echo htmlspecialchars($categoryId); ?>">
        <div class="category-header">
          <div class="category-icon">
            <i class="<?php echo htmlspecialchars($category['icon']); ?>"></i>
          </div>
          <div class="category-info">
            <h2><?php echo htmlspecialchars($category['title']); ?></h2>
            <p><?php echo htmlspecialchars($category['description']); ?></p>
          </div>
          <span class="category-count"><?php echo count($category['files']); ?> topics</span>
        </div>
        <div class="help-links">
          <?php foreach ($category['files'] as $file => $title): ?>
          <a
            href="<?php echo htmlspecialchars($helpBaseUrl . $file . $urlSuffix); ?>"
            class="help-link"
            data-topic="<?php echo htmlspecialchars(strtolower($title)); ?>"
            target="<?php echo $linkTarget; ?>"
          >
            <?php echo htmlspecialchars($title); ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- No Results Message -->
  <div id="noResults" class="no-results" style="display: none;">
    <i class="fa-solid fa-search"></i>
    <h3>No help files found</h3>
    <p>Try a different search term or browse the categories above.</p>
  </div>

  <!-- CTA -->
  <section class="help-cta">
    <div class="help-container">
      <h2>Need More Help?</h2>
      <p>Can't find what you're looking for? Ask the community or contact a wizard!</p>
      <div class="cta-buttons">
        <a href="https://client.wemudtogether.com" target="_blank" class="btn-primary">
          Play Now
        </a>
        <a href="/support/contact/index.php" class="btn-secondary">Contact Us</a>
      </div>
    </div>
  </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
</body>

</html>
