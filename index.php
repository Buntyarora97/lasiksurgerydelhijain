<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('home',
    'LASIK Surgery in Delhi: Start With the Right Evaluation | ' . SITE_NAME,
    'Understand LASIK, compare suitable options and meet refractive-surgery specialist Dr. Rajat Jain in Shalimar Bagh, Delhi. Clear decisions before clearer vision.');
?>

<!-- ============ SECTION 1: Patient education hero ============ -->
<section class="hero" id="hero">
  <div class="container hero-grid">
    <div class="hero-copy">
      <p class="eyebrow reveal">LASIK education · Shalimar Bagh, Delhi</p>
      <h1 class="reveal">Clear answers before <span class="grad">you choose</span></h1>
      <p class="hero-lede reveal">Understand your eye measurements, compare vision-correction options and ask the questions that matter. A clinical examination—not a website—decides whether surgery is suitable.</p>
      <div class="hero-ctas reveal">
        <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
        <a class="btn btn-ghost" href="/procedures">Compare Your Options</a>
      </div>
      <p class="hero-note reveal">No online quiz can confirm suitability. Individual outcomes and recovery vary.</p>
      <div class="hero-proof reveal">
         <span><b>01</b> Understand your eyes</span>
         <span><b>02</b> Compare suitable options</span>
         <span><b>03</b> Decide without pressure</span>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-image-stage" data-hero-carousel aria-roledescription="carousel" aria-label="LASIK education highlights">
        <figure class="hero-image-main hero-slide is-active" data-hero-slide aria-roledescription="slide" aria-label="1 of 5">
          <img src="/assets/images/lasik-hero-consultation.jpg" alt="Illustrative scene of an eye doctor speaking with an adult patient; not a photograph of the centre" width="1600" height="900" fetchpriority="high">
          <figcaption><span class="hero-slide-kicker">START WITH A CONVERSATION</span><strong>Every eye is different</strong><span>Share your goals and health history before discussing treatment.</span><small>Illustrative image</small></figcaption>
        </figure>
        <figure class="hero-image-main hero-slide" data-hero-slide aria-roledescription="slide" aria-label="2 of 5" aria-hidden="true">
          <img src="/assets/images/lasik-hero-eye-exam.jpg" alt="Illustrative routine eye examination with an ophthalmologist; not a photograph of the centre" width="1600" height="900" loading="lazy">
          <figcaption><span class="hero-slide-kicker">CHECK MORE THAN PRESCRIPTION</span><strong>Measurements matter</strong><span>Corneal shape, eye health and tear film help guide the conversation.</span><small>Illustrative image</small></figcaption>
        </figure>
        <figure class="hero-image-main hero-slide" data-hero-slide aria-roledescription="slide" aria-label="3 of 5" aria-hidden="true">
          <img src="/assets/images/lasik-hero-mapping.jpg" alt="Illustrative eye doctor explaining a corneal map; not a diagnostic result or photograph of the centre" width="1600" height="900" loading="lazy">
          <figcaption><span class="hero-slide-kicker">UNDERSTAND YOUR OPTIONS</span><strong>Compare the trade-offs</strong><span>LASIK is one of several approaches—and may not be the right one for you.</span><small>Illustrative image</small></figcaption>
        </figure>
        <figure class="hero-image-main hero-slide" data-hero-slide aria-roledescription="slide" aria-label="4 of 5" aria-hidden="true">
          <img src="/assets/images/lasik-hero-vision-choice.jpg" alt="Illustrative conversation about vision correction and glasses; not a patient testimonial" width="1600" height="900" loading="lazy">
          <figcaption><span class="hero-slide-kicker">MAKE AN INFORMED CHOICE</span><strong>Glasses remain an option</strong><span>Surgery is elective; you can take time, ask questions and decide later.</span><small>Illustrative image</small></figcaption>
        </figure>
        <figure class="hero-image-main hero-slide" data-hero-slide aria-roledescription="slide" aria-label="5 of 5" aria-hidden="true">
          <img src="/assets/images/lasik-hero-questions.jpg" alt="Illustrative doctor and patient reviewing information together; not a photograph of the centre" width="1600" height="900" loading="lazy">
          <figcaption><span class="hero-slide-kicker">ASK EVERY QUESTION</span><strong>Understand recovery and risk</strong><span>Know the plan, alternatives and follow-up before you consent.</span><small>Illustrative image</small></figcaption>
        </figure>
        <div class="hero-carousel-controls">
          <button type="button" class="hero-carousel-arrow" data-hero-prev aria-label="Previous highlight">‹</button>
          <div class="hero-slide-dots" data-hero-dots role="group" aria-label="Choose a highlight">
            <button type="button" aria-label="Show slide 1: Start with a conversation" aria-pressed="true" data-slide-to="0"></button>
            <button type="button" aria-label="Show slide 2: Measurements matter" aria-pressed="false" data-slide-to="1"></button>
            <button type="button" aria-label="Show slide 3: Compare the trade-offs" aria-pressed="false" data-slide-to="2"></button>
            <button type="button" aria-label="Show slide 4: Make an informed choice" aria-pressed="false" data-slide-to="3"></button>
            <button type="button" aria-label="Show slide 5: Ask every question" aria-pressed="false" data-slide-to="4"></button>
          </div>
          <button type="button" class="hero-carousel-arrow" data-hero-next aria-label="Next highlight">›</button>
          <button type="button" class="hero-carousel-toggle" data-hero-toggle aria-label="Pause automatic slides" aria-pressed="false">Pause</button>
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
          <img src="/assets/images/lasik-hero-eye-exam.jpg" alt="Illustrative eye examination; not a photograph of Jain Eye Hospital" width="1600" height="900" loading="lazy">
          <figcaption>Illustrative image. Suitability is decided by clinical measurements, not a quiz.</figcaption>
       </figure>
    </div>
  </div>
</section>

<!-- ============ SECTION 4: Vision-correction pathways ============ -->
<section class="section section-alt" id="services">
  <div class="container">
     <p class="eyebrow">Educational overview</p>
     <h2>Vision-correction pathways</h2>
     <p class="section-lede">These cards explain commonly discussed options; they are not a list of confirmed services. Availability and suitability at the centre must be confirmed directly after clinical evaluation.</p>
     <div class="services-slider" data-services-slider>
       <button class="slider-arrow slider-prev" type="button" data-service-prev aria-label="Previous services">‹</button>
       <div class="services-viewport">
         <div class="services-track">
      <article class="card proc-card image-card">
        <img src="/assets/images/lasik-hero-vision-choice.jpg" alt="Illustrative patient discussion about vision correction, not a surgical scene" width="1600" height="900" loading="lazy">
         <h3>LASIK / Femto LASIK <span class="tag-edu">Education</span></h3>
         <p>A corneal flap is created and the underlying tissue is reshaped with an excimer laser. The exact technique depends on the platform and the surgeon's plan.</p>
        <p class="muted">May suit: stable prescription, adequate corneal thickness.</p>
        <p class="muted">Limitation: flap-related considerations; not ideal for very thin corneas.</p>
        <a class="card-link" href="/procedures">Learn responsibly →</a>
      </article>
      <article class="card proc-card image-card">
         <img src="/assets/images/lasik-hero-mapping.jpg" alt="Illustrative discussion of eye measurements; no real diagnostic result shown" width="1600" height="900" loading="lazy">
         <h3>Customised / Topography-guided <span class="tag-edu">Education</span></h3>
        <p>Treatment profiles designed from detailed corneal mapping, aiming to address subtle optical irregularities beyond a standard prescription.</p>
        <p class="muted">May suit: higher astigmatism or irregular corneal optics.</p>
        <p class="muted">Limitation: advanced-sounding is not automatically better — fit matters.</p>
        <a class="card-link" href="/compare">Compare approaches →</a>
      </article>
      <article class="card proc-card edu image-card">
          <img src="/assets/images/lasik-hero-eye-exam.jpg" alt="Illustrative eye examination scene; not a depiction of a SMILE or SILK procedure" width="1600" height="900" loading="lazy">
        <h3>SMILE / SILK <span class="tag-edu">Education only</span></h3>
        <p>Flapless small-incision lenticule extraction. Availability at this centre requires confirmation — this page explains the concept honestly.</p>
        <p class="muted">May suit: certain prescriptions where flapless is preferred.</p>
        <a class="card-link" href="/compare">Read the comparison →</a>
      </article>
      <article class="card proc-card image-card">
          <img src="/assets/images/lasik-hero-consultation.jpg" alt="Illustrative consultation about refractive surgery; not a surgical scene" width="1600" height="900" loading="lazy">
         <h3>PRK / TransPRK <span class="tag-edu">Education</span></h3>
        <p>No-flap surface ablation — the laser reshapes the cornea directly. Often discussed when corneal thickness is limited.</p>
        <p class="muted">May suit: thinner corneas, certain contact sports.</p>
        <p class="muted">Limitation: slower early visual recovery than LASIK.</p>
        <a class="card-link" href="/procedures">Learn responsibly →</a>
      </article>
      <article class="card proc-card image-card">
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
          <img src="/assets/images/lasik-hero-mapping.jpg" alt="Illustrative conversation about corneal measurements; not a diagnostic scan from the centre" width="1600" height="900" loading="lazy">
          <figcaption>Illustrative image; the tests needed depend on each person's examination.</figcaption>
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
       <p><?= e(DOCTOR_ROLE) ?>. This guide follows one principle: match any treatment to the individual eye — or do not operate if that is the safer answer.</p>
       <p>A careful consultation should explain what your measurements show, which options may fit, what each involves, and the risks and alternatives. Decisions follow evaluation, not the other way around.</p>
      <div class="btn-row">
        <a class="btn btn-light" href="/doctor">View Doctor Profile</a>
        <a class="btn btn-ghost-light" href="/appointment">Request Consultation</a>
      </div>
      <p class="muted-sm">Detailed biography, credentials and publications: <a class="ulink" href="<?= e(DOCTOR_URL) ?>" target="_blank" rel="noopener">drrajatjain.com ↗</a></p>
    </div>
    <figure class="doc-figure">
      <img src="/assets/images/dr-rajat-jain-approved.jpg" alt="Portrait of <?= e(DOCTOR_NAME) ?>" width="1200" height="1200" loading="lazy">
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
          <img src="/assets/images/lasik-hero-eye-exam.jpg" alt="Illustrative eye examination scene" width="1600" height="900" loading="lazy">
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
        <article class="card cost-factor"><span class="cost-step">01 · BEFORE TREATMENT</span><h3>Assessment</h3><p>The clinical evaluation and diagnostic tests needed to decide whether treatment is appropriate.</p></article>
        <article class="card cost-factor"><span class="cost-step">02 · PROCEDURE</span><h3>Procedure category</h3><p>Laser, surface and lens-based options differ in the technology, consumables and care involved.</p></article>
        <article class="card cost-factor"><span class="cost-step">03 · TREATMENT PLAN</span><h3>One eye or both</h3><p>Ask whether the written estimate covers one eye or both, and which procedure is included.</p></article>
        <article class="card cost-factor"><span class="cost-step">04 · AFTERCARE</span><h3>Medication</h3><p>Confirm which prescribed drops and recovery supplies are included in the estimate.</p></article>
        <article class="card cost-factor"><span class="cost-step">05 · FOLLOW-UP</span><h3>Review visits</h3><p>Ask how many follow-ups are planned, when they happen and whether they are included.</p></article>
        <article class="card cta-card cost-factor"><span class="cost-step">06 · YOUR CHOICE</span><h3>The honest route</h3><p>Get a written estimate after evaluation—based on your eyes, not a headline.</p><a class="btn btn-primary" href="/appointment">Request Evaluation First</a></article>
    </div>
  </div>
</section>

<!-- ============ SECTION 9: Safety, expectations, recovery ============ -->
<section class="section">
  <div class="container">
    <p class="eyebrow">Balanced information</p>
    <h2>Safety, expectations &amp; recovery</h2>
    <div class="card-grid three">
       <div class="card safety-common"><h3>Common &amp; temporary</h3><ul><li>Dryness or grittiness</li><li>Glare or halos at night</li><li>Fluctuating focus early on</li></ul><p class="muted">Experiences differ. Report symptoms that concern you to your care team.</p></div>
       <div class="card safety-rare"><h3>Less common — discuss fully</h3><ul><li>Under- or over-correction</li><li>Corneal flap or healing issues</li><li>Infection or inflammation</li></ul><p class="muted">Rare does not mean impossible. Ask about risks that apply to your eyes.</p></div>
       <div class="card safety-urgent"><h3>Seek urgent care if…</h3><ul><li>Sudden vision drop</li><li>Severe pain not relieved by advised drops</li><li>Flashes/floaters with a curtain shadow</li></ul><p class="muted">This website is not an emergency service.</p></div>
    </div>
    <div class="btn-row center">
      <a class="btn btn-ghost" href="/risks">Full risks &amp; safety page</a>
      <a class="btn btn-ghost" href="/recovery">Recovery timeline guide</a>
    </div>
  </div>
</section>

<!-- ============ SECTION 10: Questions to take to consultation ============ -->
<section class="section section-alt">
  <div class="container">
    <p class="eyebrow">Useful questions</p>
    <h2>What to ask before you decide</h2>
    <p class="section-lede">There are no testimonials or guaranteed outcomes here. Use these questions to understand your own measurements, options and next steps.</p>
    <div class="card-grid three">
      <article class="card image-card"><img src="/assets/images/lasik-hero-mapping.jpg" alt="Illustrative doctor explaining eye measurements to a patient" width="1600" height="900" loading="lazy"><h3>What do my measurements show?</h3><p>Ask how prescription stability, corneal shape and thickness, tear film and eye health affect suitability.</p></article>
      <article class="card image-card"><img src="/assets/images/lasik-hero-vision-choice.jpg" alt="Illustrative patient discussing vision-correction options" width="1600" height="900" loading="lazy"><h3>What are the alternatives?</h3><p>Ask which procedures may fit, how they differ, what their risks are, and whether glasses remain the better choice.</p></article>
      <article class="card image-card"><img src="/assets/images/dr-rajat-jain-approved.jpg" alt="Portrait of <?= e(DOCTOR_NAME) ?>" width="1200" height="1200" loading="lazy"><h3>What happens after I decide?</h3><p>Clarify the written estimate, preparation, follow-up schedule, recovery advice and who to contact with concerns.</p></article>
    </div>
    <h3 class="faq-head">Quick answers</h3>
    <div class="accordion">
      <details><summary>Does LASIK hurt?</summary><p>Numbing drops are used and most patients report pressure rather than pain. Individual experiences vary — discuss comfort measures at consultation.</p></details>
      <details><summary>Am I too old for LASIK?</summary><p>There's no simple age cutoff. Prescription stability, corneal health and lens status matter more than the number itself.</p></details>
      <details><summary>Can my power come back?</summary><p>Enhancements are possible in some cases, but no result is guaranteed permanent. Your surgeon explains your personal risk profile.</p></details>
      <details><summary>How soon can I work?</summary><p>Many return to screens within days, but it varies by procedure and healing. Plan conservatively and follow your surgeon's advice.</p></details>
      <details><summary>Is "bladeless" risk-free?</summary><p>No. Femtosecond lasers change how a flap is made, not whether surgery carries risk. All refractive procedures require informed consent.</p></details>
    </div>
    <p class="center"><a class="ulink" href="/guides">Browse all LASIK education guides →</a></p>
  </div>
</section>

<!-- ============ SECTION 11: LASIK education library ============ -->
<section class="section guide-featured" id="lasik-guides">
  <div class="container">
    <div class="section-heading-row">
      <div>
        <p class="eyebrow">Patient education library</p>
        <h2>Start with the question on your mind</h2>
        <p class="section-lede">Clear, practical explainers on candidacy, procedures, recovery and cost—written to help you prepare for a real clinical conversation.</p>
      </div>
      <a class="btn btn-ghost" href="/guides">See all 20 guides</a>
    </div>
    <div class="card-grid three guide-card-grid">
      <article class="card guide-teaser"><span class="guide-number">01 · SUITABILITY</span><h3>Am I a good candidate for LASIK?</h3><p>Learn why age, prescription stability, corneal measurements, dry eye and overall health all matter.</p><a class="card-link" href="/guides/lasik-eligibility">Read the candidacy guide →</a></article>
      <article class="card guide-teaser"><span class="guide-number">02 · COMPARISONS</span><h3>LASIK vs SMILE: what is different?</h3><p>Compare the way each procedure is performed, recovery considerations and questions to ask.</p><a class="card-link" href="/guides/lasik-vs-smile">Read the comparison →</a></article>
      <article class="card guide-teaser"><span class="guide-number">03 · PLANNING</span><h3>LASIK cost in Delhi: what to ask</h3><p>Understand the parts of a written estimate without relying on unverified headline prices.</p><a class="card-link" href="/guides/lasik-cost-delhi">Read the cost guide →</a></article>
      <article class="card guide-teaser"><span class="guide-number">04 · RECOVERY</span><h3>LASIK recovery, day by day</h3><p>Plan for follow-up, prescribed drops, time away from work and normal variation in healing.</p><a class="card-link" href="/guides/lasik-recovery">Read the recovery guide →</a></article>
      <article class="card guide-teaser"><span class="guide-number">05 · SAFETY</span><h3>LASIK risks and side effects</h3><p>Understand common temporary symptoms, less common complications and informed consent.</p><a class="card-link" href="/guides/lasik-risks-side-effects">Read the safety guide →</a></article>
      <article class="card guide-teaser guide-teaser-cta"><span class="guide-number">20 TOPIC-SPECIFIC GUIDES</span><h3>Get the full picture</h3><p>Explore the complete library, including pregnancy, dry eye, astigmatism and alternatives.</p><a class="btn btn-light" href="/guides">Open the guide library</a></article>
    </div>
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
         <img src="/assets/images/lasik-hero-questions.jpg" alt="Illustrative doctor and patient reviewing questions; not a photograph of the centre" width="1600" height="900" loading="lazy">
      <h3>Request an evaluation</h3>
      <p class="muted">Not confirmed until our team responds.</p>
       <?php $homeFormError = flash('form_error'); if ($homeFormError): ?><div class="form-error" role="alert"><?= e($homeFormError) ?></div><?php endif; ?>
      <form class="appt-form mini" action="/actions/appointment-submit.php" method="post">
        <?= csrf_field() ?>
        <input type="text" name="website" tabindex="-1" autocomplete="off" class="hp" aria-hidden="true">
         <input type="hidden" name="ts" value="<?= time() ?>">
        <input type="hidden" name="source_url" value="/#location">
        <label>Name *<input name="name" required maxlength="120" autocomplete="name"></label>
        <label>Phone *<input name="phone" type="tel" required autocomplete="tel"></label>
         <label>Age range *<select name="age_range" required><option value="">Select…</option><option>18–24</option><option>25–34</option><option>35–44</option><option>45–54</option><option>55+</option></select></label>
         <label>Currently using *<select name="vision_correction" required><option value="">Select…</option><option>Spectacles</option><option>Contact lenses</option><option>Both</option><option>Neither</option></select></label>
         <label>Preferred contact *<select name="preferred_contact" required><option value="Phone call">Phone call</option></select></label>
         <label class="check"><input type="checkbox" name="consent_privacy" required value="1"><span>I agree to the <a href="/privacy" target="_blank">privacy policy</a> and consent to being contacted. *</span></label>
         <label class="check"><input type="checkbox" name="consent_non_emergency" required value="1"><span>I understand this form is not for emergencies. *</span></label>
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
