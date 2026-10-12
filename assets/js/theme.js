/* Aplica o tema guardado antes de pintar a página (evita "flash"). */
(function () {
  try {
    var t = localStorage.getItem('tema');
    if (t === 'light' || t === 'dark') document.documentElement.setAttribute('data-theme', t);
  } catch (e) {}
})();
