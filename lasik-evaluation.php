<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('evaluation','LASIK Evaluation in Delhi — What Actually Gets Checked | ' . SITE_NAME,
 'What a proper refractive-surgery evaluation involves: refraction, corneal thickness and mapping, tear film, retinal checks and the surgeon discussion.',
 [['Start Here','/lasik-evaluation']]);
?>
<section class="section">
  <div class="container" style="max-width:820px">
    <p class="eyebrow">Start here</p>
    <h1>LASIK Evaluation: what actually gets checked</h1>
    <p class="section-lede">LASIK reshapes the cornea with a laser to correct refractive errors such as myopia, hyperopia and astigmatism. But it is only safe for eyes that meet specific measurements — which is why a detailed evaluation, not an online quiz, always comes first.</p>
    <figure class="wide-feature">
      <img src="/assets/images/clinic-equipment.jpg" alt="Ophthalmic diagnostic equipment in a clinical room" width="1600" height="900" loading="eager">
      <figcaption>Measurements support the conversation; they do not replace clinical judgement.</figcaption>
    </figure>

    <h2>Why evaluation before everything</h2>
    <p>Two people with the same spectacle prescription can have completely different surgical suitability. Corneal thickness and shape, tear-film quality, pupil size, retinal health and prescription stability all influence which procedure — if any — is appropriate. The evaluation exists to protect you from a procedure your eyes aren't suited to.</p>

    <h2>The five stages</h2>
    <ol class="timeline" style="grid-template-columns:1fr">
      <li><span class="t-num">01</span><h3>Goals &amp; history</h3><p>Your visual goals, occupation, sports, eye history, general health and medications. Be honest — this shapes safer decisions.</p></li>
      <li><span class="t-num">02</span><h3>Refraction &amp; general eye exam</h3><p>Precise measurement of your power, and a check of overall eye health.</p></li>
      <li><span class="t-num">03</span><h3>Cornea &amp; tear film</h3><p>Thickness, curvature and surface mapping — the measurements that most often decide between LASIK, surface procedures or lens-based options.</p></li>
      <li><span class="t-num">04</span><h3>Retinal &amp; additional checks</h3><p>Further imaging where indicated, particularly for higher prescriptions.</p></li>
      <li><span class="t-num">05</span><h3>Surgeon discussion &amp; decision</h3><p>Your options, the honest trade-offs, and your questions. You decide — with full information.</p></li>
    </ol>

    <h2>Contact lenses before your evaluation</h2>
    <p>Contact lenses temporarily reshape the cornea's surface. Your surgeon will tell you how long to stop wearing them before measurements — the exact period varies by lens type and individual healing, so follow the guidance you're given rather than generic advice.</p>

    <h2>After the evaluation</h2>
    <p>You'll leave with a clear answer: suitable and for which procedure, suitable with conditions, or unsuitable — with the alternatives explained. Any estimate of cost is provided in writing, based on your actual plan, never from a headline price.</p>

    <div class="card medical-note" style="margin-top:2rem">
      <strong>Educational information</strong>
      <p class="muted-sm">This guide is for general education and is not a substitute for an examination or advice from your treating clinician.</p>
    </div>
    <div class="btn-row" style="margin-top:2rem">
      <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
      <a class="btn btn-ghost" href="/compare">Compare Options</a>
    </div>
  </div>
</section>
<?php page_end(); ?>
