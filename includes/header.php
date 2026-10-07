<?php
declare(strict_types=1);
if (!defined('SITE_NAME')) { require_once __DIR__ . '/config.php'; require_once __DIR__ . '/functions.php'; }
$pageKey  = $GLOBALS['PAGE_KEY'] ?? 'home';
$crumbs   = $GLOBALS['CRUMBS'] ?? [];
$meta     = page_meta($pageKey);
$title    = $meta['title'] ?? SITE_NAME;
$desc     = $meta['meta_description'] ?? 'Focused LASIK & refractive patient education in Delhi.';
$canonical= ($meta['canonical'] ?? '') ?: site_url(preg_replace('/\.php$/', '', '/' . basename($_SERVER['SCRIPT_NAME'])));
$noindex  = (SITE_ENV !== 'production');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($desc) ?>">
<?php if ($noindex): ?><meta name="robots" content="noindex,nofollow"><?php endif; ?>
<link rel="canonical" href="<?= e($canonical) ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta property="og:title" content="<?= e($title) ?>">
<meta property="og:description" content="<?= e($desc) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:image" content="<?= e($meta['og_image'] ?? SITE_URL . '/assets/images/og-default.jpg') ?>">
<meta name="twitter:card" content="summary_large_image">
<link rel="icon" href="/assets/images/favicon.svg" type="image/svg+xml">
<link rel="preload" href="/assets/css/style.css" as="style">
<link rel="stylesheet" href="/assets/css/style.css">
<?= breadcrumb_schema($crumbs) ?>
<script type="application/ld+json"><?= json_encode([
  '@context' => 'https://schema.org', '@type' => 'MedicalWebPage',
  'name' => $title, 'description' => $desc, 'url' => $canonical,
  'lastReviewed' => date('Y-m-d'),
  'reviewedBy' => ['@type' => 'Person', 'name' => DOCTOR_NAME, 'jobTitle' => DOCTOR_ROLE],
  'about' => ['@type' => 'MedicalProcedure', 'name' => 'LASIK', 'bodyLocation' => 'Eye'],
  'medicalSpecialty' => 'Ophthalmology'
], JSON_UNESCAPED_SLASHES) ?></script>
</head>
<body>
<a class="skip-link" href="#main">Skip to main content</a>

<!-- Utility bar -->
<div class="utility-bar">
  <div class="container utility-inner">
    <span class="u-item u-loc">📍 Shalimar Bagh, Delhi</span>
    <span class="u-item u-assoc"><?= e(ASSOCIATION_LINE) ?></span>
    <span class="u-item u-contact">
      <a href="<?= e(PHONE_LINK) ?>"><?= e(PHONE_DISPLAY) ?></a>
      <span class="u-sep">·</span>
      <a href="mailto:<?= e(EMAIL_MAIN) ?>"><?= e(EMAIL_MAIN) ?></a>
    </span>
  </div>
</div>

<!-- Header -->
<header class="site-header" id="siteHeader">
  <div class="container header-inner">
    <a href="/" class="brand" aria-label="Jain Eye Hospital & Laser Centre — home">
      <span class="brand-logo"><img src="/assets/images/jain-eye-hospital-logo.webp" alt="Jain Eye Hospital & Laser Centre" width="256" height="64"></span>
    </a>
    <nav class="main-nav" aria-label="Primary">
      <ul>
        <li><a href="/" <?= $pageKey==='home'?'aria-current="page"':'' ?>>Home</a></li>
        <li class="has-mega">
          <a href="/lasik-evaluation" <?= $pageKey==='evaluation'?'aria-current="page"':'' ?> aria-haspopup="true" aria-expanded="false">Start Here <span class="nav-caret" aria-hidden="true">⌄</span></a>
          <div class="mega" role="menu" aria-label="Start here">
            <div class="mega-grid">
              <div class="mega-col">
                <h3>Understand your options</h3>
                <a href="/lasik-evaluation">LASIK Evaluation</a>
                <a href="/procedures">Procedures Overview</a>
                <a href="/compare">Compare Options</a>
              </div>
              <div class="mega-col">
                <h3>Decide responsibly</h3>
                <a href="/cost">Cost &amp; Planning</a>
                <a href="/risks">Risks &amp; Safety</a>
                <a href="/recovery">Recovery &amp; Aftercare</a>
              </div>
              <div class="mega-preview" aria-hidden="false">
                <img src="/assets/images/mega-evaluation.webp" alt="" width="520" height="360" loading="lazy">
                <p><strong>Every journey starts with an evaluation.</strong><br>No online quiz can confirm suitability — a detailed eye examination comes first.</p>
                <a class="btn btn-sm btn-ghost" href="/lasik-evaluation">Learn responsibly</a>
              </div>
            </div>
          </div>
        </li>
        <li class="has-mega">
          <a href="/procedures" <?= $pageKey==='procedures'?'aria-current="page"':'' ?> aria-haspopup="true" aria-expanded="false">Procedures <span class="nav-caret" aria-hidden="true">⌄</span></a>
          <div class="mega mega-wide" role="menu" aria-label="Procedures">
            <div class="mega-grid mega-4">
              <div class="mega-col" data-preview="lasik">
                <h3>Laser-based</h3>
                <a href="/procedures" data-img="/assets/images/mega-lasik.webp" data-title="LASIK & Femto LASIK" data-desc="Flap-based laser vision correction — the most widely performed refractive procedure worldwide." data-time="6 min read" data-link="/procedures">LASIK / Femto LASIK</a>
                <a href="/procedures" data-img="/assets/images/mega-custom.webp" data-title="Customised / Topography-guided" data-desc="Personalised ablation profiles designed from detailed corneal mapping." data-time="7 min read" data-link="/procedures">Customised / Topography-guided</a>
                <a href="/procedures" data-img="/assets/images/mega-smile.webp" data-title="SMILE / SILK" data-desc="Flapless small-incision lenticule procedures. Availability subject to confirmation." data-time="6 min read" data-link="/procedures">SMILE / SILK <span class="tag-edu">education</span></a>
              </div>
              <div class="mega-col" data-preview="surface">
                <h3>Surface procedures</h3>
                <a href="/procedures" data-img="/assets/images/mega-prk.webp" data-title="PRK / TransPRK" data-desc="No-flap surface ablation — often considered when corneal thickness is limited." data-time="6 min read" data-link="/procedures">PRK / TransPRK</a>
              </div>
              <div class="mega-col" data-preview="lens">
                <h3>Lens-based</h3>
                <a href="/procedures" data-img="/assets/images/mega-icl.webp" data-title="Phakic IOL / ICL" data-desc="An implantable lens for powers that may be beyond safe laser correction." data-time="7 min read" data-link="/procedures">Phakic IOL / ICL</a>
              </div>
              <div class="mega-col" data-preview="eval">
                <h3>Before you choose</h3>
                <a href="/lasik-evaluation" data-img="/assets/images/mega-evaluation.webp" data-title="The Evaluation" data-desc="Refraction, corneal mapping, tear film and retinal checks as indicated — suitability first." data-time="5 min read" data-link="/lasik-evaluation">Suitability &amp; Evaluation</a>
                <a href="/recovery" data-img="/assets/images/mega-recovery.webp" data-title="Recovery & Safety" data-desc="What to expect in the first hours, days and weeks — in calm, honest language." data-time="6 min read" data-link="/recovery">Recovery &amp; Safety</a>
              </div>
              <div class="mega-preview">
                <img id="megaImg" src="/assets/images/mega-lasik.webp" alt="" width="520" height="360">
                <div class="mega-preview-text">
                  <strong id="megaTitle">LASIK & Femto LASIK</strong>
                  <p id="megaDesc">Flap-based laser vision correction — the most widely performed refractive procedure worldwide.</p>
                  <span class="mega-time" id="megaTime">6 min read</span>
                  <a class="btn btn-sm btn-ghost" id="megaLink" href="/procedures">Learn responsibly</a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li><a href="/compare" <?= $pageKey==='compare'?'aria-current="page"':'' ?>>Compare</a></li>
        <li><a href="/cost" <?= $pageKey==='cost'?'aria-current="page"':'' ?>>Cost</a></li>
        <li><a href="/doctor" <?= $pageKey==='doctor'?'aria-current="page"':'' ?>>Dr. Rajat Jain</a></li>
        <li><a href="/faq" <?= $pageKey==='faq'?'aria-current="page"':'' ?>>Guides &amp; FAQs</a></li>
        <li><a href="/hospital" <?= $pageKey==='hospital'?'aria-current="page"':'' ?>>About the Centre</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="btn btn-primary btn-sm" href="/appointment">Book LASIK Evaluation</a>
      <button class="nav-toggle" id="navToggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobileDrawer">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<!-- Mobile drawer -->
<div class="drawer" id="mobileDrawer" aria-hidden="true">
  <div class="drawer-panel" role="dialog" aria-modal="true" aria-label="Menu">
    <div class="drawer-head">
      <strong>Menu</strong>
      <button class="drawer-close" id="drawerClose" aria-label="Close menu">✕</button>
    </div>
    <nav aria-label="Mobile">
      <a href="/">Home</a>
      <a href="/lasik-evaluation">Start Here · Evaluation</a>
      <a href="/procedures">Procedures</a>
      <a href="/compare">Compare Options</a>
      <a href="/cost">Cost &amp; Planning</a>
      <a href="/doctor">Dr. Rajat Jain</a>
      <a href="/recovery">Recovery &amp; Aftercare</a>
      <a href="/risks">Risks &amp; Safety</a>
      <a href="/faq">Guides &amp; FAQs</a>
      <a href="/hospital">About the Centre</a>
      <a href="/contact">Contact</a>
    </nav>
    <a class="btn btn-primary btn-block" href="/appointment">Book LASIK Evaluation</a>
  </div>
</div>

<main id="main">
<?= breadcrumbs() ?>
