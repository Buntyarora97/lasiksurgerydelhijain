<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('contact','Contact Us — ' . SITE_NAME,
 'Contact details and location for LASIK evaluations at Jain Eye Hospital & Laser Centre, Shalimar Bagh, Delhi.',
 [['Contact','/contact']]);
?>
<section class="section">
  <div class="container split-2" style="align-items:start">
    <div>
      <p class="eyebrow">Contact</p>
      <h1>Talk to us</h1>
      <p class="section-lede">Questions about suitability, procedures or planning an evaluation? Reach out — a real conversation beats a hundred web pages.</p>
      <figure class="side-feature">
        <img src="<?= e(client_photo_src('hospital pic (9).png')) ?>" alt="Patient waiting area at the hospital" fetchpriority="high">
        <figcaption><?= e(HOSPITAL_NAME) ?> · <?= e(ADDRESS_LINE) ?></figcaption>
      </figure>
      <div class="card" style="margin-bottom:1.2rem">
        <h3>Centre</h3>
        <address class="address-block"><strong><?= e(HOSPITAL_NAME) ?></strong><br><?= e(ADDRESS_LINE) ?></address>
      </div>
      <div class="card" style="margin-bottom:1.2rem">
        <h3>Direct</h3>
        <p class="footer-phone-list"><strong>Phone</strong>
          <?php foreach (PHONE_NUMBERS as $number): ?><a href="<?= e($number['href']) ?>"><?= e($number['display']) ?></a><?php endforeach; ?>
          <strong>Email</strong><a href="mailto:<?= e(EMAIL_MAIN) ?>"><?= e(EMAIL_MAIN) ?></a>
        </p>
      </div>
      <div class="map-consent card" id="mapConsent">
      <p>Maps load only after you choose to open them. You can also get directions directly.</p>
        <button class="btn btn-sm btn-primary" id="loadMapBtn">Load map</button>
      <a class="btn btn-sm btn-ghost" href="https://www.google.com/maps/search/?api=1&amp;query=<?= rawurlencode(MAPS_QUERY) ?>" target="_blank" rel="noopener">Open directions</a>
      </div>
    </div>
    <div class="card">
      <h3>Prefer a callback?</h3>
      <p class="muted">Use the evaluation form — it reaches the same team with the details they need to help you properly.</p>
      <a class="btn btn-primary btn-block" href="/appointment">Request a Call / Evaluation</a>
      <p class="form-note" style="margin-top:1rem">For emergencies or sudden vision changes, do not use this website — seek urgent eye care immediately.</p>
    </div>
  </div>
</section>
<?php page_end(); ?>
