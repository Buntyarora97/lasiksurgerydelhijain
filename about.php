<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('about','About This Platform — ' . SITE_NAME,
 'Why a focused LASIK education platform exists, how it relates to Jain Eye Hospital & Laser Centre, and the care philosophy behind it.',
 [['About This Platform','/about']]);
?>
<section class="section">
  <div class="container" style="max-width:820px">

    <h1 style="margin-bottom:.4em">About this platform</h1>
    <p class="section-lede">Eight honest answers about who we are, why this site exists and how we handle your trust.</p>
    <figure class="editorial-banner">
      <img src="/assets/images/dr-rajat-jain.jpg" alt="<?= e(DOCTOR_NAME) ?>" width="900" height="1048" loading="eager">
      <figcaption><?= e(DOCTOR_NAME) ?> · Refractive-surgery consultation</figcaption>
    </figure>

    <h2>1 · Why this focused website exists</h2>
    <p>Searching for LASIK in Delhi returns a flood of price ads, ranking claims and pressure tactics. This website was created to be the opposite: a calm, focused resource that helps you understand refractive vision correction before you commit to anything. It covers candidacy, evaluation, procedure differences, recovery, risks and cost factors — the questions thoughtful patients actually ask.</p>

    <h2>2 · Relationship with Jain Eye Hospital &amp; Laser Centre</h2>
    <p><?= e(ASSOCIATION_LINE) ?> The centre is at <?= e(ADDRESS_LINE) ?>. We state this association openly on every page. Procedure availability should be confirmed directly after evaluation. For wider services and current facility information, visit <a href="<?= e(HOSPITAL_URL) ?>" target="_blank" rel="noopener noreferrer">jaineye.com</a>.</p>

    <h2>3 · Care philosophy: suitability before selling</h2>
    <p>Refractive surgery is elective. The correct outcome of an evaluation is sometimes "not now," "not this procedure," or occasionally "not surgery at all." We consider that a successful consultation. Any centre that treats every visitor as a candidate is not doing its job — corneal thickness, tear film, prescription stability and ocular health all draw boundaries that marketing cannot.</p>

    <h2>4 · Dr. Rajat Jain's refractive role</h2>
    <p>The principal refractive-surgery expert associated with this platform is <?= e(DOCTOR_NAME) ?>, <?= e(DOCTOR_ROLE) ?>. His detailed professional biography, credentials and academic work live on <a href="<?= e(DOCTOR_URL) ?>" target="_blank" rel="noopener">drrajatjain.com</a>. This site intentionally focuses on patient decision-making rather than recreating his full profile.</p>

    <h2>5 · The evaluation and informed-consent standard</h2>
    <p>Every pathway here begins with measurement, not marketing. Refraction, corneal mapping and ocular-health checks — as clinically indicated — come before any recommendation. Surgery proceeds only after a documented informed-consent discussion covering benefits, limitations, alternatives and risks, in language you actually understand.</p>

    <h2>6 · Technology philosophy</h2>
    <p>Platforms assist; clinical judgment decides. We describe technology only when its availability is verified, and we refuse the industry's habit of treating every new platform name as automatically superior. The best technology is the one that fits your measurements — sometimes the simpler option is the safer one.</p>

    <h2>7 · Patient safety, privacy and accessibility</h2>
    <p>This site asks only for details needed to respond to an enquiry and does not publish enquiry details. How information is handled is explained in the <a href="/privacy">privacy policy</a>. We aim to make the pages usable with assistive technology and on mobile devices.</p>

    <h2>8 · What to expect before, during and after a consultation</h2>
    <p>Before: you'll be asked about goals, history and current correction. During: measurements, honest discussion of options and time for your questions. After: a written plan, clear preparation guidance and scheduled follow-up. At no point are you obligated to proceed — the consultation itself is the product.</p>

    <div class="btn-row" style="margin-top:2.5rem">
      <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
      <a class="btn btn-ghost" href="/hospital">About the Centre</a>
    </div>
  </div>
</section>
<?php page_end(); ?>
