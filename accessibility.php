<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('accessibility','Accessibility Statement — ' . SITE_NAME,
 'Our commitment to WCAG 2.2 AA accessibility and how to report issues.',
 [['Accessibility','/accessibility']]);
?>
<section class="section"><div class="container" style="max-width:820px">
  <p class="eyebrow">Our commitment</p><h1>Accessibility Statement</h1>
  <p class="section-lede">We want every visitor — regardless of ability, device or connection — to be able to research their vision options with dignity.</p>
  <h2>What we do</h2>
  <ul style="margin:0 0 1.5rem 1.3rem;line-height:1.9">
    <li>Semantic HTML with landmarks, headings in order and descriptive labels</li>
    <li>Keyboard-accessible navigation, menus, modals, tabs and accordions</li>
    <li>Visible focus indicators and 44×44px minimum touch targets</li>
    <li>Reduced-motion support — animations switch off when your OS requests it</li>
    <li>Sufficient colour contrast; information never conveyed by colour alone</li>
    <li>Text alternatives for meaningful images; decorative images are skipped</li>
  </ul>
  <h2>Known limitations</h2>
  <p>The hero background video is decorative, muted and replaced by a static backdrop under reduced-motion settings or when video fails. Some third-party content (e.g. maps) loads only after consent.</p>
  <h2>Feedback</h2>
  <p>Hit a barrier? Tell us what you were trying to do and where: <a href="mailto:<?= e(EMAIL_MAIN) ?>"><?= e(EMAIL_MAIN) ?></a> or call
    <?php foreach (PHONE_NUMBERS as $i => $number): ?><?= $i ? ', ' : '' ?><a href="<?= e($number['href']) ?>"><?= e($number['display']) ?></a><?php endforeach; ?>.
  </p>
</div></section>
<?php page_end(); ?>
