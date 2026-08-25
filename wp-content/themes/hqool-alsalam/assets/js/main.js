(function () {
  'use strict';
  var header = document.querySelector('[data-header]');
  var menuToggle = document.querySelector('.menu-toggle');
  var nav = document.querySelector('.main-nav');
  function updateHeader() { if (header) header.classList.toggle('is-scrolled', window.scrollY > 40); }
  window.addEventListener('scroll', updateHeader, { passive: true }); updateHeader();
  if (menuToggle && nav) { menuToggle.addEventListener('click', function () { var open = menuToggle.getAttribute('aria-expanded') === 'true'; menuToggle.setAttribute('aria-expanded', String(!open)); nav.classList.toggle('is-open', !open); document.body.classList.toggle('menu-open', !open); }); nav.addEventListener('click', function (event) { if (event.target.closest('a')) { menuToggle.setAttribute('aria-expanded', 'false'); nav.classList.remove('is-open'); document.body.classList.remove('menu-open'); } }); }
  var observer = new IntersectionObserver(function (entries) { entries.forEach(function (entry) { if (entry.isIntersecting) { entry.target.classList.add('is-visible'); observer.unobserve(entry.target); } }); }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(function (element) { observer.observe(element); });
}());
