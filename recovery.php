<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('recovery','LASIK Recovery Timeline & Aftercare Guide | ' . SITE_NAME,
 'What to expect after LASIK and other refractive procedures: first 24 hours, first week, returning to work, screens, driving, exercise and warning signs.',
 [['Recovery & Aftercare','/recovery']]);
?>
<section class="section">
  <div class="container" style="max-width:820px">
    <p class="eyebrow">Patient guide</p>
    <h1>Recovery &amp; aftercare: the realistic timeline</h1>
    <p class="section-lede">Recovery varies by procedure and by person. The timeline below is general education — your surgeon's instructions for your specific case always take priority.</p>

    <ol class="timeline" style="grid-template-columns:1fr">
      <li><span class="t-num">01</span><h3>First 24 hours</h3><p>Rest your eyes. Vision is often noticeably clearer quickly, but fluctuation is normal. Use prescribed drops, avoid rubbing, and arrange your ride home — don't drive yourself.</p></li>
      <li><span class="t-num">02</span><h3>First week</h3><p>Many people return to desk work within 2–3 days, but build in breaks. Common temporary experiences: dryness, grittiness, light sensitivity and halos at night. Wear any protective shield as advised, and keep soap, water and dust away from the eyes.</p></li>
      <li><span class="t-num">03</span><h3>Weeks 2–4</h3><p>Gradual return to exercise; avoid swimming and eye-impact sports until cleared. Makeup around the eyes stays off until your surgeon says otherwise. Driving at night may feel uncomfortable early on — wait until you're confident.</p></li>
      <li><span class="t-num">04</span><h3>Ongoing</h3><p>Attend every scheduled follow-up, even if vision feels perfect. Artificial tears may be recommended for dryness. Small refractive changes can still settle for weeks to months.</p></li>
    </ol>

    <h2>Everyday questions</h2>
    <div class="accordion">
      <details><summary>When can I use screens again?</summary><p>Often within a day or two, in short sessions with the 20-20-20 habit. Follow your personal plan — recovery speed differs.</p></details>
      <details><summary>When can I drive?</summary><p>Only when your vision meets the legal standard and your surgeon clears you. Night driving may take longer to feel comfortable.</p></details>
      <details><summary>What about travel?</summary><p>Short trips are usually fine early; long flights and dusty or dry environments deserve a conversation with your surgeon first.</p></details>
      <details><summary>Is dryness normal?</summary><p>Yes — it's one of the most common temporary experiences. Persistent or worsening dryness should be reported at follow-up.</p></details>
    </div>

    <div class="card safety-urgent" style="margin-top:2rem">
      <strong>Seek urgent eye care if you notice:</strong> sudden vision drop, severe pain not relieved by your advised drops, increasing redness, or flashes/floaters with a curtain-like shadow. This website is not an emergency service.
    </div>
    <div class="btn-row" style="margin-top:2rem">
      <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
      <a class="btn btn-ghost" href="/risks">Risks &amp; Safety</a>
    </div>
  </div>
</section>
<?php page_end(); ?>
