<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('disclaimer','Medical Disclaimer — ' . SITE_NAME,
 'Important medical disclaimer for lasiksurgeryindelhi.com content.',
 [['Medical Disclaimer','/medical-disclaimer']]);
?>
<section class="section"><div class="container" style="max-width:820px">
  <p class="eyebrow">Please read</p><h1>Medical Disclaimer</h1>
  <div class="card safety-urgent" style="margin:1.5rem 0">
    <strong>Emergency warning:</strong> for sudden vision loss, severe eye pain, eye trauma, chemical exposure, or flashes/floaters with a curtain-like shadow over your vision — seek urgent eye care or an emergency department immediately. This website is not an emergency service and is not continuously monitored.
  </div>
  <h2>Educational content only</h2>
  <p>All information on this website is general patient education. It is not a substitute for professional medical advice, diagnosis or treatment, and it does not create a doctor–patient relationship.</p>
  <h2>No guarantees</h2>
  <p>LASIK and other refractive procedures are elective surgeries. Suitability varies from person to person; no procedure is risk-free; and no visual outcome — including spectacle independence or 6/6 vision — is guaranteed. Individual recovery and results vary.</p>
  <h2>Your decisions</h2>
  <p>Never disregard or delay professional medical advice because of something you read here. Always consult a qualified eye-care professional about your specific situation, and never start, stop or adjust medication based on website content.</p>
  <h2>Reviewer accountability</h2>
  <p>Major medical pages are reviewed by a named clinician with review dates shown on-page. If something appears outdated, please tell us at <?= e(EMAIL_MAIN) ?>.</p>
</div></section>
<?php page_end(); ?>
