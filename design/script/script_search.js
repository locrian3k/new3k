// ==========================================================================
// SITE SEARCH FUNCTIONALITY
// ==========================================================================

document.addEventListener('DOMContentLoaded', function () {
	const searchToggle = document.getElementById('search-toggle');
	const searchModal = document.getElementById('search-modal');
	const searchClose = document.getElementById('search-close');
	const searchOverlay = document.querySelector('.search-modal-overlay');
	const searchInput = document.getElementById('search-input');
	const searchForm = document.getElementById('search-form');
	const searchResults = document.getElementById('search-results');

	// Exit if search elements don't exist
	if (!searchToggle || !searchModal) return;

	let searchDebounceTimer = null;

	// ------------------------------------------------------------------
	// Modal Open/Close Functions
	// ------------------------------------------------------------------

	function openSearchModal() {
		searchModal.hidden = false;
		// Force reflow for animation
		searchModal.offsetHeight;
		searchModal.classList.add('active');
		searchToggle.setAttribute('aria-expanded', 'true');
		searchInput.focus();
		document.body.style.overflow = 'hidden';
	}

	function closeSearchModal() {
		searchModal.classList.remove('active');
		searchToggle.setAttribute('aria-expanded', 'false');
		document.body.style.overflow = '';

		// Hide after animation completes
		setTimeout(() => {
			searchModal.hidden = true;
			searchInput.value = '';
			searchResults.innerHTML = '';
		}, 300);
	}

	// ------------------------------------------------------------------
	// Event Listeners
	// ------------------------------------------------------------------

	// Toggle button click
	searchToggle.addEventListener('click', function (e) {
		e.preventDefault();
		if (searchModal.hidden || !searchModal.classList.contains('active')) {
			openSearchModal();
		} else {
			closeSearchModal();
		}
	});

	// Close button click
	searchClose.addEventListener('click', closeSearchModal);

	// Overlay click
	searchOverlay.addEventListener('click', closeSearchModal);

	// Keyboard shortcuts
	document.addEventListener('keydown', function (e) {
		// Open with Ctrl/Cmd + K
		if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
			e.preventDefault();
			if (searchModal.hidden || !searchModal.classList.contains('active')) {
				openSearchModal();
			} else {
				closeSearchModal();
			}
		}

		// Close with Escape
		if (e.key === 'Escape' && !searchModal.hidden) {
			closeSearchModal();
		}
	});

	// Focus trap within modal
	searchModal.addEventListener('keydown', function (e) {
		if (e.key === 'Tab') {
			const focusableElements = searchModal.querySelectorAll(
				'button, input, a[href]:not([disabled])'
			);
			const focusableArray = Array.from(focusableElements);
			const firstElement = focusableArray[0];
			const lastElement = focusableArray[focusableArray.length - 1];

			if (e.shiftKey && document.activeElement === firstElement) {
				e.preventDefault();
				lastElement.focus();
			} else if (!e.shiftKey && document.activeElement === lastElement) {
				e.preventDefault();
				firstElement.focus();
			}
		}
	});

	// ------------------------------------------------------------------
	// Search Functions
	// ------------------------------------------------------------------

	async function performSearch(query) {
		if (query.length < 2) {
			searchResults.innerHTML = '';
			return;
		}

		// Show loading state
		searchResults.innerHTML = `
			<div class="search-loading">
				<i class="fa-solid fa-spinner"></i>
				<p>Searching...</p>
			</div>
		`;

		try {
			const response = await fetch(`/includes/search.php?q=${encodeURIComponent(query)}`);

			if (!response.ok) {
				throw new Error('Search request failed');
			}

			const data = await response.json();
			displayResults(data.results, query);
		} catch (error) {
			console.error('Search error:', error);
			searchResults.innerHTML = `
				<div class="search-no-results">
					<i class="fa-solid fa-exclamation-triangle"></i>
					<p>An error occurred. Please try again.</p>
				</div>
			`;
		}
	}

	function displayResults(results, query) {
		if (!results || results.length === 0) {
			searchResults.innerHTML = `
				<div class="search-no-results">
					<i class="fa-solid fa-search"></i>
					<p>No results found for "${escapeHtml(query)}"</p>
					<p style="font-size: 0.875rem; margin-top: 0.5rem; opacity: 0.7;">
						Try different keywords or check your spelling
					</p>
				</div>
			`;
			return;
		}

		const resultsHtml = results.map(result => {
			const highlightedSnippet = highlightTerms(result.snippet, query);
			return `
				<a href="${escapeHtml(result.path)}" class="search-result-item">
					<h3 class="search-result-title">${escapeHtml(result.title)}</h3>
					<p class="search-result-snippet">${highlightedSnippet}</p>
					<span class="search-result-path">${escapeHtml(result.path)}</span>
				</a>
			`;
		}).join('');

		searchResults.innerHTML = `
			<p class="search-results-count">
				${results.length} result${results.length !== 1 ? 's' : ''} found
			</p>
			${resultsHtml}
		`;
	}

	// ------------------------------------------------------------------
	// Utility Functions
	// ------------------------------------------------------------------

	function highlightTerms(text, query) {
		if (!text) return '';

		const terms = query.split(' ').filter(t => t.length >= 2);
		let highlighted = escapeHtml(text);

		terms.forEach(term => {
			const regex = new RegExp(`(${escapeRegex(term)})`, 'gi');
			highlighted = highlighted.replace(regex, '<mark>$1</mark>');
		});

		return highlighted;
	}

	function escapeHtml(text) {
		if (!text) return '';
		const div = document.createElement('div');
		div.textContent = text;
		return div.innerHTML;
	}

	function escapeRegex(string) {
		return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
	}

	// ------------------------------------------------------------------
	// Form Handlers
	// ------------------------------------------------------------------

	// Form submission
	searchForm.addEventListener('submit', function (e) {
		e.preventDefault();
		const query = searchInput.value.trim();
		if (query.length >= 2) {
			performSearch(query);
		}
	});

	// Live search with debounce
	searchInput.addEventListener('input', function () {
		clearTimeout(searchDebounceTimer);
		const query = this.value.trim();

		if (query.length < 2) {
			searchResults.innerHTML = '';
			return;
		}

		searchDebounceTimer = setTimeout(() => {
			performSearch(query);
		}, 300);
	});

	// Close modal when clicking a result
	searchResults.addEventListener('click', function (e) {
		const resultItem = e.target.closest('.search-result-item');
		if (resultItem) {
			closeSearchModal();
		}
	});
});
