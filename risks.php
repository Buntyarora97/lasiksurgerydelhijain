<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('risks','LASIK Risks & Safety — Balanced, Honest Information | ' . SITE_NAME,
 'A calm, balanced explanation of LASIK and refractive surgery risks: common temporary experiences, less common complications, and how safety is managed.',
 [['Risks & Safety','/risks']]);
?>
<section class="section">
  <div class="container" style="max-width:820px">
    <p class="eyebrow">Balanced information</p>
    <h1>Risks &amp; safety, without the sugar-coating</h1>
    <p class="section-lede">Refractive surgery is safe for well-selected patients — but "safe" has never meant "risk-free". This page explains the full picture so you can give genuinely informed consent.</p>
    <figure class="guide-feature">
      <img src="/assets/images/clinic-theatre.jpg" alt="Illustrative ophthalmic operating theatre, not a specific refractive-surgery procedure" width="1600" height="900" loading="eager">
      <figcaption>Illustrative theatre photograph only. Every procedure has distinct risks to discuss with a clinician.</figcaption>
    </figure>

    <h2>Common, usually temporary experiences</h2>
    <ul style="margin:0 0 1.5rem 1.3rem;line-height:1.9">
      <li>Dry eye symptoms — often improving over weeks to months</li>
      <li>Glare, halos or starbursts around lights at night</li>
      <li>Fluctuating vision during early healing</li>
      <li>Mild discomfort or a gritty sensation for a few days</li>
    </ul>

    <h2>Less common risks worth discussing</h2>
    <ul style="margin:0 0 1.5rem 1.3rem;line-height:1.9">
      <li>Under- or over-correction, sometimes addressable with an enhancement</li>
      <li>Corneal flap complications (flap procedures) or haze (surface procedures)</li>
      <li>Infection or inflammation — rare but serious; this is why follow-up matters</li>
      <li>Ectasia — progressive corneal weakening, minimized by strict candidacy screening</li>
    </ul>

    <h2>How risk is managed</h2>
    <p>Risk is controlled long before the laser switches on: detailed candidacy screening rules out unsuitable corneas, sterile technique and careful post-operative care reduce infection risk, and structured follow-up catches problems early. Choosing an experienced refractive surgeon and being honest about your history are parts of safety too.</p>

    <h2>The honest bottom line</h2>
    <p>For most well-selected patients, modern refractive surgery has a high satisfaction profile. But you deserve to hear the residual risks clearly, in person, with your own measurements on the table — not buried in fine print. That conversation is a standard part of every evaluation at our centre.</p>

    <div class="card safety-urgent" style="margin-top:2rem">
      <strong>Urgent symptoms after any eye procedure:</strong> sudden vision loss, severe pain, trauma, or flashes/floaters with a curtain-like shadow — seek emergency eye care immediately.
    </div>
    <div class="btn-row" style="margin-top:2rem">
      <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
      <a class="btn btn-ghost" href="/faq">Read FAQs</a>
    </div>
  </div>
</section>
<?php page_end(); ?>
