<?php
declare(strict_types=1);
require_once __DIR__ . '/db.php';

function e(?string $s): string { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function site_url(string $path = ''): string { return SITE_URL . $path; }

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
        try { foreach (db()->query('SELECT page_key,title,meta_description,canonical,og_image FROM seo_meta') as $r) { $map[$r['page_key']] = $r; } }
        catch (Throwable $e) { $map = []; }
    }
    return $map[$pageKey] ?? [];
}

/* ---------- Headers / page chrome ---------- */
function page_start(string $pageKey, string $title, string $desc, array $crumbs = []): void {
    $meta = page_meta($pageKey);
    $finalTitle = $meta['title'] ?? $title;
    $finalDesc  = $meta['meta_description'] ?? $desc;
    $canonical  = ($meta['canonical'] ?? '') ?: site_url(str_replace('.php','',basename($_SERVER['SCRIPT_NAME'])));
    $GLOBALS['PAGE_KEY'] = $pageKey;
    $GLOBALS['CRUMBS'] = $crumbs;
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
