<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
$procs = [];
try {
    $procs = db()->query("SELECT * FROM procedures WHERE status='verified_offered' ORDER BY category, name")->fetchAll();
}
catch (Throwable $e) { $procs = []; }
page_start('procedures','Refractive Surgery Procedures — LASIK, PRK, ICL & More | ' . SITE_NAME,
 'An honest overview of laser and lens-based vision-correction procedures, what each involves and who may be assessed.',
 [['Procedures','/procedures']]);
?>
<section class="section">
  <div class="container">
    <p class="eyebrow">Procedures overview</p>
    <h1>Vision-correction procedures, explained honestly</h1>
    <p class="section-lede">Every procedure below reshapes or supplements the eye's focusing power in a different way. None is "the best" — each fits different eyes and different needs. Only options verified as available at our centre are shown as offered; others are education-only.</p>

    <div class="card-grid three">
      <article class="card proc-card image-card">
        <img src="<?= e(client_photo_src('Surgeon Using an Operating Microscope.png')) ?>" alt="Surgeon using an operating microscope in a clinical theatre" fetchpriority="high">
        <h3>LASIK / Femto LASIK</h3>
        <p>A thin flap is created on the cornea (with a microkeratome or femtosecond laser), the exposed tissue is reshaped with an excimer laser, and the flap is repositioned. The most widely performed laser vision correction globally.</p>
        <p class="muted"><strong>May suit:</strong> stable prescription, adequate corneal thickness, healthy tear film.</p>
        <p class="muted"><strong>Recovery:</strong> often rapid; most resume normal activity within days.</p>
        <p class="muted"><strong>Limitations:</strong> flap-related considerations; dry eye can persist for weeks.</p>
      </article>
      <article class="card proc-card image-card">
        <img src="<?= e(client_photo_src('hospital pic (17).png')) ?>" alt="Ophthalmic diagnostic equipment used during an examination" loading="lazy">
        <h3>Customised / Topography-guided</h3>
        <p>A LASIK-style treatment where the ablation profile is designed from detailed corneal mapping, aiming to correct subtle optical irregularities a standard prescription misses.</p>
        <p class="muted"><strong>May suit:</strong> higher astigmatism or irregular corneal optics.</p>
        <p class="muted"><strong>Recovery:</strong> similar pattern to standard LASIK.</p>
        <p class="muted"><strong>Limitations:</strong> more mapping data does not guarantee better outcomes for every eye.</p>
      </article>
      <article class="card proc-card edu image-card">
        <img src="<?= e(client_photo_src('neha mohan (4).png')) ?>" alt="Ophthalmologist examining a patient's eyes with an eye-testing instrument" loading="lazy">
        <h3>SMILE / SILK <span class="tag-edu">Education only</span></h3>
        <p>Flapless lenticule procedures in which a shaped piece of corneal tissue is created inside the cornea and removed through a small incision. Availability at this centre requires confirmation — this description is educational.</p>
        <p class="muted"><strong>Note:</strong> education-only pages never imply the procedure is offered here.</p>
      </article>
      <article class="card proc-card image-card">
        <img src="<?= e(client_photo_src('Microsurgery Under the Surgical Microscope.png')) ?>" alt="Ophthalmic surgeon working under a surgical microscope" loading="lazy">
        <h3>PRK / TransPRK</h3>
        <p>No flap: the cornea's surface layer is removed and the excimer laser reshapes directly. The surface regrows over days. Often discussed when corneas are thinner or flap creation is undesirable.</p>
        <p class="muted"><strong>May suit:</strong> thinner corneas, certain contact-sport athletes.</p>
        <p class="muted"><strong>Recovery:</strong> slower early vision; comfort improves over the first week.</p>
        <p class="muted"><strong>Limitations:</strong> more early discomfort; longer visual stabilization.</p>
      </article>
      <article class="card proc-card image-card">
        <img src="<?= e(client_photo_src('hospital pic (14).png')) ?>" alt="Eye examination room with clinical equipment" loading="lazy">
        <h3>Phakic IOL / ICL</h3>
        <p>A thin lens is implanted inside the eye, in front of your natural lens, leaving the cornea untouched. An option when power is beyond safe laser correction or corneas are too thin.</p>
        <p class="muted"><strong>May suit:</strong> very high myopia, thin corneas.</p>
        <p class="muted"><strong>Recovery:</strong> usually quick visual recovery.</p>
        <p class="muted"><strong>Limitations:</strong> an intraocular procedure with its own risk set; long-term monitoring required.</p>
      </article>
      <article class="card proc-card cta-card">
        <h3>Which fits your eyes?</h3>
        <p>Only measurements can answer that. Start with an evaluation.</p>
        <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
      </article>
    </div>
    <p class="muted-sm" style="margin-top:2rem">This page is educational and does not constitute medical advice. Suitability is determined only by clinical evaluation; individual outcomes vary.</p>
  </div>
</section>
<?php page_end(); ?>
