<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
header('Content-Type: application/xml; charset=utf-8');

$static = ['', 'about', 'lasik-evaluation', 'procedures', 'compare', 'cost', 'recovery',
           'risks', 'faq', 'doctor', 'hospital', 'appointment', 'contact',
           'privacy', 'terms', 'medical-disclaimer', 'accessibility', 'guides'];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($static as $p) {
    echo '  <url><loc>' . SITE_URL . '/' . $p . '</loc><changefreq>weekly</changefreq><priority>' . ($p === '' ? '1.0' : '0.7') . '</priority></url>' . "\n";
}
$guides = require __DIR__ . '/includes/guide-content.php';
foreach ($guides as $slug => $guide) {
    echo '  <url><loc>' . SITE_URL . '/guides/' . rawurlencode($slug) . '</loc><changefreq>monthly</changefreq><priority>0.7</priority></url>' . "\n";
}
try {
    require_once __DIR__ . '/includes/db.php';
    foreach (db()->query("SELECT slug, updated_at FROM procedures WHERE status='verified_offered'") as $r) {
        echo '  <url><loc>' . SITE_URL . '/procedure/' . $r['slug'] . '</loc><lastmod>' . date('Y-m-d', strtotime($r['updated_at'])) . '</lastmod><priority>0.8</priority></url>' . "\n";
    }
} catch (Throwable $e) { /* DB not ready — static sitemap still valid */ }
echo '</urlset>';
