// ------------------------------------------------------------------
// 'GO TO TOP OF PAGE' BUTTON THAT APPEARS AFTER SCROLLING
// www.w3schools.com/howto/tryit.asp?filename=tryhow_js_scroll_to_top
// Fade in and out for header logo on main landing page
// ------------------------------------------------------------------
var topbutton = document.getElementById("GoToTopBtn");
// var headerlogo = document.getElementById("HeaderLogo");

// Check if we're on the landing page
var path = window.location.pathname;
var isLandingPage = path === '/' || 
                    path === '/index.php' || 
                    path === '/index.html';

// Combined scroll handler using addEventListener
window.addEventListener('scroll', function() {
  var scrollPosition = document.body.scrollTop || document.documentElement.scrollTop;

    // Handle "Go to Top" button
    if (scrollPosition > 20) {
        topbutton.style.display = "block";
    } else {
        topbutton.style.display = "none";
    }
    
    // Handle header logo visibility
    // if (isLandingPage && headerlogo) {
    //   if (scrollPosition > 350) {
    //       headerlogo.classList.add('visible');
    //   } else {
    //       headerlogo.classList.remove('visible');
    //   }
    // }
});

// Click on button, scroll to top of document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


// ------------------------------------------------------------------
// NAVIGATION
// ------------------------------------------------------------------
const menuToggle = document.querySelector('#menu-toggle');
const primaryNavigation = document.querySelector('.primary-navigation');

menuToggle.addEventListener('click', () => {
  const isOpened = menuToggle.getAttribute('aria-expanded') === "true";
  isOpened ? closeMenu() : openMenu();
});

document.addEventListener('keydown', (event) => {
  if ((event.key === 'Escape' || event.key === "Esc" || event.keyCode === 27) 
      && menuToggle.getAttribute('aria-expanded') === "true") {
    closeMenu();
  }
});

function openMenu() {
  menuToggle.setAttribute('aria-expanded', "true");
  primaryNavigation.setAttribute('data-state', "open");
}

function closeMenu() {
  menuToggle.setAttribute('aria-expanded', "false");
  primaryNavigation.setAttribute('data-state', "closed");
  // Close all open dropdowns when menu closes
  document.querySelectorAll(".has-dropdown.open").forEach(item => {
    item.classList.remove("open");
    item.querySelector(".dropdown-toggle")?.setAttribute("aria-expanded", "false");
  });
}

// Focus trap for mobile menu
document.addEventListener('keydown', function(e) {
  if (e.key !== 'Tab') return;

  const isMenuOpen = menuToggle.getAttribute('aria-expanded') === "true";
  const isDesktop = window.matchMedia("(min-width: 992px)").matches;

  // Only trap focus on mobile when menu is open
  if (!isMenuOpen || isDesktop) return;

  // Get only visible/tabbable focusable elements in the mobile menu
  // Exclude links inside closed dropdowns
  const allFocusable = primaryNavigation.querySelectorAll(
    'a[href], button:not([disabled])'
  );

  const focusableArray = Array.from(allFocusable).filter(el => {
    // Check if element is inside a closed dropdown
    const parentDropdown = el.closest('.has-dropdown');
    if (parentDropdown && !parentDropdown.classList.contains('open')) {
      // If inside a dropdown, only include the toggle button, not the dropdown links
      const isDropdownLink = el.closest('.dropdown');
      if (isDropdownLink) return false;
    }
    return true;
  });

  const firstElement = focusableArray[0];
  const lastElement = focusableArray[focusableArray.length - 1];

  // Shift+Tab on first element → go to menu toggle (close button)
  if (e.shiftKey && document.activeElement === firstElement) {
    e.preventDefault();
    menuToggle.focus();
  }
  // Shift+Tab on menu toggle → go to last visible menu item
  else if (e.shiftKey && document.activeElement === menuToggle) {
    e.preventDefault();
    lastElement.focus();
  }
  // Tab on last visible element → go to menu toggle (close button)
  else if (!e.shiftKey && document.activeElement === lastElement) {
    e.preventDefault();
    menuToggle.focus();
  }
  // Tab on menu toggle → go to first menu item
  else if (!e.shiftKey && document.activeElement === menuToggle) {
    e.preventDefault();
    firstElement.focus();
  }
});

// Handle clicks outside navigation elements
document.addEventListener("click", function (e) {
  const toggle = e.target.closest(".dropdown-toggle");
  const isDesktop = window.matchMedia("(min-width: 992px)").matches;
  const isMenuOpen = menuToggle.getAttribute('aria-expanded') === "true";

  // Check if click is outside the mobile menu and hamburger button
  if (isMenuOpen && !isDesktop) {
    const clickedInsideNav = e.target.closest('.primary-navigation');
    const clickedOnToggle = e.target.closest('#menu-toggle');

    // Close mobile menu if clicked outside nav and toggle button
    if (!clickedInsideNav && !clickedOnToggle) {
      closeMenu();
    }
  }

  // Clicked outside dropdown toggle → close all dropdowns
  if (!toggle) {
    document.querySelectorAll(".has-dropdown.open").forEach(item => {
      item.classList.remove("open");
      item.querySelector(".dropdown-toggle")
        ?.setAttribute("aria-expanded", "false");
    });
    return;
  }

  e.preventDefault();
  e.stopPropagation();

  const parent = toggle.closest(".has-dropdown");
  const isOpen = parent.classList.contains("open");

  // On desktop (992px+), close all other dropdowns before opening new one
  if (isDesktop) {
    document.querySelectorAll(".has-dropdown.open").forEach(item => {
      if (item !== parent) {
        item.classList.remove("open");
        item.querySelector(".dropdown-toggle")
          ?.setAttribute("aria-expanded", "false");
      }
    });
  }

  // Toggle current
  parent.classList.toggle("open", !isOpen);
  toggle.setAttribute("aria-expanded", String(!isOpen));
});


// ------------------------------------------
// FLIP CARDS (Connection Options Page)
// ------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
  // Only run if flip cards exist
  const faqItems = document.querySelectorAll('.connect-faq .faq-item');
  if (faqItems.length === 0) return;

  // Calculate the maximum height needed for all card faces
  function setEqualCardHeights() {
    let maxHeight = 0;

    // Reset heights to auto to measure natural content height
    faqItems.forEach(function(card) {
      const front = card.querySelector('.faq-item-front');
      const back = card.querySelector('.faq-item-back');

      if (front) front.style.height = 'auto';
      if (back) back.style.height = 'auto';
      card.style.height = 'auto';

      const inner = card.querySelector('.faq-item-inner');
      if (inner) inner.style.height = 'auto';
    });

    // Measure all fronts and backs to find the tallest
    faqItems.forEach(function(card) {
      const front = card.querySelector('.faq-item-front');
      const back = card.querySelector('.faq-item-back');

      if (front) {
        const frontHeight = front.scrollHeight;
        if (frontHeight > maxHeight) maxHeight = frontHeight;
      }
      if (back) {
        const backHeight = back.scrollHeight;
        if (backHeight > maxHeight) maxHeight = backHeight;
      }
    });

    // Add a small buffer for padding
    maxHeight += 20;

    // Apply the max height to all cards
    faqItems.forEach(function(card) {
      card.style.height = maxHeight + 'px';

      const inner = card.querySelector('.faq-item-inner');
      if (inner) inner.style.height = maxHeight + 'px';

      const front = card.querySelector('.faq-item-front');
      const back = card.querySelector('.faq-item-back');

      if (front) front.style.height = maxHeight + 'px';
      if (back) back.style.height = maxHeight + 'px';
    });
  }

  // Run on load
  setEqualCardHeights();

  // Re-run on window resize
  window.addEventListener('resize', setEqualCardHeights);

  // Handle flip card clicks
  document.querySelectorAll('.faq-item').forEach(function(card) {
    card.addEventListener('click', function() {
      this.classList.toggle('flipped');
    });
  });

  // Prevent flip when clicking buttons/links inside cards
  document.querySelectorAll('.faq-item a, .faq-item button').forEach(function(el) {
    el.addEventListener('click', function(event) {
      event.stopPropagation();
    });
  });
});


// ------------------------------------------
// REALM TABS (Realms Page)
// ------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
  const realmTabs = document.querySelectorAll('.realm-tab');
  const realmContents = document.querySelectorAll('.realm-content');

  // Only run if we're on a page with realm tabs
  if (realmTabs.length === 0) return;

  // Handle tab clicks
  realmTabs.forEach(function(tab) {
    tab.addEventListener('click', function() {
      const realm = this.getAttribute('data-realm');

      // Update active tab
      realmTabs.forEach(function(t) {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
      });
      this.classList.add('active');
      this.setAttribute('aria-selected', 'true');

      // Update active content
      realmContents.forEach(function(content) {
        content.classList.remove('active');
      });
      document.getElementById(realm).classList.add('active');

      // Update URL hash without scrolling (use realm- prefix to prevent auto-scroll on page load)
      history.replaceState(null, null, '#realm-' + realm);
    });
  });

  // Check for hash on page load (supports both #realm-fantasy and legacy #fantasy formats)
  var hash = window.location.hash.substring(1);
  var realmName = hash.startsWith('realm-') ? hash.substring(6) : hash;

  if (realmName && document.getElementById(realmName)) {
    var targetTab = document.querySelector('.realm-tab[data-realm="' + realmName + '"]');
    if (targetTab) {
      targetTab.click();
    }
  }

  // Handle realm navigation buttons at bottom of each realm section
  const realmNavBtns = document.querySelectorAll('.realm-nav-btn');
  realmNavBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      const realm = this.getAttribute('data-realm');
      const targetTab = document.querySelector('.realm-tab[data-realm="' + realm + '"]');

      if (targetTab) {
        targetTab.click();
        // Scroll to the tabs section so user can see the new realm
        document.querySelector('.realms-tabs-section').scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
});


// ------------------------------------------
// HELP FILE SEARCH (Help Page)
// ------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('helpSearch');
  const clearBtn = document.getElementById('clearSearch');
  const categories = document.querySelectorAll('.help-category');
  const noResults = document.getElementById('noResults');

  // Only run if help search elements exist
  if (!searchInput || !clearBtn || categories.length === 0) return;

  searchInput.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase().trim();

    // Show/hide clear button
    clearBtn.style.display = searchTerm ? 'block' : 'none';

    if (!searchTerm) {
      // Show all categories and links
      categories.forEach(function(cat) {
        cat.style.display = 'block';
        cat.querySelectorAll('.help-link').forEach(function(link) {
          link.style.display = 'inline-block';
        });
      });
      if (noResults) noResults.style.display = 'none';
      return;
    }

    let totalVisible = 0;

    categories.forEach(function(cat) {
      const links = cat.querySelectorAll('.help-link');
      let categoryVisible = 0;

      links.forEach(function(link) {
        const topic = link.getAttribute('data-topic');
        if (topic && topic.includes(searchTerm)) {
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

    if (noResults) {
      noResults.style.display = totalVisible === 0 ? 'block' : 'none';
    }
  });

  clearBtn.addEventListener('click', function() {
    searchInput.value = '';
    searchInput.dispatchEvent(new Event('input'));
    searchInput.focus();
  });

  // Allow Enter key to focus first visible result
  searchInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      event.preventDefault();
      const firstVisible = document.querySelector('.help-link[style="display: inline-block;"]');
      if (firstVisible) {
        firstVisible.focus();
      }
    }
  });
});


// ------------------------------------------
// HELP FILE MODAL (Help Page)
// ------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('helpModal');

  // Only run if modal exists
  if (!modal) return;

  const overlay = modal.querySelector('.help-modal-overlay');
  const closeBtn = modal.querySelector('.help-modal-close');
  const titleEl = document.getElementById('helpModalTitle');
  const loadingEl = document.getElementById('helpModalLoading');
  const errorEl = document.getElementById('helpModalError');
  const errorTextEl = document.getElementById('helpModalErrorText');
  const contentEl = document.getElementById('helpModalContent');
  const commandEl = document.getElementById('helpModalCommand');
  const externalLink = document.getElementById('helpModalExternal');

  // External link is no longer used (content is served locally from helpdocs)

  // Get all help link buttons
  const helpLinks = document.querySelectorAll('.help-link[data-topic]');

  // Open modal when clicking a help link
  helpLinks.forEach(function(link) {
    link.addEventListener('click', function() {
      const topic = this.getAttribute('data-topic');
      const title = this.getAttribute('data-title') || topic;
      openHelpModal(topic, title);
    });
  });

  // Close modal functions
  function closeModal() {
    modal.classList.remove('open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  if (closeBtn) {
    closeBtn.addEventListener('click', closeModal);
  }

  if (overlay) {
    overlay.addEventListener('click', closeModal);
  }

  // Close on Escape key
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape' && modal.classList.contains('open')) {
      closeModal();
    }
  });

  // Handle clicks on "See also" links within the modal content
  contentEl.addEventListener('click', function(event) {
    const seeAlsoLink = event.target.closest('.help-see-also-link');
    if (seeAlsoLink) {
      event.preventDefault();
      const topic = seeAlsoLink.getAttribute('data-topic');
      if (topic) {
        openHelpModal(topic, topic);
      }
    }
  });

  // Open modal and fetch content
  function openHelpModal(topic, title) {
    // Set title and command
    titleEl.textContent = 'help ' + title;
    commandEl.textContent = topic;
    // Hide the external link since content is served locally
    if (externalLink) {
      externalLink.style.display = 'none';
    }

    // Show loading state
    loadingEl.style.display = 'flex';
    errorEl.style.display = 'none';
    contentEl.style.display = 'none';

    // Open modal
    modal.classList.add('open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // Fetch content
    fetch('/support/help/fetch-help.php?topic=' + encodeURIComponent(topic))
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        loadingEl.style.display = 'none';

        if (data.success) {
          // Use innerHTML since content is now formatted HTML
          contentEl.innerHTML = data.content;
          contentEl.style.display = 'block';
          // Scroll to top of content
          contentEl.scrollTop = 0;
        } else {
          errorTextEl.textContent = data.error || 'Unable to load help file.';
          errorEl.style.display = 'flex';
        }
      })
      .catch(function(error) {
        loadingEl.style.display = 'none';
        errorTextEl.textContent = 'Network error. Please try again.';
        errorEl.style.display = 'flex';
        console.error('Help fetch error:', error);
      });
  }
});