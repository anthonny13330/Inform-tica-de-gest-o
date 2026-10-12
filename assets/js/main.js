/* JavaScript do site: menu móvel, tema, animações, contadores, filtros e pesquisa de FAQ. */
(function () {
  'use strict';
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };

  // Menu móvel
  var tg = $('.nav-toggle'), nav = $('#menu');
  if (tg && nav) tg.addEventListener('click', function () {
    var open = nav.classList.toggle('open');
    tg.setAttribute('aria-expanded', open);
  });

  // Modo claro/escuro (guardado no browser)
  var tb = $('.theme-toggle');
  if (tb) tb.addEventListener('click', function () {
    var root = document.documentElement;
    var dark = root.getAttribute('data-theme') === 'dark' ||
      (!root.getAttribute('data-theme') && matchMedia('(prefers-color-scheme: dark)').matches);
    var next = dark ? 'light' : 'dark';
    root.setAttribute('data-theme', next);
    try { localStorage.setItem('tema', next); } catch (e) {}
  });

  // Animações ao scroll
  var reveal = $$('.reveal');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (x) { if (x.isIntersecting) { x.target.classList.add('in'); io.unobserve(x.target); } });
    }, { threshold: .12 });
    reveal.forEach(function (n) { io.observe(n); });
  } else reveal.forEach(function (n) { n.classList.add('in'); });

  // Contadores animados
  var reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  $$('[data-count]').forEach(function (el) {
    var end = parseInt(el.getAttribute('data-count'), 10);
    if (reduce || !('IntersectionObserver' in window)) { el.textContent = end; return; }
    var o = new IntersectionObserver(function (es) {
      if (!es[0].isIntersecting) return; o.disconnect();
      var t0 = performance.now();
      (function tick(t) {
        var p = Math.min(1, (t - t0) / 1200);
        el.textContent = Math.round(end * (1 - Math.pow(1 - p, 3)));
        if (p < 1) requestAnimationFrame(tick);
      })(t0);
    }); o.observe(el);
  });

  // Plano de estudos: filtro por componente e por ano
  var plan = $('#plano');
  if (plan) {
    var fc = 'todas', fa = 'todos';
    var apply = function () {
      $$('[data-comp]', plan).forEach(function (r) {
        var okc = fc === 'todas' || r.getAttribute('data-comp') === fc;
        var h = r.getAttribute('data-h').split(',');
        var oka = fa === 'todos' || parseInt(h[parseInt(fa, 10) - 1], 10) > 0;
        r.hidden = !(okc && oka);
      });
    };
    $$('[data-filter]').forEach(function (b) {
      b.addEventListener('click', function () {
        var g = b.getAttribute('data-group');
        $$('[data-group="' + g + '"]').forEach(function (x) { x.setAttribute('aria-pressed', x === b); });
        if (g === 'comp') fc = b.getAttribute('data-filter'); else fa = b.getAttribute('data-filter');
        apply();
      });
    });
  }

  // Pesquisa na FAQ
  var fq = $('#faq-q');
  if (fq) fq.addEventListener('input', function () {
    var q = fq.value.toLowerCase().trim();
    $$('.faq details').forEach(function (d) { d.hidden = q && d.textContent.toLowerCase().indexOf(q) < 0; });
  });

  // Filtros dos projetos
  $$('[data-pfilter]').forEach(function (b) {
    b.addEventListener('click', function () {
      $$('[data-pfilter]').forEach(function (x) { x.setAttribute('aria-pressed', x === b); });
      var v = b.getAttribute('data-pfilter');
      $$('[data-ptag]').forEach(function (c) {
        c.hidden = v !== 'todos' && c.getAttribute('data-ptag').split('|').indexOf(v) < 0;
      });
    });
  });
})();
