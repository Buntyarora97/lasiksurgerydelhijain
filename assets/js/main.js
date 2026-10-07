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

/* ---------- Patient education guide search ---------- */
var guideSearch = document.querySelector('[data-guide-search]');
if (guideSearch) {
  var guideCards = Array.prototype.slice.call(document.querySelectorAll('[data-guide-card]'));
  var guideCount = document.querySelector('[data-guide-count]');
  var guideEmpty = document.querySelector('[data-guide-empty]');
  var guideGroups = document.querySelectorAll('.guide-group');
  function filterGuides() {
    var query = guideSearch.value.trim().toLowerCase();
    var visible = 0;
    guideCards.forEach(function (card) {
      var matches = !query || (card.dataset.search || '').indexOf(query) !== -1;
      card.hidden = !matches;
      if (matches) visible++;
    });
    guideGroups.forEach(function (group) {
      group.hidden = group.querySelectorAll('[data-guide-card]:not([hidden])').length === 0;
    });
    if (guideCount) guideCount.textContent = visible + (visible === 1 ? ' guide' : ' guides');
    if (guideEmpty) guideEmpty.hidden = visible !== 0;
  }
  guideSearch.addEventListener('input', filterGuides);
}

/* ---------- Accessible hero carousel ---------- */
var heroCarousel = document.querySelector('[data-hero-carousel]');
if (heroCarousel) {
  var heroSlides = Array.prototype.slice.call(heroCarousel.querySelectorAll('[data-hero-slide]'));
  var heroDots = Array.prototype.slice.call(heroCarousel.querySelectorAll('[data-slide-to]'));
  var heroPrev = heroCarousel.querySelector('[data-hero-prev]');
  var heroNext = heroCarousel.querySelector('[data-hero-next]');
  var heroToggle = heroCarousel.querySelector('[data-hero-toggle]');
  var heroIndex = 0;
  var heroTimer = null;
  var heroUserPaused = reduceMotion;
  var heroTemporarilyPaused = false;
  var heroInterval = 6500;

  function stopHeroTimer() {
    if (heroTimer) window.clearInterval(heroTimer);
    heroTimer = null;
  }
  function startHeroTimer() {
    stopHeroTimer();
    if (heroSlides.length < 2 || heroUserPaused || heroTemporarilyPaused || document.hidden) return;
    heroTimer = window.setInterval(function () {
      showHeroSlide(heroIndex + 1, false);
    }, heroInterval);
  }
  function showHeroSlide(index, userAction) {
    if (!heroSlides.length) return;
    heroIndex = (index + heroSlides.length) % heroSlides.length;
    heroSlides.forEach(function (slide, i) {
      var active = i === heroIndex;
      slide.classList.toggle('is-active', active);
      slide.setAttribute('aria-hidden', active ? 'false' : 'true');
      slide.setAttribute('aria-label', (i + 1) + ' of ' + heroSlides.length);
    });
    heroDots.forEach(function (dot, i) {
      dot.setAttribute('aria-pressed', i === heroIndex ? 'true' : 'false');
    });
    if (userAction) startHeroTimer();
  }
  if (heroPrev) heroPrev.addEventListener('click', function () { showHeroSlide(heroIndex - 1, true); });
  if (heroNext) heroNext.addEventListener('click', function () { showHeroSlide(heroIndex + 1, true); });
  heroDots.forEach(function (dot) {
    dot.addEventListener('click', function () { showHeroSlide(Number(dot.dataset.slideTo) || 0, true); });
  });
  if (heroToggle) {
    function renderHeroToggle() {
      var playing = !heroUserPaused;
      heroToggle.textContent = playing ? 'Pause' : 'Play';
      heroToggle.setAttribute('aria-label', playing ? 'Pause automatic slides' : 'Start automatic slides');
      heroToggle.setAttribute('aria-pressed', playing ? 'false' : 'true');
    }
    heroToggle.addEventListener('click', function () {
      heroUserPaused = !heroUserPaused;
      renderHeroToggle();
      startHeroTimer();
    });
    renderHeroToggle();
  }
  heroCarousel.addEventListener('mouseenter', function () {
    heroTemporarilyPaused = true;
    stopHeroTimer();
  });
  heroCarousel.addEventListener('mouseleave', function () {
    heroTemporarilyPaused = false;
    startHeroTimer();
  });
  heroCarousel.addEventListener('focusin', function () {
    heroTemporarilyPaused = true;
    stopHeroTimer();
  });
  heroCarousel.addEventListener('focusout', function (event) {
    if (!heroCarousel.contains(event.relatedTarget)) {
      heroTemporarilyPaused = false;
      startHeroTimer();
    }
  });
  heroCarousel.addEventListener('keydown', function (event) {
    if (event.key === 'ArrowLeft') {
      event.preventDefault();
      showHeroSlide(heroIndex - 1, true);
    } else if (event.key === 'ArrowRight') {
      event.preventDefault();
      showHeroSlide(heroIndex + 1, true);
    }
  });
  var touchStartX = null;
  heroCarousel.addEventListener('touchstart', function (event) {
    if (event.target.closest('button')) return;
    touchStartX = event.changedTouches[0].clientX;
  }, { passive: true });
  heroCarousel.addEventListener('touchend', function (event) {
    if (touchStartX === null) return;
    var delta = event.changedTouches[0].clientX - touchStartX;
    touchStartX = null;
    if (Math.abs(delta) > 48) showHeroSlide(heroIndex + (delta < 0 ? 1 : -1), true);
  }, { passive: true });
  document.addEventListener('visibilitychange', startHeroTimer);
  showHeroSlide(0, false);
  startHeroTimer();
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

})();
