<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('compare','Compare LASIK, PRK, SMILE & ICL — Without the Hype | ' . SITE_NAME,
 'Balanced comparisons of refractive surgery options: approach, candidacy, recovery, trade-offs and questions to ask your surgeon.',
 [['Compare Options','/compare']]);
?>
<section class="section">
  <div class="container">
    <p class="eyebrow">Comparison studio</p>
    <h1>Compare options without confusion</h1>
    <p class="section-lede">The most advanced-sounding option is not automatically the most suitable. Here's a balanced comparison across what actually matters. No winner badges — because the right answer depends on your eyes.</p>

    <div class="table-wrap" style="margin-top:2rem">
      <table class="admin-table" style="font-size:.95rem">
        <thead><tr><th>Criterion</th><th>LASIK / Femto</th><th>PRK / TransPRK</th><th>SMILE / SILK*</th><th>ICL</th></tr></thead>
        <tbody>
          <tr><th scope="row">Approach</th><td>Flap created; tissue reshaped beneath</td><td>No flap; surface reshaped directly</td><td>Lenticule removed via small incision</td><td>Lens implanted inside the eye</td></tr>
          <tr><th scope="row">Typical recovery</th><td>Often days</td><td>Days–weeks</td><td>Generally quick</td><td>Usually quick</td></tr>
          <tr><th scope="row">Corneal thickness demand</th><td>Moderate–high</td><td>Lower</td><td>Moderate</td><td>None on cornea</td></tr>
          <tr><th scope="row">Key trade-off</th><td>Flap considerations; dry eye</td><td>Early discomfort; slower stabilization</td><td>Limited enhancement options</td><td>Intraocular risks; lifelong monitoring</td></tr>
          <tr><th scope="row">Often considered for</th><td>Stable, moderate prescriptions</td><td>Thinner corneas, contact sports</td><td>Specific prescription ranges</td><td>Very high powers, thin corneas</td></tr>
        </tbody>
      </table>
    </div>
    <p class="muted-sm">*SMILE/SILK availability at this centre requires confirmation; shown for education only.</p>

    <div class="card-grid three" style="margin-top:2.5rem">
      <div class="card"><h3>Why comparisons mislead</h3><p>Marketing compares brochure features. Eyes compare measurements. A table like this is a starting vocabulary for your consultation — not a decision tool.</p></div>
      <div class="card"><h3>The honest pattern</h3><p>Most patients are suitable for more than one option. The final choice usually turns on corneal measurements, lifestyle and how you weigh recovery time against other factors.</p></div>
      <div class="card"><h3>Questions that matter</h3><p>"Which options do my measurements actually allow? What is my personal risk profile? What happens if I need an enhancement?" Ask these, not "which is the latest?"</p></div>
    </div>

    <div class="btn-row center" style="justify-content:center;margin-top:2.5rem">
      <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
      <a class="btn btn-ghost" href="/risks">Read Risks &amp; Safety</a>
    </div>
  </div>
</section>
<?php page_end(); ?>
