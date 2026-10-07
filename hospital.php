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
       <p style="margin-top:1rem"><?= e(ASSOCIATION_LINE) ?> Evaluation, counselling and procedures take place at the hospital at <?= e(ADDRESS_LINE) ?>, with diagnostic facilities and care infrastructure.</p>
      <address class="address-block">
        <?= e(ADDRESS_LINE) ?><br>
         <span class="muted">Please confirm the most convenient entrance and access details with the team while booking.</span>
      </address>
      <p class="muted-sm">Parking, step-free access and exact department locations: please confirm with our team when booking.</p>
      <div class="btn-row">
        <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
        <a class="btn btn-ghost" href="<?= e(HOSPITAL_URL) ?>" target="_blank" rel="noopener">Hospital website ↗</a>
      </div>
    </div>
    <figure class="doc-figure">
       <img src="/assets/images/hospital-building.jpg" alt="<?= e(HOSPITAL_NAME) ?> building" width="1000" height="667" loading="eager">
       <figcaption><?= e(ADDRESS_LINE) ?></figcaption>
    </figure>
  </div>
  <div class="container" style="max-width:820px;margin-top:3rem">
    <h2>What the association means for you</h2>
    <div class="card-grid three" style="margin-top:1.5rem">
      <div class="card"><h3>One campus</h3><p>Consultation, diagnostics and procedure under one roof — no running between facilities.</p></div>
      <div class="card"><h3>Full eye-hospital backup</h3><p>Broader ophthalmic departments are available on-site if your evaluation reveals anything beyond refractive needs.</p></div>
      <div class="card"><h3>Continuity of records</h3><p>Your evaluation and follow-up records remain part of the hospital system, accessible for future eye care.</p></div>
    </div>
    <p class="muted-sm" style="margin-top:1.5rem">For departments unrelated to refractive surgery — retina, glaucoma, paediatrics and more — please visit the hospital website directly.</p>
  </div>
</section>
<?php page_end(); ?>
