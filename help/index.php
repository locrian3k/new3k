<?php
$pageTitle = "Help Files - 3Kingdoms";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

// Load configuration
$config = include __DIR__ . '/config.php';

/**
 * Get help files based on configuration
 */
function getHelpFiles($config) {
    $source = $config['source'] ?? 'static';

    if ($source === 'static') {
        return $config['categories'];
    }

    if ($source === 'directory' || $source === 'hybrid') {
        $directory = $config['help_directory'] ?? '';
        $extension = $config['file_extension'] ?? 'php';

        // If directory scanning is enabled and directory exists
        if (!empty($directory) && is_dir($directory)) {
            $scannedFiles = scanHelpDirectory($directory, $extension);

            if ($source === 'directory') {
                // Return all files in a single "All Help Files" category
                return [
                    'all' => [
                        'title' => 'All Help Files',
                        'icon' => 'fa-solid fa-folder-open',
                        'description' => 'Complete list of available help topics',
                        'files' => $scannedFiles
                    ]
                ];
            }

            // Hybrid mode: use static categories, add uncategorized files
            $categories = $config['categories'];
            $categorizedFiles = [];

            // Collect all files that are already in categories
            foreach ($categories as $cat) {
                foreach ($cat['files'] as $file => $title) {
                    $categorizedFiles[$file] = true;
                }
            }

            // Find uncategorized files
            $uncategorized = [];
            foreach ($scannedFiles as $file => $title) {
                if (!isset($categorizedFiles[$file])) {
                    $uncategorized[$file] = $title;
                }
            }

            // Add uncategorized files if any exist
            if (!empty($uncategorized)) {
                ksort($uncategorized);
                $categories['uncategorized'] = [
                    'title' => 'Other Topics',
                    'icon' => 'fa-solid fa-folder',
                    'description' => 'Additional help files',
                    'files' => $uncategorized
                ];
            }

            return $categories;
        }
    }

    // Fallback to static categories
    return $config['categories'];
}

/**
 * Scan a directory for help files
 */
function scanHelpDirectory($directory, $extension) {
    $files = [];
    $pattern = $directory . '/*.' . $extension;

    foreach (glob($pattern) as $filepath) {
        $filename = pathinfo($filepath, PATHINFO_FILENAME);
        // Convert filename to display name (capitalize, replace underscores)
        $displayName = ucwords(str_replace(['_', '-'], ' ', $filename));
        $files[$filename] = $displayName;
    }

    ksort($files);
    return $files;
}

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

<script>
// Help file search functionality
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('helpSearch');
  const clearBtn = document.getElementById('clearSearch');
  const categories = document.querySelectorAll('.help-category');
  const noResults = document.getElementById('noResults');

  searchInput.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase().trim();

    // Show/hide clear button
    clearBtn.style.display = searchTerm ? 'block' : 'none';

    if (!searchTerm) {
      // Show all categories and links
      categories.forEach(cat => {
        cat.style.display = 'block';
        cat.querySelectorAll('.help-link').forEach(link => {
          link.style.display = 'inline-block';
        });
      });
      noResults.style.display = 'none';
      return;
    }

    let totalVisible = 0;

    categories.forEach(cat => {
      const links = cat.querySelectorAll('.help-link');
      let categoryVisible = 0;

      links.forEach(link => {
        const topic = link.getAttribute('data-topic');
        if (topic.includes(searchTerm)) {
          link.style.display = 'inline-block';
          categoryVisible++;
        } else {
          link.style.display = 'none';
        }
      });

      if (categoryVisible > 0) {
        cat.style.display = 'block';
        totalVisible += categoryVisible;
      } else {
        cat.style.display = 'none';
      }
    });

    noResults.style.display = totalVisible === 0 ? 'block' : 'none';
  });

  clearBtn.addEventListener('click', function() {
    searchInput.value = '';
    searchInput.dispatchEvent(new Event('input'));
    searchInput.focus();
  });
});
</script>

<script src="/design/script/script_main.js"></script>
</body>

</html>
