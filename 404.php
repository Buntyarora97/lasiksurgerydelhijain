<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
http_response_code(404);
page_start('404', 'Page not found (404) — ' . SITE_NAME, 'The page you requested could not be found.', [['404','']]);
?>
<section class="section center" style="padding-top:5rem">
  <p class="eyebrow">Error 404</p>
  <h1 style="margin-inline:auto">This page drifted out of focus.</h1>
  <p style="margin:1rem auto 2rem">The link may be old or mistyped. Let's get you back to clear ground.</p>
  <div class="btn-row center" style="justify-content:center">
    <a class="btn btn-primary" href="/">Back to Home</a>
    <a class="btn btn-ghost" href="/procedures">Explore Procedures</a>
  </div>
</section>
<?php page_end(); ?>
