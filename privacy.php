<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('privacy','Privacy Policy — ' . SITE_NAME,
 'How lasiksurgeryindelhi.com collects, uses, stores and protects your personal information.',
 [['Privacy Policy','/privacy']]);
?>
<section class="section"><div class="container" style="max-width:820px">
  <p class="eyebrow">Legal</p><h1>Privacy Policy</h1>
  <p class="section-lede">Last updated: <?= date('F Y') ?>. This draft is prepared for Indian operations and should be reviewed by legal counsel before being relied upon as final.</p>
  <h2>What we collect</h2>
  <p>When you submit an evaluation request, we collect your name, age range, phone number, optional email, city, current vision correction and your message. We deliberately do not request medical records, IDs or sensitive health documents through the website.</p>
  <h2>Why we collect it</h2>
  <p>Solely to respond to your enquiry, schedule an evaluation and maintain a record of consent. We do not sell, rent or share your data with third parties for marketing.</p>
  <h2>How it's stored &amp; protected</h2>
  <p>Data is stored in an access-controlled database on our hosting infrastructure. Forms use encryption in transit (HTTPS), anti-abuse rate limiting and server-side validation. Administrative access is authenticated, logged and role-restricted.</p>
  <h2>Retention &amp; your rights</h2>
  <p>Enquiry data is retained only as long as needed to handle your request and meet record-keeping obligations. You may request correction or deletion of your information by emailing <?= e(EMAIL_MAIN) ?>.</p>
  <h2>Cookies &amp; analytics</h2>
  <p>This site does not use advertising trackers. Any analytics, if enabled, is consent-based and anonymized. Maps load only after you click "Load map".</p>
  <h2>Contact</h2>
  <p>Privacy questions: <?= e(EMAIL_MAIN) ?> · <?= e(ADDRESS_LINE) ?>.</p>
</div></section>
<?php page_end(); ?>
