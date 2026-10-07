<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
$guides = require __DIR__ . '/includes/guide-content.php';
$guideCount = count($guides);
$slug = strtolower(trim((string)($_GET['slug'] ?? '')));
$requestedSlug = preg_match('/^[a-z0-9-]+$/', $slug) ? $slug : '';

if ($requestedSlug !== '' && !isset($guides[$requestedSlug])) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return;
}

$groups = [
    'Understand LASIK' => 'Understand the procedure',
    'Candidacy & evaluation' => 'Candidacy and evaluation',
    'Compare procedures' => 'Compare procedures',
    'Recovery & safety' => 'Recovery and safety',
    'Cost & planning' => 'Cost and planning',
    'Special situations' => 'Special situations',
    'Prescription & life stages' => 'Prescription and life stages',
    'Common LASIK questions' => 'Common LASIK questions',
];

if ($requestedSlug === '') {
    $canonical = SITE_URL . '/guides';
    $items = [];
    $position = 1;
    foreach ($guides as $guideSlug => $guide) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => $guide['h1'],
            'url' => SITE_URL . '/guides/' . $guideSlug,
        ];
    }
    page_start(
        'guides',
        'LASIK Patient Education Guides: ' . $guideCount . ' Practical Topics | Jain Eye',
        'Explore ' . $guideCount . ' practical guides to LASIK candidacy, eye tests, procedure comparisons, cost, recovery, risks and common patient questions.',
        [['LASIK Education Guides', '/guides']],
        [
            'keywords' => 'LASIK guides, LASIK questions, LASIK eligibility, LASIK recovery, refractive surgery education Delhi',
            'canonical' => $canonical,
            'og_image' => SITE_URL . '/assets/images/lasik-hero-questions.jpg',
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => 'LASIK Patient Education Guides',
                'description' => 'A collection of patient education guides about LASIK and refractive surgery.',
                'url' => $canonical,
                'inLanguage' => 'en-IN',
                'mainEntity' => [
                    '@type' => 'ItemList',
                    'itemListElement' => $items,
                ],
            ],
        ]
    );
    ?>
    <section class="section guide-hub">
      <div class="container">
        <p class="eyebrow">Patient education library · Delhi</p>
        <h1>LASIK questions, answered clearly</h1>
        <p class="section-lede">Explore practical, topic-specific guides before a consultation. They explain common terms and questions; only an eye examination can determine whether a procedure is suitable for you.</p>
        <div class="guide-search">
          <label for="guideSearch">Find a topic</label>
          <input id="guideSearch" type="search" placeholder="Try “recovery”, “dry eye” or “cost”" data-guide-search>
        <p class="muted-sm" data-guide-count aria-live="polite"><?= $guideCount ?> guides</p>
        </div>
        <?php foreach ($groups as $groupKey => $groupTitle): ?>
          <?php $groupGuides = array_filter($guides, static fn(array $g): bool => $g['group'] === $groupKey); ?>
          <?php if (!$groupGuides) continue; ?>
          <section class="guide-group" aria-labelledby="group-<?= e(strtolower(str_replace(' ', '-', $groupKey))) ?>">
            <div class="guide-group-heading">
              <p class="eyebrow"><?= e($groupKey) ?></p>
              <h2 id="group-<?= e(strtolower(str_replace(' ', '-', $groupKey))) ?>"><?= e($groupTitle) ?></h2>
            </div>
            <div class="card-grid three guide-catalog">
              <?php foreach ($groupGuides as $guideSlug => $guide): ?>
                <article class="card guide-teaser guide-catalog-card" data-guide-card data-search="<?= e(strtolower($guide['h1'] . ' ' . $guide['description'] . ' ' . $guide['group'])) ?>">
                  <span class="guide-number"><?= e($groupKey) ?></span>
                  <h3><a href="/guides/<?= e($guideSlug) ?>"><?= e($guide['h1']) ?></a></h3>
                  <p><?= e($guide['description']) ?></p>
                  <a class="card-link" href="/guides/<?= e($guideSlug) ?>">Read this guide →</a>
                </article>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endforeach; ?>
        <p class="guide-no-results" data-guide-empty hidden>No guides match that search. Try a broader phrase or browse the full list.</p>
        <aside class="medical-note card">
          <strong>Medical information notice</strong>
          <p>These pages provide general education, not a diagnosis or personalised treatment advice. Procedure availability, suitability, costs and individual risks must be confirmed directly with a qualified clinician.</p>
        </aside>
        <div class="guide-hub-cta">
          <h2>Have questions about your own eyes?</h2>
          <p>Request an evaluation and bring the topics you want to discuss. A request is not confirmed until the centre responds.</p>
          <a class="btn btn-primary" href="/appointment">Request an evaluation</a>
        </div>
      </div>
    </section>
    <?php
    page_end();
    return;
}

$guide = $guides[$requestedSlug];
$canonical = SITE_URL . '/guides/' . $requestedSlug;
$wordCount = str_word_count(strip_tags($guide['intro'] . ' ' . implode(' ', array_map(
    static fn(array $section): string => implode(' ', $section['paragraphs'] ?? []) . ' ' . implode(' ', $section['points'] ?? []),
    $guide['sections']
)) . ' ' . implode(' ', array_map(static fn(array $faq): string => $faq['q'] . ' ' . $faq['a'], $guide['faqs']))));
$readMinutes = max(1, (int)ceil($wordCount / 220));
$sectionIds = [];
foreach ($guide['sections'] as $section) {
    $sectionIds[] = trim((string)preg_replace('/[^a-z0-9]+/i', '-', strtolower($section['heading'])), '-');
}
$relatedGuides = array_filter($guide['related'], static fn(string $relatedSlug): bool => isset($guides[$relatedSlug]));
$articleSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $guide['h1'],
    'description' => $guide['description'],
    'inLanguage' => 'en-IN',
    'articleSection' => $guide['group'],
    'wordCount' => $wordCount,
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $canonical],
    'url' => $canonical,
    'image' => SITE_URL . '/assets/images/' . $guide['image'],
    'publisher' => ['@type' => 'Organization', 'name' => HOSPITAL_NAME, 'url' => HOSPITAL_URL],
];
page_start(
    'guide',
    $guide['title'],
    $guide['description'],
    [['LASIK Education Guides', '/guides'], [$guide['h1'], '/guides/' . $requestedSlug]],
    [
        'keywords' => $guide['keywords'],
        'canonical' => $canonical,
        'og_image' => SITE_URL . '/assets/images/' . $guide['image'],
        'og_type' => 'article',
        'schema' => $articleSchema,
    ]
);
?>
<section class="section guide-article-wrap">
  <div class="container">
    <header class="guide-article-heading">
      <p class="eyebrow"><?= e($guide['group']) ?> · Patient education</p>
      <h1><?= e($guide['h1']) ?></h1>
      <p class="guide-standfirst"><?= e($guide['intro']) ?></p>
      <p class="guide-byline">General educational information <span aria-hidden="true">·</span> <?= $readMinutes ?> min read</p>
    </header>
    <figure class="guide-feature">
      <img src="/assets/images/<?= e($guide['image']) ?>" alt="<?= e($guide['image_alt']) ?>" width="1600" height="900" fetchpriority="high">
      <figcaption>Illustrative image created for patient education; not a photograph of a patient, treatment outcome or specific facility.</figcaption>
    </figure>
    <div class="guide-article-layout">
      <article class="guide-article">
        <?php foreach ($guide['sections'] as $i => $section): ?>
          <section class="guide-content-section" id="<?= e($sectionIds[$i]) ?>">
            <h2><?= e($section['heading']) ?></h2>
            <?php foreach (($section['paragraphs'] ?? []) as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?>
            <?php if (!empty($section['points'])): ?>
              <ul class="guide-checklist"><?php foreach ($section['points'] as $point): ?><li><?= e($point) ?></li><?php endforeach; ?></ul>
            <?php endif; ?>
          </section>
        <?php endforeach; ?>
        <section class="guide-content-section guide-faqs" aria-labelledby="guide-faq-title">
          <h2 id="guide-faq-title">Common questions</h2>
          <?php foreach ($guide['faqs'] as $faq): ?>
            <details><summary><?= e($faq['q']) ?></summary><p><?= e($faq['a']) ?></p></details>
          <?php endforeach; ?>
        </section>
        <aside class="medical-note card">
          <strong>Important</strong>
          <p>This page is for general education and is not medical advice. Your treating clinician’s instructions take priority. For severe pain, sudden loss of vision, significant eye injury or other urgent symptoms, seek urgent eye care; this website is not an emergency service.</p>
        </aside>
        <section class="article-references" aria-labelledby="references-title">
          <h2 id="references-title">Further reading</h2>
          <p>Public patient information used as a starting point for this overview:</p>
          <ul><?php foreach ($guide['sources'] as $source): ?>
            <li><a href="<?= e($source['url']) ?>" target="_blank" rel="noopener noreferrer"><?= e($source['label']) ?> ↗</a></li>
          <?php endforeach; ?></ul>
          <p class="muted-sm">External references may describe a different country’s device approvals or care pathway. Confirm local requirements and advice with your clinician.</p>
        </section>
      </article>
      <aside class="guide-toc" aria-label="On this page">
        <strong>On this page</strong>
        <nav><ul><?php foreach ($guide['sections'] as $i => $section): ?>
          <li><a href="#<?= e($sectionIds[$i]) ?>"><?= e($section['heading']) ?></a></li>
        <?php endforeach; ?><li><a href="#guide-faq-title">Common questions</a></li></ul></nav>
        <a class="btn btn-primary btn-block" href="/appointment">Request evaluation</a>
      </aside>
    </div>
    <?php if ($relatedGuides): ?>
      <section class="related-guides" aria-labelledby="related-title">
        <div class="section-heading-row">
          <div><p class="eyebrow">Continue learning</p><h2 id="related-title">Related LASIK guides</h2></div>
          <a class="ulink" href="/guides">Browse all patient education topics →</a>
        </div>
        <div class="card-grid three"><?php foreach ($relatedGuides as $relatedSlug): $related = $guides[$relatedSlug]; ?>
          <article class="card guide-teaser">
            <span class="guide-number"><?= e($related['group']) ?></span>
            <h3><a href="/guides/<?= e($relatedSlug) ?>"><?= e($related['h1']) ?></a></h3>
            <p><?= e($related['description']) ?></p>
            <a class="card-link" href="/guides/<?= e($relatedSlug) ?>">Read this guide →</a>
          </article>
        <?php endforeach; ?></div>
      </section>
    <?php endif; ?>
  </div>
</section>
<?php page_end(); ?>
