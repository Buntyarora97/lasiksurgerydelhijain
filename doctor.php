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
       <img src="/assets/images/dr-rajat-jain.jpg" alt="<?= e(DOCTOR_NAME) ?>" width="900" height="1048" loading="eager">
       <figcaption><?= e(HOSPITAL_NAME) ?> · <?= e(ADDRESS_LINE) ?></figcaption>
    </figure>
    <div>
      <p class="eyebrow">Principal refractive-surgery expert</p>
      <h1 style="font-size:clamp(1.9rem,3.4vw,2.7rem)"><?= e(DOCTOR_NAME) ?></h1>
      <p><strong><?= e(DOCTOR_ROLE) ?></strong></p>
      <p style="margin-top:1rem">Dr. Jain's refractive practice is built around a simple discipline: the right procedure for the right eye — or no procedure at all, when that's the safer answer. His consultations are unhurried and direct: what your measurements show, which options fit them, what each involves, and what could go wrong.</p>
      <p>Decisions are made together, after evaluation, never before it. Patients frequently arrive convinced of one procedure and leave with a clearer, more personal plan — sometimes LASIK, sometimes PRK, sometimes an ICL, and occasionally the honest advice to wait.</p>
      <p class="muted-sm">Qualifications, fellowships, publications and academic work are maintained on his dedicated professional website.</p>
      <div class="btn-row">
        <a class="btn btn-primary" href="/appointment">Request Consultation</a>
        <a class="btn btn-ghost" href="<?= e(DOCTOR_URL) ?>" target="_blank" rel="noopener">Full biography ↗</a>
      </div>
    </div>
  </div>
  <div class="container" style="max-width:820px;margin-top:3rem">
    <h2>Care philosophy</h2>
    <ul style="margin:0 0 1rem 1.3rem;line-height:1.9">
      <li>Suitability before selling — evaluation decides, not marketing</li>
      <li>Option-neutral counselling — every fitting alternative is explained, including non-surgical ones</li>
      <li>Informed consent as a conversation, not a signature</li>
      <li>Planned follow-up — recovery is part of the procedure, not an afterthought</li>
    </ul>
    <p class="muted-sm">Note: detailed credentials, registrations and awards are published only after document verification on drrajatjain.com.</p>
  </div>
</section>
<?php page_end(); ?>
