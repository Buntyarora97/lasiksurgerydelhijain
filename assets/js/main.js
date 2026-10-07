/* The Clarity Aperture — interactions (vanilla JS, no dependencies) */
(function () {
'use strict';
var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
var finePointer = window.matchMedia('(pointer: fine)').matches;

/* ---------- Header shadow ---------- */
var header = document.getElementById('siteHeader');
if (header) {
  window.addEventListener('scroll', function () {
    header.classList.toggle('scrolled', window.scrollY > 8);
  }, { passive: true });
}

/* ---------- Mobile drawer ---------- */
var drawer = document.getElementById('mobileDrawer');
var navToggle = document.getElementById('navToggle');
function openDrawer() { drawer.classList.add('open'); drawer.setAttribute('aria-hidden','false');
  navToggle.setAttribute('aria-expanded','true'); document.body.style.overflow = 'hidden'; }
function closeDrawer() { drawer.classList.remove('open'); drawer.setAttribute('aria-hidden','true');
  navToggle.setAttribute('aria-expanded','false'); document.body.style.overflow = ''; }
if (navToggle && drawer) {
  navToggle.addEventListener('click', openDrawer);
  document.getElementById('drawerClose').addEventListener('click', closeDrawer);
  drawer.addEventListener('click', function (e) { if (e.target === drawer) closeDrawer(); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeDrawer(); });
}

/* ---------- Mega menu preview swap ---------- */
var megaImg = document.getElementById('megaImg');
var megaTitle = document.getElementById('megaTitle');
var megaDesc = document.getElementById('megaDesc');
var megaTime = document.getElementById('megaTime');
var megaLink = document.getElementById('megaLink');
if (megaTitle && megaDesc && megaTime && megaLink) {
  document.querySelectorAll('.mega a[data-title]').forEach(function (a) {
    function swap() {
      if (megaImg) megaImg.style.opacity = 0;
      setTimeout(function () {
        if (megaImg) {
          if (a.dataset.img) {
            megaImg.src = a.dataset.img;
            megaImg.hidden = false;
          } else {
            megaImg.hidden = true;
          }
        }
        megaTitle.textContent = a.dataset.title;
        megaDesc.textContent = a.dataset.desc;
        megaTime.textContent = a.dataset.time;
        megaLink.href = a.dataset.link;
        if (megaImg && !megaImg.hidden) megaImg.style.opacity = 1;
      }, reduceMotion ? 0 : 120);
    }
    a.addEventListener('mouseenter', swap);
    a.addEventListener('focus', swap);
  });
  if (megaImg) megaImg.style.transition = 'opacity .18s ease';
}

/* ---------- Appointment modal ---------- */
var modal = document.getElementById('apptModal');
document.querySelectorAll('[data-open-modal]').forEach(function (b) {
  b.addEventListener('click', function (e) { e.preventDefault();
    modal.classList.add('open'); modal.setAttribute('aria-hidden','false');
    document.body.style.overflow = 'hidden'; });
});
if (modal) {
  modal.querySelectorAll('[data-close]').forEach(function (el) {
    el.addEventListener('click', function () {
      modal.classList.remove('open'); modal.setAttribute('aria-hidden','true');
      document.body.style.overflow = ''; });
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && modal.classList.contains('open')) {
      modal.classList.remove('open'); modal.setAttribute('aria-hidden','true'); document.body.style.overflow = ''; }
  });
}

/* ---------- Contact hub popup ---------- */
var contactModal = document.getElementById('contactModal');
function openContact() {
  if (!contactModal) return;
  contactModal.classList.add('open');
  contactModal.setAttribute('aria-hidden', 'false');
  document.body.style.overflow = 'hidden';
}
function closeContact() {
  if (!contactModal) return;
  contactModal.classList.remove('open');
  contactModal.setAttribute('aria-hidden', 'true');
  document.body.style.overflow = '';
}
document.querySelectorAll('[data-open-contact]').forEach(function (trigger) {
  trigger.addEventListener('click', function () {
    openContact();
  });
});
if (contactModal) {
  contactModal.querySelectorAll('[data-close-contact]').forEach(function (el) {
    el.addEventListener('click', closeContact);
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && contactModal.classList.contains('open')) closeContact();
  });
}

/* ---------- Reveal on scroll ---------- */
if (!reduceMotion && 'IntersectionObserver' in window) {
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal, .card, .timeline li').forEach(function (el) {
    el.classList.add('reveal'); io.observe(el);
  });
} else {
  document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('in'); });
}

/* ---------- Suitability checklist ---------- */
var checklist = document.getElementById('suitChecklist');
if (checklist) {
  var result = document.getElementById('checkResult');
  var boxes = checklist.querySelectorAll('input[type=checkbox]');
  function evaluate() {
    var exam = false, discuss = false, any = false;
    boxes.forEach(function (b) {
      if (!b.checked) return; any = true;
      if (b.dataset.w === 'exam') exam = true;
      if (b.dataset.w === 'discuss') discuss = true;
    });
    result.className = 'check-result';
    if (!any) {
      result.innerHTML = '<strong>Select the statements that apply to you.</strong><p>Nothing is saved or sent anywhere — this runs only in your browser.</p>';
    } else if (discuss) {
      result.classList.add('warn');
      result.innerHTML = '<strong>Discuss additional factors with your surgeon.</strong><p>Some of what you selected deserves a closer conversation. It does not automatically rule anything in or out — it means your evaluation should be especially detailed.';
    } else if (exam) {
      result.classList.add('alt');
      result.innerHTML = '<strong>An examination is required.</strong><p>Your answers suggest nothing obvious that rules evaluation out — but only measurements of your eyes can confirm anything. This tool never declares anyone eligible.';
    }
  }
  boxes.forEach(function (b) { b.addEventListener('change', evaluate); });
}

/* ---------- Services carousel ---------- */
var serviceSlider = document.querySelector('[data-services-slider]');
if (serviceSlider) {
  var serviceTrack = serviceSlider.querySelector('.services-track');
  var serviceCards = serviceTrack ? Array.prototype.slice.call(serviceTrack.children) : [];
  var servicePrev = serviceSlider.querySelector('[data-service-prev]');
  var serviceNext = serviceSlider.querySelector('[data-service-next]');
  var serviceDots = serviceSlider.querySelector('[data-service-dots]');
  var serviceIndex = 0;
  var serviceTimer;

  function serviceVisible() {
    return window.innerWidth <= 720 ? 1 : (window.innerWidth <= 1080 ? 2 : 3);
  }
  function serviceMax() {
    return Math.max(0, serviceCards.length - serviceVisible());
  }
  function renderServiceDots() {
    if (!serviceDots) return;
    var total = serviceMax() + 1;
    serviceDots.innerHTML = '';
    for (var i = 0; i < total; i++) {
      var dot = document.createElement('button');
      dot.type = 'button';
      dot.setAttribute('aria-label', 'Show services ' + (i + 1));
      dot.setAttribute('aria-selected', i === serviceIndex ? 'true' : 'false');
      dot.dataset.serviceIndex = i;
      serviceDots.appendChild(dot);
    }
  }
  function renderServices() {
    if (!serviceTrack || !serviceCards.length) return;
    serviceIndex = Math.min(serviceIndex, serviceMax());
    var gap = parseFloat(getComputedStyle(serviceTrack).gap) || 0;
    var width = serviceCards[0].getBoundingClientRect().width + gap;
    serviceTrack.style.transform = 'translateX(-' + (serviceIndex * width) + 'px)';
    if (servicePrev) servicePrev.disabled = serviceIndex === 0;
    if (serviceNext) serviceNext.disabled = serviceIndex >= serviceMax();
    renderServiceDots();
  }
  function moveServices(step) {
    serviceIndex = Math.max(0, Math.min(serviceMax(), serviceIndex + step));
    renderServices();
  }
  if (servicePrev) servicePrev.addEventListener('click', function () { moveServices(-1); });
  if (serviceNext) serviceNext.addEventListener('click', function () { moveServices(1); });
  if (serviceDots) serviceDots.addEventListener('click', function (event) {
    var target = event.target.closest('[data-service-index]');
    if (!target) return;
    serviceIndex = Number(target.dataset.serviceIndex) || 0;
    renderServices();
  });
  window.addEventListener('resize', renderServices, { passive: true });
  renderServices();
}

/* ---------- Compare widget ---------- */
var cmpData = [
  { title: 'Approach', rows: [
    ['LASIK / Femto', 'A thin flap is created, tissue reshaped beneath it, flap repositioned.'],
    ['PRK / TransPRK', 'No flap — the surface layer is removed and the laser reshapes directly.'],
    ['SMILE / SILK', 'A lenticule is created inside the cornea and removed through a small incision.'],
    ['ICL', 'A lens is placed inside the eye, leaving the cornea untouched.']]},
  { title: 'Candidacy', rows: [
    ['LASIK / Femto', 'Stable prescription, adequate corneal thickness, healthy ocular surface.'],
    ['PRK / TransPRK', 'Often discussed when corneas are thinner or flaps are undesirable.'],
    ['SMILE / SILK', 'Specific prescription ranges; suitability depends on detailed mapping.'],
    ['ICL', 'Very high powers or thin corneas where laser correction is unsuitable.']]},
  { title: 'Recovery pattern', rows: [
    ['LASIK / Femto', 'Often rapid visual recovery; most resume routine activities within days.'],
    ['PRK / TransPRK', 'Slower early recovery; surface healing takes days to weeks.'],
    ['SMILE / SILK', 'Generally quick, with small-incision comfort advantages for some.'],
    ['ICL', 'Quick visual recovery; planned long-term monitoring of the implant.']]},
  { title: 'Trade-offs', rows: [
    ['LASIK / Femto', 'Flap-related considerations; dry eye possible early on.'],
    ['PRK / TransPRK', 'More early discomfort; slower stabilization of vision.'],
    ['SMILE / SILK', 'Not reversible; limited enhancement options compared with surface.'],
    ['ICL', 'An intraocular procedure — infection and pressure risks must be weighed.']]},
  { title: 'Ask your surgeon', rows: [
    ['LASIK / Femto', '“Is my cornea thick enough, and what is my enhancement risk?”'],
    ['PRK / TransPRK', '“How will my first week of recovery realistically look?”'],
    ['SMILE / SILK', '“If I need an enhancement later, what are my options?”'],
    ['ICL', '“What is my long-term monitoring plan for the lens?”']]}
];
var cmpBody = document.getElementById('compareBody');
var cmpTabs = document.querySelectorAll('.compare-tabs button');
if (cmpBody) {
  function renderCmp(i) {
    var d = cmpData[i];
    var html = '<table><caption class="muted-sm" style="text-align:left;margin-bottom:.6rem">' + d.title + '</caption>';
    d.rows.forEach(function (r) { html += '<tr><th scope="row">' + r[0] + '</th><td>' + r[1] + '</td></tr>'; });
    cmpBody.innerHTML = html + '</table>';
  }
  cmpTabs.forEach(function (t, i) {
    t.addEventListener('click', function () {
      cmpTabs.forEach(function (x) { x.setAttribute('aria-selected','false'); });
      t.setAttribute('aria-selected','true'); renderCmp(i);
    });
  });
  renderCmp(0);
}

/* ---------- Map consent ---------- */
var mapBtn = document.getElementById('loadMapBtn');
if (mapBtn) {
  mapBtn.addEventListener('click', function () {
    var q = encodeURIComponent('Jain Eye Hospital & Laser Centre, AG 152, Shalimar Bagh, Delhi 110088');
    document.getElementById('mapConsent').innerHTML =
      '<iframe title="Map to ' + 'Jain Eye Hospital' + '" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=' + q + '&output=embed"></iframe>';
  });
}

/* =========================================================
   Clarity Aperture — WebGL-free canvas animation
   Translucent corneal rings + travelling light beam that
   resolves from blur to focus as the user scrolls.
   ========================================================= */
var canvas = document.getElementById('apertureCanvas');
if (canvas && !reduceMotion) {
  var ctx = canvas.getContext('2d');
  var W = canvas.width, H = canvas.height, cx = W / 2, cy = H / 2;
  var pointer = { x: 0, y: 0 }, focus = 0.25, t = 0;
  var running = true;

  if (finePointer) {
    window.addEventListener('mousemove', function (e) {
      pointer.x = (e.clientX / window.innerWidth - 0.5) * 12;   // max 12px parallax
      pointer.y = (e.clientY / window.innerHeight - 0.5) * 12;
    }, { passive: true });
  }
  window.addEventListener('scroll', function () {
    var h = document.getElementById('hero');
    if (h) focus = Math.min(1, Math.max(0.25, 1 - (window.scrollY / (h.offsetHeight || 1)) * 0.9));
  }, { passive: true });

  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (en) { running = en[0].isIntersecting; }, { threshold: 0 })
      .observe(canvas);
  }

  function ring(r, alpha, lw) {
    ctx.beginPath();
    ctx.arc(cx + pointer.x * (r / 200), cy + pointer.y * (r / 200), r, 0, Math.PI * 2);
    ctx.strokeStyle = 'rgba(37,199,217,' + alpha + ')';
    ctx.lineWidth = lw;
    ctx.stroke();
  }
  function draw() {
    requestAnimationFrame(draw);
    if (!running) return;
    t += 0.008;
    ctx.clearRect(0, 0, W, H);

    // corneal rings — blur decreases as focus increases
    var blur = (1 - focus) * 6;
    ctx.save();
    ctx.filter = blur > 0.4 ? 'blur(' + blur.toFixed(1) + 'px)' : 'none';
    var pulse = Math.sin(t * 2) * 4;
    ring(240 + pulse, 0.16, 1.5);
    ring(196, 0.26, 1.5);
    ring(158 - pulse * 0.5, 0.40, 2);
    ring(120, 0.55, 2);
    // aperture blades
    for (var i = 0; i < 6; i++) {
      var a = t * 0.6 + i * Math.PI / 3;
      ctx.beginPath();
      ctx.moveTo(cx + Math.cos(a) * 66, cy + Math.sin(a) * 66);
      ctx.lineTo(cx + Math.cos(a + 0.5) * 118, cy + Math.sin(a + 0.5) * 118);
      ctx.strokeStyle = 'rgba(84,184,138,0.35)';
      ctx.lineWidth = 2;
      ctx.stroke();
    }
    ctx.restore();

    // travelling light beam — converging to focal point
    var bx = W * 0.08, by = cy - 60;
    var grad = ctx.createLinearGradient(bx, by, cx, cy);
    grad.addColorStop(0, 'rgba(37,199,217,0)');
    grad.addColorStop(1, 'rgba(37,199,217,' + (0.25 + focus * 0.6) + ')');
    ctx.beginPath();
    ctx.moveTo(bx, by - 26);
    ctx.quadraticCurveTo(W * 0.5, cy - (1 - focus) * 90 - 8, cx, cy);
    ctx.lineTo(cx, cy);
    ctx.quadraticCurveTo(W * 0.5, cy + (1 - focus) * 90 + 8, bx, by + 26);
    ctx.closePath();
    ctx.fillStyle = grad;
    ctx.fill();

    // focal point glow
    var glow = ctx.createRadialGradient(cx, cy, 0, cx, cy, 46);
    glow.addColorStop(0, 'rgba(140,234,244,' + (0.35 + focus * 0.55) + ')');
    glow.addColorStop(1, 'rgba(140,234,244,0)');
    ctx.fillStyle = glow;
    ctx.beginPath(); ctx.arc(cx, cy, 46, 0, Math.PI * 2); ctx.fill();
  }
  draw();
} else if (canvas) {
  // Static fallback for reduced motion / no rAF
  canvas.style.background = 'radial-gradient(circle, rgba(37,199,217,.25), transparent 60%)';
}

})();
