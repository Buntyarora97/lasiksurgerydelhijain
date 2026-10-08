<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
$faqs = [];
try { $faqs = db()->query("SELECT * FROM faqs WHERE page_key IN ('general','home') AND is_published=1 ORDER BY sort_order")->fetchAll(); }
catch (Throwable $e) { $faqs = []; }
page_start('faq','LASIK FAQs — Eligibility, Pain, Recovery, Cost & More | ' . SITE_NAME,
 'Honest answers to the most common LASIK questions: eligibility, age, pain, recovery, permanence, cost and alternatives.',
 [['Guides & FAQs','/faq']]);
?>
<section class="section">
  <div class="container faq-container">
    <div class="faq-intro-grid">
      <div>
        <p class="eyebrow">Guides &amp; FAQs</p>
        <h1>Frequently asked questions</h1>
        <p class="section-lede">Straight answers, no sales language. If your question isn't here, ask it at your consultation — that's what consultations are for.</p>
      </div>
      <figure class="faq-feature">
        <img src="<?= e(client_photo_src('rajat jain (5).png')) ?>" alt="Ophthalmologist examining a patient with diagnostic equipment" loading="lazy">
        <figcaption>Tests are selected for your eyes; an online guide cannot confirm suitability.</figcaption>
      </figure>
    </div>

    <div class="accordion">
      <details><summary>Am I eligible for LASIK?</summary><p>Only a clinical evaluation can answer that. Suitability depends on prescription stability, corneal thickness and shape, tear film, ocular health and general health — never on an online quiz.</p></details>
      <details><summary>Is there an age limit?</summary><p>You should be at least 18, but there's no simple upper cutoff. Prescription stability, corneal health and the natural lens's condition matter more than the number.</p></details>
      <details><summary>Does LASIK hurt?</summary><p>Numbing drops are used. Most people describe pressure or mild discomfort rather than pain, especially with flap-based procedures. Individual experiences vary — discuss comfort measures at consultation.</p></details>
      <details><summary>Is the result permanent?</summary><p>Corneal reshaping is permanent, but eyes change with age — presbyopia and cataract still occur naturally. Enhancements are sometimes possible. No outcome is guaranteed.</p></details>
      <details><summary>What if my corneas are thin?</summary><p>Surface procedures like PRK/TransPRK or lens-based options like ICL may be discussed instead. "Not LASIK" is not the same as "no options".</p></details>
      <details><summary>Can I have LASIK while pregnant or breastfeeding?</summary><p>Elective vision correction is generally deferred during pregnancy and breastfeeding because hormonal changes can alter prescriptions and healing. Your surgeon will advise on timing.</p></details>
      <details><summary>How much does LASIK cost in Delhi?</summary><p>It depends on your evaluation: procedure category, technology, one or both eyes, medication and follow-up all matter. We provide written estimates after evaluation rather than advertising headline prices.</p></details>
      <details><summary>What are the alternatives if LASIK isn't suitable?</summary><p>PRK/TransPRK, phakic IOL/ICL, or simply continuing with glasses or contact lenses with better-fitting lenses. A responsible evaluation explains every path, including the non-surgical one.</p></details>
      <details><summary>Should I stop wearing contact lenses before an evaluation?</summary><p>You may be asked to stop them for a period before some measurements because contact lenses can affect corneal shape. The timing depends on the lens type and your eyes; ask the clinic for instructions before your appointment.</p></details>
      <details><summary>Do I have to decide on surgery the same day?</summary><p>No. An evaluation and a request for information do not commit you to treatment. Ask for the findings, alternatives, risks and written estimate, then take time to decide.</p></details>
      <details><summary>Can LASIK prevent age-related reading changes?</summary><p>Standard LASIK does not stop the natural age-related change in near focusing (presbyopia). Any strategy intended to reduce dependence on reading glasses has trade-offs that should be discussed individually.</p></details>
      <details><summary>What should I bring to an evaluation?</summary><p>Bring your current glasses or contact-lens details, any recent prescription, relevant eye or medical history, and a list of medicines. Do not send medical records through this website.</p></details>
      <details><summary>Does an online form confirm that I am eligible?</summary><p>No. Only an in-person clinical examination and the tests selected by the treating clinician can assess suitability.</p></details>
      <?php foreach ($faqs as $f): ?>
      <details><summary><?= e($f['question']) ?></summary><p><?= e($f['answer']) ?></p></details>
      <?php endforeach; ?>
    </div>

    <div class="btn-row" style="margin-top:2.2rem">
      <a class="btn btn-primary" href="/appointment">Book LASIK Evaluation</a>
      <a class="btn btn-ghost" href="/compare">Compare Options</a>
    </div>
  </div>
</section>
<?php page_end(); ?>
