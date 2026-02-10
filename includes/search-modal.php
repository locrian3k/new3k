<!-- Search Modal -->
<div id="search-modal" class="search-modal" role="dialog" aria-modal="true" aria-labelledby="search-title" hidden>
    <div class="search-modal-overlay" aria-hidden="true"></div>
    <div class="search-modal-content">
        <div class="search-modal-header">
            <h2 id="search-title" class="search-modal-title">
                <i class="fa-solid fa-search"></i> Search 3Kingdoms
            </h2>
            <button
                id="search-close"
                class="search-close-btn"
                aria-label="Close search">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>

        <div class="search-form-container">
            <form id="search-form" role="search">
                <div class="search-input-wrapper">
                    <i class="fa-solid fa-search search-input-icon"></i>
                    <input
                        type="search"
                        id="search-input"
                        name="q"
                        class="search-input"
                        placeholder="Search pages..."
                        autocomplete="off"
                        aria-describedby="search-hint">
                    <button type="submit" class="search-submit-btn" aria-label="Submit search">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
                <p id="search-hint" class="search-hint">
                    <span class="search-hint-text">Enter at least 2 characters to search</span>
                    <span class="search-hint-shortcut"><kbd>Ctrl</kbd> + <kbd>K</kbd> to toggle</span>
                </p>
            </form>
        </div>

        <div id="search-results" class="search-results" aria-live="polite">
            <!-- Results will be inserted here via JavaScript -->
        </div>
    </div>
</div>
