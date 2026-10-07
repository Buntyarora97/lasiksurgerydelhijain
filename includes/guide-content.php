<?php
declare(strict_types=1);

/* Long-form patient education is kept separate from the page renderer so each
 * topic can be reviewed and updated without changing routing or site chrome. */
return array_merge(
    require __DIR__ . '/guide-content-1.php',
    require __DIR__ . '/guide-content-2.php',
    require __DIR__ . '/guide-content-3.php',
    require __DIR__ . '/guide-content-4.php',
    require __DIR__ . '/guide-content-5.php'
);
