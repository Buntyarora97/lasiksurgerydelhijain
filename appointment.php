<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
page_start('appointment','Book a LASIK Evaluation in Delhi | ' . SITE_NAME,
 'Request a refractive-surgery evaluation with Dr. Rajat Jain at Jain Eye Hospital & Laser Centre, Shalimar Bagh, Delhi.',
 [['Book Evaluation','/appointment']]);
?>
<section class="section">
  <div class="container split-2" style="align-items:start">
    <div>
      <p class="eyebrow">Book · Not confirmed until we respond</p>
      <h1>Book a LASIK evaluation</h1>
      <p class="section-lede">This is a request, not a confirmation. Our team will call you to agree a convenient time. The evaluation is where every responsible decision starts.</p>

      <?php if (!empty($_GET['sent']) && !empty($_SESSION['appt_ref'])): ?>
      <div class="form-success"><strong>Request received.</strong> Your reference is
        <strong><?= e($_SESSION['appt_ref']) ?></strong>. This is <em>not</em> a confirmation —
        call the centre if you need to confirm receipt.</div>
      <?php if (!empty($_SESSION['appt_mail_notice'])): ?>
        <div class="form-note" role="status"><?= e($_SESSION['appt_mail_notice']) ?></div>
        <?php unset($_SESSION['appt_mail_notice']); ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php $err = flash('form_error'); if ($err): ?><div class="form-error" role="alert"><?= e($err) ?></div><?php endif; ?>

      <form class="appt-form card" action="/actions/appointment-submit.php" method="post" novalidate>
        <?= csrf_field() ?>
        <input type="text" name="website" tabindex="-1" autocomplete="off" class="hp" aria-hidden="true">
        <input type="hidden" name="ts" value="<?= time() ?>">
        <input type="hidden" name="source_url" value="/appointment">
        <div class="form-row">
          <label>Full name *<input name="name" required maxlength="120" autocomplete="name"></label>
          <label>Age range *
            <select name="age_range" required><option value="">Select…</option><option>18–24</option><option>25–34</option><option>35–44</option><option>45–54</option><option>55+</option></select>
          </label>
        </div>
        <div class="form-row">
          <label>Phone *<input name="phone" type="tel" required autocomplete="tel" pattern="[0-9+\-\s]{8,16}"></label>
          <label>Email (optional)<input name="email" type="email" autocomplete="email"></label>
        </div>
        <div class="form-row">
          <label>City<input name="city" maxlength="100" autocomplete="address-level2"></label>
          <label>Currently using *
            <select name="vision_correction" required><option value="">Select…</option><option>Spectacles</option><option>Contact lenses</option><option>Both</option><option>Neither</option></select>
          </label>
        </div>
        <div class="form-row">
          <label>Preferred contact *
            <select name="preferred_contact" required><option value="">Select…</option><option>Phone call</option><option>Email</option></select>
          </label>
          <label>Preferred date / time<input name="preferred_slot" placeholder="e.g. Saturday morning"></label>
        </div>
        <label>Message<textarea name="message" rows="4" maxlength="1000" placeholder="Anything you'd like us to know (optional — please no medical records)"></textarea></label>
        <label class="check"><input type="checkbox" name="consent_privacy" required value="1"> <span>I agree to the <a href="/privacy" target="_blank">privacy policy</a> and consent to being contacted about my enquiry. *</span></label>
        <label class="check"><input type="checkbox" name="consent_non_emergency" required value="1"> <span>I understand this form is not for emergencies or urgent symptoms. *</span></label>
        <button class="btn btn-primary btn-block" type="submit">Request Evaluation</button>
        <p class="form-note">Your appointment is not confirmed until the team responds. Please do not include medical records or sensitive reports.</p>
      </form>
    </div>
    <aside>
      <figure class="side-feature">
        <img src="/assets/images/clinic-exam-room.jpg" alt="Eye examination room at the associated centre" width="1600" height="900" loading="eager">
        <figcaption>Illustrative diagnostic equipment. Your evaluation is based on your own history and measurements.</figcaption>
      </figure>
      <div class="card" style="margin-bottom:1.2rem">
        <h3>Visit us</h3>
        <address class="address-block"><strong><?= e(HOSPITAL_NAME) ?></strong><br><?= e(ADDRESS_LINE) ?></address>
        <p class="footer-phone-list"><strong>Call</strong>
          <?php foreach (PHONE_NUMBERS as $number): ?><a href="<?= e($number['href']) ?>"><?= e($number['display']) ?></a><?php endforeach; ?>
          <a href="mailto:<?= e(EMAIL_MAIN) ?>"><?= e(EMAIL_MAIN) ?></a>
        </p>
      </div>
      <div class="card">
        <h3>What happens next</h3>
        <ol style="margin-left:1.2rem;line-height:1.9">
          <li>We contact you to fix a time</li>
          <li>Evaluation &amp; honest options discussion</li>
          <li>Written plan — you decide without pressure</li>
        </ol>
      </div>
    </aside>
  </div>
</section>
<?php page_end(); ?>
