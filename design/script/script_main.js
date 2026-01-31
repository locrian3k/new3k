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
}

// Only close if screen is laptop and bigger
document.addEventListener("click", function (e) {
  const toggle = e.target.closest(".dropdown-toggle");
  const isDesktop = window.matchMedia("(min-width: 992px)").matches;

  // Clicked outside → close all
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

      // Update URL hash without scrolling
      history.replaceState(null, null, '#' + realm);
    });
  });

  // Check for hash on page load
  var hash = window.location.hash.substring(1);
  if (hash && document.getElementById(hash)) {
    var targetTab = document.querySelector('.realm-tab[data-realm="' + hash + '"]');
    if (targetTab) {
      targetTab.click();
    }
  }
});