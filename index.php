<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('home',
    'LASIK Surgery in Delhi: Start With the Right Evaluation | ' . SITE_NAME,
    'Understand LASIK, compare suitable options and meet refractive-surgery specialist Dr. Rajat Jain in Shalimar Bagh, Delhi. Clear decisions before clearer vision.');
?>

<!-- ============ SECTION 1: Brand-led split hero ============ -->
<section class="hero" id="hero">
  <div class="container hero-grid">
    <div class="hero-copy">
      <p class="eyebrow reveal">Refractive vision correction · New Delhi</p>
      <h1 class="reveal">LASIK Surgery in Delhi: <span class="grad">Start With the Right Evaluation</span></h1>
      <p class="hero-lede reveal">Understand your eyes, compare the options that genuinely fit them, and meet a refractive-surgery specialist before you decide. No pressure, no promises — just clear information.</p>
       <div class="hero-ctas reveal">
        <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
        <a class="btn btn-ghost" href="/procedures">Explore Options</a>
      </div>
       <p class="hero-note reveal">⚠️ No online quiz can confirm suitability — only a detailed eye examination can.</p>
       <div class="hero-proof reveal">
         <span><b>01</b> Understand your eyes</span>
         <span><b>02</b> Compare suitable options</span>
         <span><b>03</b> Decide without pressure</span>
       </div>
    </div>
      <div class="hero-visual" id="apertureWrap">
        <canvas id="apertureCanvas" width="560" height="560" aria-label="Abstract aperture focusing light — decorative"></canvas>
        <div class="hero-image-stage">
          <figure class="hero-image-main">
            <img src="/assets/images/dr-rajat-jain.jpg" alt="<?= e(DOCTOR_NAME) ?>, refractive surgery specialist" width="900" height="1100">
            <figcaption><strong>Dr. Rajat Jain</strong><span>Cornea &amp; refractive surgery</span></figcaption>
          </figure>
          <figure class="hero-image-inset">
            <img src="/assets/images/hospital-interior.jpg" alt="Jain Eye Hospital interior" width="1000" height="667">
            <figcaption><span>Trusted eye care in Shalimar Bagh</span></figcaption>
          </figure>
         <div class="hero-slide-dots" role="tablist" aria-label="Visual sequence">
           <button role="tab" aria-selected="true" data-slide="0"><span>Evaluation</span></button>
           <button role="tab" aria-selected="false" data-slide="1"><span>Explanation</span></button>
           <button role="tab" aria-selected="false" data-slide="2"><span>Pathway</span></button>
         </div>
       </div>
    </div>
  </div>
</section>

<!-- ============ SECTION 2: Trust & relationship strip ============ -->
<section class="trust-strip">
  <div class="container">
    <div class="trust-items">
      <div class="trust-item"><strong><?= e(HOSPITAL_NAME) ?></strong><span><?= e(HOSPITAL_TAG) ?></span></div>
      <div class="trust-item"><strong><?= e(DOCTOR_NAME) ?></strong><span>Cornea, Cataract &amp; Refractive Surgery</span></div>
      <div class="trust-item"><strong>Shalimar Bagh</strong><span><?= e(ADDRESS_LINE) ?></span></div>
    </div>
    <ul class="trust-principles">
      <li>Detailed screening</li><li>Option-neutral counselling</li><li>Informed consent</li><li>Planned follow-up</li>
    </ul>
  </div>
</section>

<!-- ============ SECTION 3: Could LASIK be right for me? ============ -->
<section class="section" id="suitability">
  <div class="container">
    <p class="eyebrow">Interactive · Educational only</p>
    <h2>Could LASIK be right for me?</h2>
    <p class="section-lede">These questions mirror what a surgeon considers. They can never confirm eligibility — but they can help you arrive at your consultation better informed.</p>
     <div class="checklist-layout">
       <div class="checklist card" id="suitChecklist">
         <div class="check-grid">
           <label class="check"><input type="checkbox" data-w="discuss"><span>I am 18 or older</span></label>
           <label class="check"><input type="checkbox" data-w="exam"><span>My spectacle power has been stable for about a year</span></label>
           <label class="check"><input type="checkbox" data-w="exam"><span>My eyes are generally healthy</span></label>
           <label class="check"><input type="checkbox" data-w="discuss"><span>I have significant dry-eye symptoms</span></label>
           <label class="check"><input type="checkbox" data-w="discuss"><span>I am pregnant or breastfeeding</span></label>
           <label class="check"><input type="checkbox" data-w="discuss"><span>I have diabetes or an autoimmune condition</span></label>
           <label class="check"><input type="checkbox" data-w="exam"><span>I understand outcomes vary person to person</span></label>
           <label class="check"><input type="checkbox" data-w="discuss"><span>My job or sport has specific vision demands</span></label>
         </div>
         <div class="check-result" id="checkResult" aria-live="polite">
           <strong>Select the statements that apply to you.</strong>
           <p>Nothing is saved or sent anywhere — this runs only in your browser.</p>
         </div>
         <a class="btn btn-primary" href="/lasik-evaluation">Understand the full evaluation</a>
       </div>
       <figure class="section-photo section-photo-tall">
         <img src="/assets/images/lasik-eligibility.jpg" alt="Illustrative close-up of an eye used to explain suitability" width="1600" height="1056" loading="lazy">
         <figcaption>Suitability is decided by measurements, not a quiz.</figcaption>
       </figure>
    </div>
  </div>
</section>

<!-- ============ SECTION 4: Vision-correction pathways ============ -->
<section class="section section-alt" id="services">
  <div class="container">
    <p class="eyebrow">Verified pathways</p>
    <h2>Vision-correction pathways</h2>
    <p class="section-lede">Only procedures confirmed as available are shown as offered. Everything else is clearly labelled as education.</p>
     <div class="services-slider" data-services-slider>
       <button class="slider-arrow slider-prev" type="button" data-service-prev aria-label="Previous services">‹</button>
       <div class="services-viewport">
         <div class="services-track">
      <article class="card proc-card image-card">
        <img src="/assets/images/refractive-surgery-preview.jpg" alt="Illustrative view of refractive surgery planning" width="900" height="603" loading="lazy">
        <h3>LASIK / Femto LASIK</h3>
        <p>A thin corneal flap is created and the underlying tissue reshaped with an excimer laser. The most widely performed laser vision correction worldwide.</p>
        <p class="muted">May suit: stable prescription, adequate corneal thickness.</p>
        <p class="muted">Limitation: flap-related considerations; not ideal for very thin corneas.</p>
        <a class="card-link" href="/procedures">Learn responsibly →</a>
      </article>
      <article class="card proc-card image-card">
        <img src="/assets/images/topography.jpg" alt="Corneal topography mapping used during evaluation" width="1000" height="667" loading="lazy">
        <h3>Customised / Topography-guided</h3>
        <p>Treatment profiles designed from detailed corneal mapping, aiming to address subtle optical irregularities beyond a standard prescription.</p>
        <p class="muted">May suit: higher astigmatism or irregular corneal optics.</p>
        <p class="muted">Limitation: advanced-sounding is not automatically better — fit matters.</p>
        <a class="card-link" href="/compare">Compare approaches →</a>
      </article>
      <article class="card proc-card edu image-card">
        <img src="/assets/images/mega-smile.webp" alt="Abstract illustration of a flapless vision-correction pathway" width="520" height="360" loading="lazy">
        <h3>SMILE / SILK <span class="tag-edu">Education only</span></h3>
        <p>Flapless small-incision lenticule extraction. Availability at this centre requires confirmation — this page explains the concept honestly.</p>
        <p class="muted">May suit: certain prescriptions where flapless is preferred.</p>
        <a class="card-link" href="/compare">Read the comparison →</a>
      </article>
      <article class="card proc-card image-card">
        <img src="/assets/images/mega-prk.webp" alt="Abstract illustration of surface vision-correction treatment" width="520" height="360" loading="lazy">
        <h3>PRK / TransPRK</h3>
        <p>No-flap surface ablation — the laser reshapes the cornea directly. Often discussed when corneal thickness is limited.</p>
        <p class="muted">May suit: thinner corneas, certain contact sports.</p>
        <p class="muted">Limitation: slower early visual recovery than LASIK.</p>
        <a class="card-link" href="/procedures">Learn responsibly →</a>
      </article>
      <article class="card proc-card image-card">
        <img src="/assets/images/mega-icl.webp" alt="Abstract illustration of lens-based vision correction" width="520" height="360" loading="lazy">
        <h3>Phakic IOL / ICL</h3>
        <p>A lens implanted inside the eye, in front of the natural lens — an option when power is beyond safe laser correction.</p>
        <p class="muted">May suit: very high myopia or thin corneas.</p>
        <p class="muted">Limitation: an intraocular procedure with its own risk profile.</p>
        <a class="card-link" href="/compare">Compare with LASIK →</a>
      </article>
      <article class="card proc-card cta-card">
        <h3>Not sure where you fit?</h3>
        <p>That's exactly what the evaluation answers. Compare options calmly, then decide with a specialist.</p>
        <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
      </article>
         </div>
       </div>
       <button class="slider-arrow slider-next" type="button" data-service-next aria-label="Next services">›</button>
       <div class="slider-dots" data-service-dots aria-label="Service slides"></div>
    </div>
  </div>
</section>

<!-- ============ SECTION 5: The evaluation journey ============ -->
<section class="section">
  <div class="container">
    <p class="eyebrow">Five stages</p>
    <h2>The evaluation journey</h2>
    <p class="section-lede">Your surgeon decides which tests you need — there is no one fixed "test bundle". If you wear contact lenses, you may be asked to stop for a period before measurement.</p>
    <div class="journey-layout">
      <ol class="timeline" id="evalTimeline">
        <li><span class="t-num">01</span><h3>Goals &amp; history</h3><p>Your lifestyle, visual goals, eye history and health background.</p></li>
        <li><span class="t-num">02</span><h3>Refraction &amp; eye exam</h3><p>Your exact prescription and a general eye health check.</p></li>
        <li><span class="t-num">03</span><h3>Cornea &amp; tear film</h3><p>Thickness, shape and surface quality — key LASIK factors.</p></li>
        <li><span class="t-num">04</span><h3>Retinal &amp; ocular checks</h3><p>Additional imaging, only where clinically indicated.</p></li>
        <li><span class="t-num">05</span><h3>Discussion &amp; decision</h3><p>Options, trade-offs, risks and your questions — then you decide.</p></li>
      </ol>
      <figure class="section-photo journey-photo">
         <img src="/assets/images/technology-1.jpg" alt="Retinal and diagnostic equipment used for eye measurements" width="1000" height="667" loading="lazy">
        <figcaption>Diagnostic measurements support a personal plan.</figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- ============ SECTION 6: Meet Dr. Rajat Jain ============ -->
<section class="section section-dark">
  <div class="container split-2">
    <div>
      <p class="eyebrow">Your refractive-surgery specialist</p>
      <h2>Meet <?= e(DOCTOR_NAME) ?></h2>
      <p><?= e(DOCTOR_ROLE) ?>. His refractive practice is built around one principle: the right procedure for the right eye — or no procedure at all, if that's the safer answer.</p>
      <p>Patients describe his consultations as unhurried and direct: what your measurements show, which options fit them, what each involves, and what could go wrong. Decisions are made together, after evaluation, never before it.</p>
      <div class="btn-row">
        <a class="btn btn-light" href="/doctor">View Doctor Profile</a>
        <a class="btn btn-ghost-light" href="/appointment">Request Consultation</a>
      </div>
      <p class="muted-sm">Detailed biography, credentials and publications: <a class="ulink" href="<?= e(DOCTOR_URL) ?>" target="_blank" rel="noopener">drrajatjain.com ↗</a></p>
    </div>
    <figure class="doc-figure">
      <img src="/assets/images/dr-rajat-consult.webp" alt="<?= e(DOCTOR_NAME) ?> consulting a patient" width="520" height="640" loading="lazy">
       <figcaption>Consultation at <?= e(HOSPITAL_NAME) ?> · <?= e(ADDRESS_LINE) ?></figcaption>
    </figure>
  </div>
</section>

<!-- ============ SECTION 7: Compare without confusion ============ -->
<section class="section">
  <div class="container">
    <p class="eyebrow">Comparison studio</p>
    <h2>Compare without confusion</h2>
    <p class="section-lede">The most advanced-sounding option is not automatically the most suitable. Compare on what actually matters:</p>
    <div class="compare-widget card compare-feature" id="compareWidget">
      <img src="/assets/images/lasik-eligibility.jpg" alt="Illustrative eye assessment imagery" width="1600" height="1056" loading="lazy">
      <div class="compare-tabs" role="tablist">
        <button role="tab" aria-selected="true" data-cmp="0">Approach</button>
        <button role="tab" aria-selected="false" data-cmp="1">Candidacy</button>
        <button role="tab" aria-selected="false" data-cmp="2">Recovery</button>
        <button role="tab" aria-selected="false" data-cmp="3">Trade-offs</button>
        <button role="tab" aria-selected="false" data-cmp="4">Ask your surgeon</button>
      </div>
      <div class="compare-body" id="compareBody" aria-live="polite"></div>
      <p class="muted-sm center">No universal winner exists. <a class="ulink" href="/compare">Open the full comparison guide →</a></p>
    </div>
  </div>
</section>

<!-- ============ SECTION 8: Cost explained ============ -->
<section class="section section-alt">
  <div class="container">
    <p class="eyebrow">Transparent by design</p>
    <h2>Cost, explained — not advertised</h2>
    <p class="section-lede">We don't publish prices before they're verified, and we don't believe in bait pricing. Here's honestly what can influence the total:</p>
       <div class="card-grid three">
        <div class="card image-card"><img src="/assets/images/biometry.jpg" alt="Eye measurement equipment used for assessment" width="1000" height="667" loading="lazy"><h3>Assessment</h3><p>Evaluation and diagnostic tests required to decide suitability.</p></div>
        <div class="card image-card"><img src="/assets/images/technology-1.jpg" alt="Diagnostic technology in an eye-care setting" width="1000" height="667" loading="lazy"><h3>Procedure category</h3><p>Standard, customised, surface or lens-based options differ in consumables and technology.</p></div>
        <div class="card image-card"><img src="/assets/images/hospital-interior.jpg" alt="Eye hospital treatment environment" width="1000" height="667" loading="lazy"><h3>One eye or both</h3><p>Total planning changes with single-eye versus both-eye treatment.</p></div>
        <div class="card image-card"><img src="/assets/images/dr-rajat-consult.webp" alt="Doctor discussing treatment planning" width="520" height="640" loading="lazy"><h3>Medication</h3><p>Post-procedure drops and care items during recovery.</p></div>
        <div class="card image-card"><img src="/assets/images/hospital-exterior.webp" alt="Exterior of the eye hospital" width="1000" height="667" loading="lazy"><h3>Follow-up</h3><p>Planned review visits and any enhancement evaluation, if ever needed.</p></div>
        <div class="card cta-card image-card"><img src="/assets/images/hero-pathway.webp" alt="Abstract visual of the patient pathway" width="520" height="360" loading="lazy"><h3>The honest route</h3><p>Get a written estimate after your evaluation — based on your eyes, not a headline.</p><a class="btn btn-primary" href="/appointment">Request Evaluation First</a></div>
    </div>
  </div>
</section>

<!-- ============ SECTION 9: Safety, expectations, recovery ============ -->
<section class="section">
  <div class="container">
    <p class="eyebrow">Balanced information</p>
    <h2>Safety, expectations &amp; recovery</h2>
    <div class="card-grid three">
       <div class="card safety-common image-card"><img src="/assets/images/hero-pathway.webp" alt="Abstract visual pathway illustration" width="520" height="360" loading="lazy"><h3>Common &amp; temporary</h3><ul><li>Dryness or grittiness</li><li>Glare or halos at night</li><li>Fluctuating focus early on</li></ul><p class="muted">Usually improve over weeks — but always report anything worrying.</p></div>
       <div class="card safety-rare image-card"><img src="/assets/images/topography.jpg" alt="Corneal mapping used to assess risk factors" width="1000" height="667" loading="lazy"><h3>Less common — discuss fully</h3><ul><li>Under- or over-correction</li><li>Corneal flap or healing issues</li><li>Infection or inflammation</li></ul><p class="muted">Rare does not mean impossible. Ask about them directly.</p></div>
       <div class="card safety-urgent image-card"><img src="/assets/images/dr-rajat-consult.webp" alt="Eye specialist discussing warning signs and follow-up" width="520" height="640" loading="lazy"><h3>Seek urgent care if…</h3><ul><li>Sudden vision drop</li><li>Severe pain not relieved by advised drops</li><li>Flashes/floaters with a curtain shadow</li></ul><p class="muted">This website is not an emergency service.</p></div>
    </div>
    <div class="btn-row center">
      <a class="btn btn-ghost" href="/risks">Full risks &amp; safety page</a>
      <a class="btn btn-ghost" href="/recovery">Recovery timeline guide</a>
    </div>
  </div>
</section>

<!-- ============ SECTION 10: Stories & FAQs ============ -->
<section class="section section-alt">
  <div class="container">
    <p class="eyebrow">Decision journeys · Educational composites</p>
    <h2>How thoughtful patients decided</h2>
    <p class="section-lede">The journeys below are anonymised educational composites — not testimonials, not outcome guarantees. Verified patient stories appear only after signed consent.</p>
    <div class="card-grid three">
      <article class="card story image-card"><img src="/assets/images/hero-slide-1.jpg" alt="Educational image for a first refractive consultation" width="1600" height="1056" loading="lazy"><h3>"I assumed LASIK was automatic."</h3><p>A 26-year-old designer with borderline corneal thickness learned why PRK was discussed instead — and why that honesty built trust.</p></article>
      <article class="card story image-card"><img src="/assets/images/hero-slide-2.jpg" alt="Educational image for comparing vision-correction options" width="1600" height="1056" loading="lazy"><h3>"High power, thin cornea."</h3><p>An ICL evaluation replaced a laser plan. The lesson: the right alternative is a success, not a rejection.</p></article>
      <article class="card story image-card"><img src="/assets/images/hero-slide-3.jpg" alt="Educational image for recovery planning" width="1600" height="1056" loading="lazy"><h3>"I came in terrified of pain."</h3><p>Understanding numbing drops and the 15-minute reality of the procedure day changed everything for a first-time surgery patient.</p></article>
    </div>
    <h3 class="faq-head">Quick answers</h3>
    <div class="accordion">
      <details><summary>Does LASIK hurt?</summary><p>Numbing drops are used and most patients report pressure rather than pain. Individual experiences vary — discuss comfort measures at consultation.</p></details>
      <details><summary>Am I too old for LASIK?</summary><p>There's no simple age cutoff. Prescription stability, corneal health and lens status matter more than the number itself.</p></details>
      <details><summary>Can my power come back?</summary><p>Enhancements are possible in some cases, but no result is guaranteed permanent. Your surgeon explains your personal risk profile.</p></details>
      <details><summary>How soon can I work?</summary><p>Many return to screens within days, but it varies by procedure and healing. Plan conservatively and follow your surgeon's advice.</p></details>
      <details><summary>Is "bladeless" risk-free?</summary><p>No. Femtosecond lasers change how a flap is made, not whether surgery carries risk. All refractive procedures require informed consent.</p></details>
    </div>
    <p class="center"><a class="ulink" href="/faq">Browse all guides &amp; FAQs →</a></p>
  </div>
</section>

<!-- ============ SECTION 11: Location & appointment planner ============ -->
<section class="section" id="location">
  <div class="container split-2">
    <div>
      <p class="eyebrow">Visit us</p>
      <h2>Location &amp; appointment planner</h2>
      <address class="address-block">
        <strong><?= e(HOSPITAL_NAME) ?></strong><br>
        <?= e(ADDRESS_LINE) ?><br>
        <span class="muted">Exact access details can be confirmed by the team when booking.</span>
      </address>
      <p><a class="btn btn-ghost" href="https://www.google.com/maps/search/?api=1&query=<?= rawurlencode(MAPS_QUERY) ?>" target="_blank" rel="noopener">Open directions ↗</a></p>
      <div class="map-consent card" id="mapConsent">
        <p>Maps load only with your consent.</p>
        <button class="btn btn-sm btn-primary" id="loadMapBtn">Load map</button>
      </div>
    </div>
       <div class="card appt-card location-card">
         <img src="/assets/images/hospital-interior.jpg" alt="Interior view of the eye hospital" width="1000" height="667" loading="lazy">
      <h3>Request an evaluation</h3>
      <p class="muted">Not confirmed until our team responds.</p>
      <form class="appt-form mini" action="/actions/appointment-submit.php" method="post">
        <?= csrf_field() ?>
        <input type="text" name="website" tabindex="-1" autocomplete="off" class="hp" aria-hidden="true">
        <input type="hidden" name="source_url" value="/#location">
        <label>Name *<input name="name" required maxlength="120" autocomplete="name"></label>
        <label>Phone *<input name="phone" type="tel" required autocomplete="tel"></label>
        <label>Preferred contact *<select name="preferred_contact" required><option value="">Select…</option><option>Phone call</option><option>WhatsApp</option><option>Email</option></select></label>
        <input type="hidden" name="consent_privacy" value="1"><input type="hidden" name="consent_non_emergency" value="1">
        <button class="btn btn-primary btn-block" type="submit">Request Evaluation</button>
      </form>
    </div>
  </div>
</section>

<!-- ============ SECTION 12: Final clarity CTA ============ -->
<section class="section final-cta">
  <div class="final-aperture" aria-hidden="true"></div>
  <div class="container center">
    <h2>Your procedure choice should begin with your eyes — not a trend.</h2>
    <p>Evaluation first. Honest comparison. An informed decision.</p>
    <div class="btn-row center">
      <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
      <a class="btn btn-ghost-light" href="<?= e(PHONE_LINK) ?>">Call the Centre</a>
      <a class="btn btn-ghost-light" href="/recovery">Read the Preparation Guide</a>
    </div>
    <p class="final-note">Educational content — not medical advice. Individual recovery and outcomes vary.</p>
  </div>
</section>

<?php page_end(); ?>
