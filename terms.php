<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('terms','Terms of Use — ' . SITE_NAME,
 'Terms governing use of lasiksurgeryindelhi.com educational content and services.',
 [['Terms of Use','/terms']]);
?>
<section class="section"><div class="container" style="max-width:820px">
  <p class="eyebrow">Legal</p><h1>Terms of Use</h1>
  <p class="section-lede">Last updated: <?= date('F Y') ?>.</p>
  <h2>Educational purpose</h2>
  <p>All content on this website is general patient education. It is not medical advice, does not create a doctor–patient relationship, and must not be used to self-diagnose or self-treat.</p>
  <h2>No emergency service</h2>
  <p>This website and its forms are not monitored for emergencies. For sudden vision loss, severe pain, trauma or acute symptoms, seek urgent eye care immediately.</p>
  <h2>Accuracy &amp; changes</h2>
  <p>Medical pages carry named reviewers and review dates. We work to keep information accurate, but medical knowledge evolves — always confirm current details directly with the centre. We may update content and these terms without notice.</p>
  <h2>Intellectual property</h2>
  <p>Site content, branding and the Clarity Aperture design system are the property of the site operator. Short quotations with attribution and a link are permitted.</p>
  <h2>Acceptance</h2>
  <p>By using this website you accept these terms. Questions: <?= e(EMAIL_MAIN) ?>.</p>
</div></section>
<?php page_end(); ?>
