<?php declare(strict_types=1); ?>
</main>

<!-- Floating actions -->
<div class="floating-actions" aria-label="Quick contact actions">
  <a class="fab fab-call" href="<?= e(PHONE_LINK) ?>" aria-label="Call Jain Eye Hospital"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7.2 3.8 9.7 3c.7-.2 1.4.2 1.7.9l1.1 2.7c.2.6.1 1.2-.4 1.6l-1.5 1.2c1 2.1 2.7 3.8 4.8 4.8l1.2-1.5c.4-.5 1-.6 1.6-.4l2.7 1.1c.7.3 1.1 1 .9 1.7l-.8 2.5c-.2.7-.9 1.2-1.6 1.2C11.3 18.8 5.2 12.7 5.2 5.4c0-.7.5-1.4 1.2-1.6Z"/></svg><span>Call</span></a>
  <a class="fab fab-book" href="/appointment" aria-label="Book evaluation"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3v3m10-3v3M4.5 9.5h15M6 5h12a2 2 0 0 1 2 2v11.5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm3 8h.01M12 13h.01M15 13h.01M9 16h.01M12 16h.01"/></svg><span>Book</span></a>
  <button class="fab fab-connect" type="button" data-open-contact aria-label="Open contact options"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v4m0 10v4M3 12h4m10 0h4M5.6 5.6l2.8 2.8m7.2 7.2 2.8 2.8m0-12.8-2.8 2.8m-7.2 7.2-2.8 2.8"/></svg><span>Contact</span></button>
</div>

<!-- Mobile sticky bar -->
<nav class="mobile-bar" aria-label="Quick actions">
  <a href="<?= e(PHONE_LINK) ?>"><span aria-hidden="true">☎</span> Call</a>
  <a href="mailto:<?= e(EMAIL_MAIN) ?>"><span aria-hidden="true">✉</span> Email</a>
  <a href="/appointment" class="mb-book"><span aria-hidden="true">▣</span> Book</a>
</nav>

<footer class="site-footer">
  <div class="container footer-grid">
    <div class="f-col f-brand">
      <div class="brand brand-light">
        <span class="brand-logo"><img src="/assets/images/jain-eye-hospital-logo.webp" alt="Jain Eye Hospital & Laser Centre" width="256" height="64"></span>
      </div>
      <p><?= e(ASSOCIATION_LINE) ?></p>
      <p class="f-disclaimer"><strong>Medical disclaimer:</strong> Content on this site is educational and is not a substitute for clinical examination. LASIK and other refractive procedures are elective — suitability varies, and no procedure is risk-free. For sudden vision loss, severe pain, eye trauma, or flashes/floaters with a curtain-like shadow, seek urgent eye care immediately. This website is not an emergency service.</p>
    </div>
    <div class="f-col">
      <h3>Explore</h3>
      <a href="/lasik-evaluation">LASIK Evaluation</a>
      <a href="/procedures">Procedures</a>
      <a href="/compare">Compare Options</a>
      <a href="/cost">Cost &amp; Planning</a>
      <a href="/doctor">Dr. Rajat Jain</a>
    </div>
    <div class="f-col">
      <h3>Patient guides</h3>
      <a href="/recovery">Recovery &amp; Aftercare</a>
      <a href="/risks">Risks &amp; Safety</a>
      <a href="/faq">FAQs</a>
      <a href="/appointment">Book Evaluation</a>
      <a href="/contact">Contact</a>
    </div>
    <div class="f-col">
      <h3>Centre</h3>
      <p><?= e(ADDRESS_LINE) ?></p>
      <div class="footer-phone-list">
        <strong>Phone</strong>
        <?php foreach (PHONE_NUMBERS as $number): ?><a href="<?= e($number['href']) ?>"><?= e($number['display']) ?></a><?php endforeach; ?>
        <strong>Email</strong>
        <a href="mailto:<?= e(EMAIL_MAIN) ?>"><?= e(EMAIL_MAIN) ?></a>
      </div>
      <a href="<?= e(HOSPITAL_URL) ?>" target="_blank" rel="noopener"><?= e(HOSPITAL_NAME) ?> ↗</a>
      <a href="<?= e(DOCTOR_URL) ?>" target="_blank" rel="noopener"><?= e(DOCTOR_NAME) ?> ↗</a>
    </div>
  </div>
  <div class="container footer-bottom">
    <p>© <?= date('Y') ?> <?= e(SITE_NAME) ?>. Educational information only; individual outcomes vary.</p>
    <p class="f-legal">
      <a href="/privacy">Privacy</a> · <a href="/terms">Terms</a> ·
      <a href="/medical-disclaimer">Medical Disclaimer</a> · <a href="/accessibility">Accessibility</a>
    </p>
  </div>
</footer>

<!-- Contact hub popup -->
<div class="contact-modal" id="contactModal" aria-hidden="true">
  <div class="contact-backdrop" data-close-contact></div>
  <div class="contact-panel" role="dialog" aria-modal="true" aria-labelledby="contactModalTitle">
    <button class="modal-close" type="button" data-close-contact aria-label="Close contact options">✕</button>
    <p class="eyebrow">Jain Eye Hospital &amp; Laser Centre</p>
    <h2 id="contactModalTitle">How would you like to connect?</h2>
    <p class="contact-modal-sub" id="contactModalSub">Choose a phone number, email the centre, or request an evaluation. Appointment requests are not confirmed until the team responds.</p>
    <div class="contact-options">
      <?php foreach (PHONE_NUMBERS as $number): ?>
      <a class="contact-option contact-call" href="<?= e($number['href']) ?>"><span class="contact-icon" aria-hidden="true">☎</span><span><strong>Call the centre</strong><small><?= e($number['display']) ?></small></span></a>
      <?php endforeach; ?>
      <a class="contact-option contact-email" href="mailto:<?= e(EMAIL_MAIN) ?>"><span class="contact-icon" aria-hidden="true">✉</span><span><strong>Email the centre</strong><small><?= e(EMAIL_MAIN) ?></small></span></a>
      <a class="contact-option contact-book" href="/appointment"><span class="contact-icon" aria-hidden="true">▣</span><span><strong>Book an evaluation</strong><small>Request a convenient time</small></span></a>
      <a class="contact-option contact-directions" href="https://www.google.com/maps/search/?api=1&amp;query=<?= rawurlencode(MAPS_QUERY) ?>" target="_blank" rel="noopener"><span class="contact-icon" aria-hidden="true">⌖</span><span><strong>Get directions</strong><small><?= e(ADDRESS_LINE) ?></small></span></a>
    </div>
  </div>
</div>

<!-- Appointment modal -->
<div class="modal" id="apptModal" aria-hidden="true">
  <div class="modal-backdrop" data-close></div>
  <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="apptModalTitle">
    <button class="modal-close" data-close aria-label="Close">✕</button>
    <h2 id="apptModalTitle">Book a LASIK Evaluation</h2>
    <p class="modal-sub">Request an evaluation slot. Your appointment is <strong>not confirmed</strong> until our team responds.</p>
    <?php $err = flash('form_error'); if ($err): ?><div class="form-error" role="alert"><?= e($err) ?></div><?php endif; ?>
    <form class="appt-form" action="/actions/appointment-submit.php" method="post" novalidate>
      <?= csrf_field() ?>
      <input type="text" name="website" tabindex="-1" autocomplete="off" class="hp" aria-hidden="true">
      <input type="hidden" name="ts" value="<?= time() ?>">
      <input type="hidden" name="source_url" value="<?= e($_SERVER['REQUEST_URI'] ?? '/') ?>">
      <div class="form-row">
        <label>Full name *<input name="name" required maxlength="120" autocomplete="name"></label>
        <label>Age range *
          <select name="age_range" required>
            <option value="">Select…</option><option>18–24</option><option>25–34</option><option>35–44</option><option>45–54</option><option>55+</option>
          </select>
        </label>
      </div>
      <div class="form-row">
        <label>Phone *<input name="phone" type="tel" required autocomplete="tel" pattern="[0-9+\-\s]{8,16}"></label>
        <label>Email (optional)<input name="email" type="email" autocomplete="email"></label>
      </div>
      <div class="form-row">
        <label>City<input name="city" maxlength="100" autocomplete="address-level2"></label>
        <label>Currently using *
          <select name="vision_correction" required>
            <option value="">Select…</option><option>Spectacles</option><option>Contact lenses</option><option>Both</option><option>Neither</option>
          </select>
        </label>
      </div>
      <div class="form-row">
        <label>Preferred contact *
          <select name="preferred_contact" required>
            <option value="">Select…</option><option>Phone call</option><option>Email</option>
          </select>
        </label>
        <label>Preferred date / time<input name="preferred_slot" placeholder="e.g. Saturday morning"></label>
      </div>
      <label>Message<textarea name="message" rows="3" maxlength="1000" placeholder="Anything you'd like us to know (optional)"></textarea></label>
      <label class="check"><input type="checkbox" name="consent_privacy" required value="1"> <span>I agree to the <a href="/privacy" target="_blank">privacy policy</a> and consent to being contacted about my enquiry. *</span></label>
      <label class="check"><input type="checkbox" name="consent_non_emergency" required value="1"> <span>I understand this form is not for emergencies or urgent symptoms. *</span></label>
      <button class="btn btn-primary btn-block" type="submit">Request Evaluation</button>
      <p class="form-note">Please don't submit medical records or sensitive reports here.</p>
    </form>
  </div>
</div>

<script src="/assets/js/main.js" defer></script>
</body>
</html>
