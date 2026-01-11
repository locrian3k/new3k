// ------------------------------------------------------------------
// CHANGING THEME
// ------------------------------------------------------------------
// document.addEventListener('DOMContentLoaded', () => {
// 	const themeButton = document.querySelector('.theme-btn');
// 	const currentTheme = localStorage.getItem('theme') || 'dark';
// 	const themeIcon = themeButton.querySelector('i');
// 	const srText = themeButton.querySelector('.sr-only');

// 	document.body.classList.add(currentTheme + '-theme');
// 	updateThemeButton(currentTheme);

// 	themeButton.addEventListener('click', () => {
// 		let newTheme = 'light';
// 		if (document.body.classList.contains('light-theme')) {
// 			newTheme = 'dark';
// 		}
// 		document.body.classList.remove('dark-theme', 'light-theme');
// 		document.body.classList.add(newTheme + '-theme');
// 		localStorage.setItem('theme', newTheme);
// 		updateThemeButton(newTheme);
// 	});

// 	function updateThemeButton(theme) {
// 		if (theme === 'light') {
// 			themeButton.setAttribute('aria-label', 'Switch to dark theme');
// 			themeIcon.classList.remove('fa-sun');
// 			themeIcon.classList.add('fa-moon');
// 			srText.textContent = 'Switch to dark theme';
// 		} else {
// 			themeButton.setAttribute('aria-label', 'Switch to light theme');
// 			themeIcon.classList.remove('fa-moon');
// 			themeIcon.classList.add('fa-sun');
// 			srText.textContent = 'Switch to light theme';
// 		}
// 	}
// });


// ------------------------------------------------------------------
// 'GO TO TOP OF PAGE' BUTTON THAT APPEARS AFTER SCROLLING
// www.w3schools.com/howto/tryit.asp?filename=tryhow_js_scroll_to_top
// ------------------------------------------------------------------
var topbutton = document.getElementById("GoToTopBtn");
// Scroll down 20px from the top of the document, show the button
window.onscroll = function () { scrollFunction() };
function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		topbutton.style.display = "block";
	} else {
		topbutton.style.display = "none";
	}
}
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
  if (event.key == 'Escape' || event.key == "Esc" || KeyboardEvent.keyCode == 27 && menuToggle.getAttribute('aria-expanded') === "true") {
    closeMenu();
  }
});

function openMenu() {
  menuToggle.setAttribute('aria-expanded', "true");
  primaryNavigation.setAttribute('data-state', "open");
}

function closeMenu() {
  menuToggle.setAttribute('aria-expanded', "false");
  primaryNavigation.setAttribute('data-state', "closing");

  // Delay closing the menu to ensure it stays visible for a moment
  setTimeout(() => {
    primaryNavigation.setAttribute('data-state', "closed");
  }, 300); // Adjust delay time as needed
}


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