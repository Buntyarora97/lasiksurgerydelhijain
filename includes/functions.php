<?php
declare(strict_types=1);
require_once __DIR__ . '/db.php';

function e(?string $s): string { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function site_url(string $path = ''): string { return SITE_URL . $path; }

function client_photo_src(string $filename): string {
    if ($filename === '' || basename($filename) !== $filename) {
        throw new InvalidArgumentException('Photo filename must be a single file name.');
    }
    if (!is_file(__DIR__ . '/../new-images all/' . $filename)) {
        throw new RuntimeException('Client-supplied photo not found: ' . $filename);
    }
    return '/new-images%20all/' . rawurlencode($filename);
}

function client_photo_url(string $filename): string {
    return SITE_URL . client_photo_src($filename);
}

/* ---------- CSRF ---------- */
function csrf_token(): string {
    if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(32)); }
    return $_SESSION['csrf'];
}
function csrf_field(): string { return '<input type="hidden" name="csrf" value="' . e(csrf_token()) . '">'; }
function csrf_verify(): void {
    if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
        http_response_code(419); exit('Session expired. Please go back and try again.');
    }
}

/* ---------- Settings (cached per request) ---------- */
function setting(string $key, string $default = ''): string {
    static $cache = null;
    if ($cache === null) {
        $cache = [];
        try { foreach (db()->query('SELECT `key`,`value` FROM settings') as $r) { $cache[$r['key']] = $r['value']; } }
        catch (Throwable $e) { $cache = []; }
    }
    return $cache[$key] ?? $default;
}

/* ---------- SEO meta for a page ---------- */
function page_meta(string $pageKey): array {
    static $map = null;
    if ($map === null) {
        $map = [];
        try { foreach (db()->query('SELECT page_key,title,meta_description,canonical FROM seo_meta') as $r) { $map[$r['page_key']] = $r; } }
        catch (Throwable $e) { $map = []; }
    }
    return $map[$pageKey] ?? [];
}

function page_seo_defaults(string $pageKey): array {
    static $map = [
        'home' => [
            'title' => 'LASIK in Delhi: Evaluation & Options | Jain Eye',
            'description' => 'Learn how LASIK evaluation works, compare refractive-surgery options and request a consultation in Shalimar Bagh, Delhi. Suitability requires an eye examination.',
            'keywords' => 'LASIK in Delhi, LASIK evaluation Delhi, refractive surgery Delhi, Jain Eye Hospital Shalimar Bagh',
            'og_image' => 'hospital pic (2).png',
        ],
        'evaluation' => [
            'title' => 'LASIK Evaluation in Delhi: Tests & Suitability | Jain Eye',
            'description' => 'Understand the eye examination, corneal measurements and health checks used to discuss LASIK suitability. An online guide cannot replace a clinical evaluation.',
            'keywords' => 'LASIK evaluation Delhi, LASIK eye tests, refractive surgery consultation Delhi, corneal mapping',
            'og_image' => 'hospital pic (17).png',
        ],
        'procedures' => [
            'title' => 'LASIK, PRK & ICL Procedures Explained | Jain Eye',
            'description' => 'Compare how LASIK, PRK, SMILE and ICL work, their trade-offs and why suitability varies. Educational information; confirm procedure availability directly.',
            'keywords' => 'LASIK procedures Delhi, PRK, TransPRK, SMILE, SILK, ICL, refractive surgery options',
            'og_image' => 'Ophthalmic Microsurgery in a Clinical Theatre.png',
        ],
        'compare' => [
            'title' => 'Compare LASIK, PRK, SMILE & ICL | Jain Eye',
            'description' => 'Compare refractive-surgery approaches, recovery and trade-offs. The right option depends on eye measurements and an individual clinical assessment.',
            'keywords' => 'compare LASIK and PRK, LASIK vs SMILE, ICL comparison, refractive surgery options Delhi',
            'og_image' => 'Precision Ophthalmic Surgery in Theatre.png',
        ],
        'cost' => [
            'title' => 'LASIK Cost in Delhi: What Affects the Price | Jain Eye',
            'description' => 'See what can affect a LASIK estimate in Delhi, including assessment, procedure type, treatment plan, medication and follow-up. Request a written estimate after evaluation.',
            'keywords' => 'LASIK cost Delhi, LASIK price factors, refractive surgery estimate, LASIK consultation Delhi',
            'og_image' => 'hospital pic (6).png',
        ],
        'recovery' => [
            'title' => 'LASIK Recovery & Aftercare Guide | Jain Eye',
            'description' => 'A general guide to recovery after refractive surgery, follow-up and warning signs. Your treating surgeon’s instructions for your own case take priority.',
            'keywords' => 'LASIK recovery, LASIK aftercare, recovery timeline after LASIK, eye surgery follow-up',
            'og_image' => 'neha mohan (4).png',
        ],
        'risks' => [
            'title' => 'LASIK Risks & Safety: What to Consider | Jain Eye',
            'description' => 'Review common experiences, less common complications and questions to discuss before refractive surgery. No procedure is risk-free; individual risks vary.',
            'keywords' => 'LASIK risks, refractive surgery safety, LASIK complications, eye surgery informed consent',
            'og_image' => 'Surgeon Using an Operating Microscope.png',
        ],
        'faq' => [
            'title' => 'LASIK FAQs: Eligibility, Recovery & Cost | Jain Eye',
            'description' => 'Answers to common questions about LASIK eligibility, evaluation, recovery, cost and alternatives. Only a clinical examination can assess suitability.',
            'keywords' => 'LASIK FAQs, LASIK eligibility, LASIK recovery questions, LASIK cost Delhi',
            'og_image' => 'hospital pic (15).png',
        ],
        'doctor' => [
            'title' => 'Dr. Rajat Jain | Refractive Surgery in Delhi',
            'description' => 'Profile and consultation information for Dr. Rajat Jain at Jain Eye Hospital & Laser Centre in Shalimar Bagh, Delhi.',
            'keywords' => 'Dr Rajat Jain Delhi, cornea specialist Delhi, refractive surgery consultation',
            'og_image' => 'rajat jain (3).png',
        ],
        'hospital' => [
            'title' => 'Jain Eye Hospital, Shalimar Bagh | Centre Information',
            'description' => 'Find location and contact information for Jain Eye Hospital & Laser Centre, AG 152, Shalimar Bagh, Delhi 110088.',
            'keywords' => 'Jain Eye Hospital Delhi, eye hospital Shalimar Bagh, eye care Delhi contact',
            'og_image' => 'hospital pic (2).png',
        ],
        'about' => [
            'title' => 'About This LASIK Education Platform | Jain Eye',
            'description' => 'Learn about this refractive-surgery education platform, its association with Jain Eye Hospital & Laser Centre and its patient-first approach.',
            'keywords' => 'LASIK education Delhi, Jain Eye Hospital, refractive surgery patient information',
            'og_image' => 'neha mohan.png',
        ],
        'appointment' => [
            'title' => 'Request a LASIK Evaluation in Delhi | Jain Eye',
            'description' => 'Request a refractive-surgery evaluation at Jain Eye Hospital & Laser Centre, Shalimar Bagh, Delhi. Your appointment is not confirmed until the team responds.',
            'keywords' => 'book LASIK evaluation Delhi, refractive surgery appointment, Jain Eye Hospital appointment',
            'og_image' => 'hospital pic (14).png',
        ],
        'contact' => [
            'title' => 'Contact Jain Eye Hospital in Delhi | Jain Eye',
            'description' => 'Contact Jain Eye Hospital & Laser Centre in Shalimar Bagh, Delhi, by phone or email, or find directions to the centre.',
            'keywords' => 'Jain Eye Hospital contact, eye hospital phone Delhi, Shalimar Bagh eye clinic address',
            'og_image' => 'hospital pic (13).png',
        ],
        'accessibility' => [
            'title' => 'Accessibility Statement | Jain Eye',
            'description' => 'Read the accessibility statement for the Jain Eye LASIK education website and how to report an access barrier.',
            'keywords' => 'website accessibility, accessibility statement, Jain Eye website',
            'og_image' => 'hospital pic (15).png',
        ],
        'privacy' => [
            'title' => 'Privacy Policy | Jain Eye',
            'description' => 'Learn how this website handles information submitted through its appointment enquiry form and other interactions.',
            'keywords' => 'Jain Eye privacy policy, appointment enquiry privacy, website data policy',
            'og_image' => 'hospital pic (15).png',
        ],
        'terms' => [
            'title' => 'Terms of Use | Jain Eye',
            'description' => 'Terms for using the Jain Eye LASIK education website, its general information and appointment enquiry form.',
            'keywords' => 'Jain Eye terms of use, website terms, medical information website terms',
            'og_image' => 'hospital pic (14).png',
        ],
        'disclaimer' => [
            'title' => 'Medical Disclaimer | Jain Eye',
            'description' => 'Important information about the limits of this website’s general eye-health content and when to seek individual clinical advice.',
            'keywords' => 'medical disclaimer, LASIK information disclaimer, eye health education',
            'og_image' => 'hospital pic (14).png',
        ],
        '404' => [
            'title' => 'Page Not Found | Jain Eye',
            'description' => 'The requested page could not be found. Browse the LASIK education guides or return to the home page.',
            'keywords' => '',
            'og_image' => 'hospital pic (14).png',
        ],
        '500' => [
            'title' => 'Temporary Error | Jain Eye',
            'description' => 'A temporary error occurred. Please try again or return to the home page.',
            'keywords' => '',
            'og_image' => 'hospital pic (14).png',
        ],
    ];
    return $map[$pageKey] ?? [];
}

/* ---------- Headers / page chrome ---------- */
function page_start(string $pageKey, string $title, string $desc, array $crumbs = [], array $metaOverrides = []): void {
    $storedMeta = page_meta($pageKey);
    $defaults = page_seo_defaults($pageKey);
    $finalTitle = !empty($storedMeta['title']) ? $storedMeta['title'] : ($defaults['title'] ?? $title);
    $finalDesc = !empty($storedMeta['meta_description']) ? $storedMeta['meta_description'] : ($defaults['description'] ?? $desc);
    $canonicalPaths = [
        'home' => '/',
        'evaluation' => '/lasik-evaluation',
        'disclaimer' => '/medical-disclaimer',
    ];
    $canonicalPath = $canonicalPaths[$pageKey] ?? '/' . trim($pageKey, '/');
    $canonical = in_array($pageKey, ['404', '500'], true)
        ? ''
        : (($storedMeta['canonical'] ?? '') ?: site_url($canonicalPath));
    $ogPath = client_photo_url($defaults['og_image'] ?? 'hospital pic (14).png');
    $GLOBALS['PAGE_KEY'] = $pageKey;
    $GLOBALS['CRUMBS'] = $crumbs;
    $GLOBALS['PAGE_META'] = array_merge([
        'title' => $finalTitle,
        'description' => $finalDesc,
        'keywords' => $defaults['keywords'] ?? '',
        'canonical' => $canonical,
        'og_image' => $ogPath,
        'og_type' => 'website',
        'noindex' => SITE_ENV !== 'production' || in_array($pageKey, ['404', '500'], true),
    ], $metaOverrides);
    require __DIR__ . '/header.php';
}
function page_end(): void { require __DIR__ . '/footer.php'; }

function breadcrumbs(): string {
    $html = '<nav class="breadcrumbs" aria-label="Breadcrumb"><ol>';
    $html .= '<li><a href="/">Home</a></li>';
    foreach (($GLOBALS['CRUMBS'] ?? []) as $i => $c) {
        $last = $i === count($GLOBALS['CRUMBS']) - 1;
        $html .= $last ? '<li aria-current="page">' . e($c[0]) . '</li>'
                       : '<li><a href="' . e($c[1]) . '">' . e($c[0]) . '</a></li>';
    }
    return $html . '</ol></nav>';
}

function breadcrumb_schema(array $crumbs): string {
    $items = [['name' => 'Home', 'url' => SITE_URL . '/']];
    foreach ($crumbs as $c) { $items[] = ['name' => $c[0], 'url' => site_url($c[1])]; }
    $list = [];
    foreach ($items as $i => $it) {
        $list[] = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $it['name'], 'item' => $it['url']];
    }
    return '<script type="application/ld+json">' . json_encode(
        ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $list],
        JSON_UNESCAPED_SLASHES) . '</script>';
}

/* ---------- Simple rate limit (DB-backed) ---------- */
function rate_limit(string $bucket, int $max = 5, int $windowSec = 3600): bool {
    try {
        $pdo = db();
        $pdo->prepare('DELETE FROM form_rate_limits WHERE created_at < (NOW() - INTERVAL ? SECOND)')->execute([$windowSec]);
        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        $n = $pdo->prepare('SELECT COUNT(*) c FROM form_rate_limits WHERE bucket=? AND ip=?');
        $n->execute([$bucket, $ip]);
        if ((int)$n->fetch()['c'] >= $max) { return false; }
        $pdo->prepare('INSERT INTO form_rate_limits (bucket, ip, created_at) VALUES (?,?,NOW())')->execute([$bucket, $ip]);
        return true;
    } catch (Throwable $e) { return true; }
}

function flash(string $key, ?string $msg = null): ?string {
    if ($msg !== null) { $_SESSION['flash'][$key] = $msg; return null; }
    $m = $_SESSION['flash'][$key] ?? null; unset($_SESSION['flash'][$key]); return $m;
}
