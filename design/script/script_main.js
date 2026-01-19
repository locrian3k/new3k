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
// SCROLLING IMAGES
// https://codepen.io/kevinpowell/pen/BavVLra
// ------------------------------------------
const scrollers = document.querySelectorAll(".scroller");

// If a user hasn't opted in for recuded motion, then we add the animation
if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
	addAnimation();
}

function addAnimation() {
	scrollers.forEach((scroller) => {
		// add data-animated="true" to every `.scroller` on the page
		scroller.setAttribute("data-animated", true);

		// Make an array from the elements within `.scroller-inner`
		const scrollerInner = scroller.querySelector(".scroller__inner");
		const scrollerContent = Array.from(scrollerInner.children);

		// For each item in the array, clone it
		// add aria-hidden to it
		// add it into the `.scroller-inner`
		scrollerContent.forEach((item) => {
			const duplicatedItem = item.cloneNode(true);
			duplicatedItem.setAttribute("aria-hidden", true);
			scrollerInner.appendChild(duplicatedItem); //THIS MAKES TWO OF THE UL AND TWO OF THE IMAGES, BUT NECESSARY FOR SMOOTH TRANSITION
		});
	});
}