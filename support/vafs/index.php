<?php
$pageTitle = "Support 3Kingdoms - VAFs";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Main Content -->
<main id="content">
  <!-- Hero Section -->
  <section class="hero hero-vafs">
    <div class="hero-content">
      <h1 class="hero-title">Support 3Kingdoms</h1>
      <p class="hero-subtitle">Voluntary Access Fees (VAFs)</p>
    </div>
  </section>

  <!-- Introduction -->
  <section class="vafs-intro">
    <div class="vafs-container">
      <div class="intro-card">
        <h2>What are VAFs?</h2>
        <p>
          <a href="http://www.themarblegroup.com" target="_blank">The Marble Group Inc.</a> is a privately held,
          Michigan-based company that owns and operates 3Kingdoms, 3Scapes, and all related entities.
          Our primary purpose is the health, promotion, and well-being of these games - resulting in
          persistent online adventures that are world-leaders in depth, description, and overall richness of play.
        </p>
        <p>
          3Kingdoms and 3Scapes are completely <strong>free to play</strong> - no subscriptions,
          no pay-to-win mechanics, just pure adventure. However, running world-class MUD servers
          takes resources. Voluntary Access Fees (VAFs) are how our community keeps the realms alive.
          Think of it like PBS, but with monsters.
        </p>
        <p>
          We rely on the generosity of our player community to keep the adventure running for everyone. As a bonus for VAFs contributed, players are afforded a number of choice rewards they can apply to their
          characters, a tiny sample of which are listed below. There are MANY, MANY more to choose from inside the
          games. Thank you for being part of this journey.
        </p>
      </div>
    </div>
  </section>

  <!-- Key Info -->
  <section class="vafs-info">
    <div class="vafs-container">
      <div class="section-header">
        <h2 class="section-title">How VAFs Work</h2>
        <p class="section-subtitle">Simple, flexible, and rewarding</p>
      </div>

      <div class="vafs-info-grid">
        <div class="info-card">
          <div class="info-card-header">
            <i class="fa-solid fa-coins"></i>
            <h3>$1 = 1 Credit</h3>
          </div>
          <p>VAF credits are purchased in packages where each dollar equals one credit</p>
        </div>
        <div class="info-card">
          <div class="info-card-header">
            <i class="fa-solid fa-clock"></i>
            <h3>Quick Processing</h3>
          </div>
          <p>Credits applied within 24 hours, usually much sooner</p>
        </div>
        <div class="info-card">
          <div class="info-card-header">
            <i class="fa-solid fa-users"></i>
            <h3>Account-Wide</h3>
          </div>
          <p>All your legal characters on that game share the same VAF credits</p>
        </div>
        <div class="info-card">
          <div class="info-card-header">
            <i class="fa-solid fa-infinity"></i>
            <h3>Never Expire</h3>
          </div>
          <p>Your VAF credits remain available forever, use them whenever you want</p>
        </div>
      </div>

      <div class="vafs-notice">
        <i class="fa-solid fa-circle-info"></i>
        <p>
          <strong>Important:</strong> VAF credits are game-specific and cannot be transferred
          between 3Kingdoms and 3Scapes. For questions, use <code>mail VAFS</code> in-game.
        </p>
      </div>
    </div>
  </section>

  <!-- Payment Options -->
  <section class="vafs-payment">
    <div class="vafs-container">
      <div class="section-header">
        <h2 class="section-title">Purchase VAF Credits</h2>
        <p class="section-subtitle">Secure payment processing via Square or PayPal</p>
      </div>

      <div class="payment-grid">
        <!-- Square Option -->
        <div class="payment-card payment-featured">
          <div class="payment-card-content">
            <div class="payment-header">
              <div class="payment-logo-text"><i class="fa-solid fa-square"></i> Square</div>
              <span class="payment-badge">Recommended</span>
            </div>
            <h3>Square Storefront</h3>
            <p>
              Visit our secure Square storefront for quick and easy VAF credit purchases.
              Select your game (3Kingdoms or 3Scapes) and package size.
            </p>
            <div class="payment-steps">
              <div class="step">
                <span class="step-num">1</span>
                <span>Choose your game & package</span>
              </div>
              <div class="step">
                <span class="step-num">2</span>
                <span>Complete secure checkout</span>
              </div>
              <div class="step">
                <span class="step-num">3</span>
                <span>Use <code>mail VAFS</code> in-game with your transaction ID</span>
              </div>
            </div>
          </div>
          <div class="payment-card-action">
            <a href="https://squareup.com/market/the-marble-group-inc" target="_blank" class="btn-primary square payment-btn">
              <i class="fa-solid fa-external-link-alt"></i>
              Visit Square Store
            </a>
          </div>
        </div>

        <!-- PayPal Option - Hosted Button (Current) -->
        <div class="payment-card">
          <div class="payment-card-content">
            <div class="payment-header">
              <div class="payment-logo-text"><i class="fa-brands fa-paypal"></i> PayPal</div>
            </div>
            <h3>PayPal Checkout</h3>
            <p>
              Use PayPal for a familiar checkout experience. Select your VAF package
              and enter your character name to have credits applied automatically.
            </p>

            <div class="paypal-form-container">
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" class="paypal-form">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="76H7AUJNZEWXJ">

                <div class="form-group">
                  <label for="vaf-package">Select VAF Package</label>
                  <select name="os0" id="vaf-package" class="form-select">
                    <optgroup label="3Kingdoms">
                      <option value="25 3Kingdoms VAF Credits $25.00 USD">25 Credits - $25</option>
                      <option value="50 3Kingdoms VAF Credits $50.00 USD">50 Credits - $50</option>
                      <option value="100 3Kingdoms VAF Credits $100.00 USD">100 Credits - $100</option>
                      <option value="125 3Kingdoms VAF Credits $125.00 USD">125 Credits - $125</option>
                      <option value="400 3Kingdoms VAF Credits $400.00 USD">400 Credits - $400</option>
                    </optgroup>
                    <optgroup label="3Scapes">
                      <option value="25 3Scapes VAF Credits $25.00 USD">25 Credits - $25</option>
                      <option value="50 3Scapes VAF Credits $50.00 USD">50 Credits - $50</option>
                      <option value="100 3Scapes VAF Credits $100.00 USD">100 Credits - $100</option>
                      <option value="125 3Scapes VAF Credits $125.00 USD">125 Credits - $125</option>
                      <option value="400 3Scapes VAF Credits $400.00 USD">400 Credits - $400</option>
                    </optgroup>
                  </select>
                  <input type="hidden" name="on0" value="Select VAF option">
                </div>

                <div class="form-group">
                  <label for="char-name">Character Name</label>
                  <input type="text" name="os1" id="char-name" maxlength="150" class="form-input"
                    placeholder="Enter any of your characters">
                  <input type="hidden" name="on1" value="Character Name">
                </div>

                <input type="hidden" name="currency_code" value="USD">
                <div class="payment-card-action">
                  <button type="submit" class="btn-secondary payment-btn">
                    <i class="fa-brands fa-paypal"></i>
                    Pay with PayPal
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <?php
        /*
        ============================================================================
        ALTERNATIVE: PayPal _xclick Form (Custom Amount Option)
        ============================================================================
        To enable this alternative PayPal form that allows custom donation amounts:
        1. Comment out or remove the "PayPal Option - Hosted Button" div above
        2. Uncomment the div below

        NOTE: This uses _xclick which is less secure than hosted buttons - users could potentially modify form values. However, it allows flexible/custom amounts.
        ============================================================================
        */
        ?>
        <!--
        <div class="payment-card">
          <div class="payment-card-content">
            <div class="payment-header">
              <div class="payment-logo-text"><i class="fa-brands fa-paypal"></i> PayPal</div>
            </div>
            <h3>PayPal Checkout</h3>
            <p>
              Use PayPal for a familiar checkout experience. Enter your desired VAF amount and character name. Remember: $1 = 1 VAF Credit.
            </p>

            <div class="paypal-form-container">
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" class="paypal-form">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="paypal@3k.org">
                <input type="hidden" name="item_name" value="3Kingdoms VAF Credit">
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="tax" value="0.00">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="bn" value="PP-BuyNowBF">

                <div class="form-group">
                  <label for="vaf-game">Select Game</label>
                  <select name="item_name" id="vaf-game" class="form-select">
                    <option value="3Kingdoms VAF Credit">3Kingdoms</option>
                    <option value="3Scapes VAF Credit">3Scapes</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="vaf-amount">Amount (USD)</label>
                  <input type="number" name="amount" id="vaf-amount" min="1" step="1" class="form-input" placeholder="Enter amount ($1 = 1 credit)" required>
                </div>

                <div class="form-group">
                  <label for="char-name-alt">Character Name</label>
                  <input type="text" name="custom" id="char-name-alt" maxlength="200" class="form-input" placeholder="Enter any of your characters" required>
                </div>

                <div class="payment-card-action">
                  <button type="submit" class="btn-secondary payment-btn">
                    <i class="fa-brands fa-paypal"></i>
                    Pay with PayPal
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        -->
      </div>

      <p class="payment-note">
        <i class="fa-solid fa-shield-halved"></i>
        Payments appear on statements as <strong>TMG/The Marble Group Inc.</strong>
        VAF purchases are not tax-deductible.
      </p>
    </div>
  </section>

  <!-- VAF Rewards -->
  <section class="vafs-rewards">
    <div class="vafs-container">
      <div class="section-header">
        <h2 class="section-title">VAF Rewards</h2>
        <p class="section-subtitle">Thank you bonuses for supporting the realms</p>
      </div>

      <div class="rewards-grid">
        <!-- Reselectable Enhancements -->
        <div class="rewards-card">
          <div class="rewards-header">
            <i class="fa-solid fa-rotate"></i>
            <h3>Reselectable Enhancements</h3>
          </div>
          <p class="rewards-desc">Use these anytime you need them, perfect for character adjustments</p>
          <ul class="rewards-list">
            <li><i class="fa-solid fa-check"></i> Remove one scar</li>
            <li><i class="fa-solid fa-check"></i> Reset alignment to true neutral</li>
            <li><i class="fa-solid fa-check"></i> Fully untrain one skill</li>
            <li><i class="fa-solid fa-check"></i> Three teleports to Center of Town</li>
            <li><i class="fa-solid fa-check"></i> Three unbind uses for items</li>
            <li><i class="fa-solid fa-check"></i> Free stat reset (no XP cost)</li>
            <li><i class="fa-solid fa-check"></i> Penalty-free guild removal</li>
            <li><i class="fa-solid fa-check"></i> Character restore from backup</li>
            <li><i class="fa-solid fa-check"></i> Multi-guild a character</li>
            <li><i class="fa-solid fa-check"></i> View real-time combat damage</li>
          </ul>
          <p class="rewards-more">...and many more!</p>
        </div>

        <!-- Permanent Enhancements -->
        <div class="rewards-card">
          <div class="rewards-header">
            <i class="fa-solid fa-star"></i>
            <h3>Permanent Enhancements</h3>
          </div>
          <p class="rewards-desc">One-time purchases that enhance your characters forever</p>
          <ul class="rewards-list">
            <li><i class="fa-solid fa-check"></i> Triple-length AFK message</li>
            <li><i class="fa-solid fa-check"></i> +25 max aliases (up to 4x)</li>
            <li><i class="fa-solid fa-check"></i> Earmuffs level 1 (740)</li>
            <li><i class="fa-solid fa-check"></i> Quadruple tell history (64 tells)</li>
            <li><i class="fa-solid fa-check"></i> Custom title (up to 80 chars)</li>
            <li><i class="fa-solid fa-check"></i> Colorized ANSI title</li>
            <li><i class="fa-solid fa-check"></i> Toggle who list visibility</li>
            <li><i class="fa-solid fa-check"></i> Remote board reader/writer</li>
          </ul>
          <p class="rewards-more">...and many more!</p>
        </div>
      </div>

      <div class="rewards-cta">
        <p>Explore all available VAF rewards in-game using <code>help vaf</code></p>
      </div>
    </div>
  </section>

  <!-- How VAFs Are Used -->
  <section class="vafs-breakdown">
    <div class="vafs-container">
      <div class="section-header">
        <h2 class="section-title">Where Your VAFs Go</h2>
        <p class="section-subtitle">Transparency in how contributions are used</p>
      </div>

      <div class="breakdown-container">
        <div class="breakdown-visual">
          <div class="breakdown-bar">
            <div class="bar-segment hosting" style="width: 25%;" data-label="Hosting"></div>
            <div class="bar-segment hardware" style="width: 25%;" data-label="Hardware"></div>
            <div class="bar-segment legal" style="width: 20%;" data-label="Legal/Tax"></div>
            <div class="bar-segment operations" style="width: 20%;" data-label="Operations"></div>
            <div class="bar-segment domination" style="width: 10%;" data-label="World Domination"></div>
          </div>
        </div>

        <div class="breakdown-details">
          <div class="breakdown-item">
            <span class="breakdown-dot hosting"></span>
            <span class="breakdown-label">ISP Hosting & Related Costs</span>
            <span class="breakdown-amount">25&cent;</span>
          </div>
          <div class="breakdown-item">
            <span class="breakdown-dot hardware"></span>
            <span class="breakdown-label">Hardware/Software Upgrades</span>
            <span class="breakdown-amount">25&cent;</span>
          </div>
          <div class="breakdown-item">
            <span class="breakdown-dot legal"></span>
            <span class="breakdown-label">Taxes, Legal & Accounting</span>
            <span class="breakdown-amount">20&cent;</span>
          </div>
          <div class="breakdown-item">
            <span class="breakdown-dot operations"></span>
            <span class="breakdown-label">Operations, Savings, Charity</span>
            <span class="breakdown-amount">20&cent;</span>
          </div>
          <div class="breakdown-item">
            <span class="breakdown-dot domination"></span>
            <span class="breakdown-label">World Domination Initiative</span>
            <span class="breakdown-amount">10&cent;</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="vafs-cta">
    <div class="vafs-container">
      <h2>Ready to Support the Realms?</h2>
      <p>Every contribution helps keep 3Kingdoms running strong for players around the world.</p>
      <div class="cta-buttons">
        <a href="https://squareup.com/market/the-marble-group-inc" target="_blank" class="btn-primary">
          <i class="fa-solid fa-heart"></i>
          Support Now
        </a>
        <a href="/connect/index.php" class="btn-secondary">Play for Free</a>
      </div>
    </div>
  </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script src="/design/script/script_main.js"></script>
</body>

</html>