<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('doctor','Dr. Rajat Jain — Refractive Surgery Specialist in Delhi | ' . SITE_NAME,
 'Meet Dr. Rajat Jain, Medical Director & Consultant at Jain Eye Hospital & Laser Centre — cornea, cataract, LASIK & refractive surgery.',
 [['Dr. Rajat Jain','/doctor']]);
?>
<section class="section">
  <div class="container split-2">
    <figure class="doc-figure">
       <img src="/assets/images/dr-rajat-jain-approved.jpg" alt="Portrait of <?= e(DOCTOR_NAME) ?>" width="1200" height="1200" loading="eager">
       <figcaption><?= e(HOSPITAL_NAME) ?> · <?= e(ADDRESS_LINE) ?></figcaption>
    </figure>
    <div>
      <p class="eyebrow">Principal refractive-surgery expert</p>
      <h1 style="font-size:clamp(1.9rem,3.4vw,2.7rem)"><?= e(DOCTOR_NAME) ?></h1>
      <p><strong><?= e(DOCTOR_ROLE) ?></strong></p>
       <p style="margin-top:1rem">Refractive-surgery decisions begin with the patient's eye examination, history and measurements—not with a procedure name. The consultation should explain what the findings show, which options may fit, what each involves, and what could go wrong.</p>
       <p>A consultation may cover laser-based procedures, surface treatment, lens-based options, or continuing with glasses or contact lenses. Suitability and availability are confirmed only after clinical evaluation; it is reasonable to take time before deciding.</p>
      <p class="muted-sm">Qualifications, fellowships, publications and academic work are maintained on his dedicated professional website.</p>
      <div class="btn-row">
        <a class="btn btn-primary" href="/appointment">Request Consultation</a>
        <a class="btn btn-ghost" href="<?= e(DOCTOR_URL) ?>" target="_blank" rel="noopener">Full biography ↗</a>
      </div>
    </div>
  </div>
  <div class="container" style="max-width:820px;margin-top:3rem">
    <h2>What to expect from a consultation</h2>
    <div class="card-grid two" style="margin-top:1.5rem">
      <article class="card"><h3>Understand the measurements</h3><p>Ask how your prescription, corneal shape, thickness, tear film and overall eye health affect your options.</p></article>
      <article class="card"><h3>Compare the alternatives</h3><p>Discuss the benefits, limitations, recovery and risks of each option that may suit your eyes—including no surgery.</p></article>
      <article class="card"><h3>Take time to decide</h3><p>Make sure you understand the plan and written estimate before choosing an elective procedure.</p></article>
      <article class="card"><h3>Plan follow-up</h3><p>Ask what reviews and aftercare are expected, and whom to contact if recovery does not feel right.</p></article>
    </div>
    <p class="muted-sm">Note: detailed credentials, registrations and awards are published only after document verification on drrajatjain.com.</p>
  </div>
</section>
<?php page_end(); ?>
