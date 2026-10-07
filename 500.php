<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
http_response_code(500);
page_start('500', 'Something went wrong — ' . SITE_NAME, 'A temporary error occurred.', [['500','']]);
?>
<section class="section center" style="padding-top:5rem">
  <h1 style="margin-inline:auto">Something went out of focus.</h1>
  <p style="margin:1rem auto 2rem">A temporary server error occurred. Please try again, or call us directly.</p>
  <a class="btn btn-primary" href="/">Back to Home</a>
</section>
<?php page_end(); ?>
