<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('hospital','Jain Eye Hospital & Laser Centre — Our Associated Centre | ' . SITE_NAME,
 'Consultations and procedures connected with Jain Eye Hospital & Laser Centre, Shalimar Bagh, Delhi. Location, access and what to expect.',
 [['About the Centre','/hospital']]);
?>
<section class="section">
  <div class="container split-2">
    <div>
      <p class="eyebrow">Our associated centre</p>
      <h1 style="font-size:clamp(1.9rem,3.4vw,2.7rem)"><?= e(HOSPITAL_NAME) ?></h1>
      <p><strong><?= e(HOSPITAL_TAG) ?></strong></p>
       <p style="margin-top:1rem"><?= e(ASSOCIATION_LINE) ?> The first visit is a clinical evaluation: the team reviews your eye and health history, examines your eyes, and recommends tests based on what is needed for your case.</p>
      <address class="address-block">
        <?= e(ADDRESS_LINE) ?><br>
         <span class="muted">Please confirm the most convenient entrance and access details with the team while booking.</span>
      </address>
      <p class="muted-sm">Parking, step-free access and exact department locations: please confirm with our team when booking.</p>
      <div class="btn-row">
        <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
         <a class="btn btn-ghost" href="<?= e(HOSPITAL_URL) ?>" target="_blank" rel="noopener noreferrer">Hospital website ↗</a>
      </div>
    </div>
    <figure class="doc-figure">
        <img src="<?= e(client_photo_src('hospital pic (2).png')) ?>" alt="Exterior of Jain Eye Hospital and Laser Centre" fetchpriority="high">
        <figcaption>Exterior photograph of the hospital.</figcaption>
    </figure>
  </div>
  <div class="container" style="max-width:820px;margin-top:3rem">
     <h2>Plan your visit with clear information</h2>
    <div class="card-grid three" style="margin-top:1.5rem">
       <div class="card"><h3>Before you travel</h3><p>Request a time first. Call the team to confirm the entrance, access arrangements, and any preparation needed for your visit.</p></div>
       <div class="card"><h3>At the evaluation</h3><p>Bring your current glasses or contact-lens details, recent prescription if available, and a list of medicines or relevant eye history.</p></div>
       <div class="card"><h3>Decide after counselling</h3><p>Ask about suitable options, limitations, risks, recovery and the written estimate. You can take time to decide; a procedure is never confirmed by an online request.</p></div>
    </div>
     <div class="card" style="margin-top:1.5rem">
       <h3>Contact the centre</h3>
       <p class="footer-phone-list"><strong>Phone</strong><?php foreach (PHONE_NUMBERS as $number): ?><a href="<?= e($number['href']) ?>"><?= e($number['display']) ?></a><?php endforeach; ?><strong>Email</strong><a href="mailto:<?= e(EMAIL_MAIN) ?>"><?= e(EMAIL_MAIN) ?></a></p>
       <p class="muted-sm">Please confirm current services, appointment availability and access information with the team before travelling.</p>
     </div>
     <p class="muted-sm" style="margin-top:1.5rem">For hospital-wide services and current facility information, use the hospital's external website or contact the centre directly.</p>
  </div>
</section>
<?php page_end(); ?>
