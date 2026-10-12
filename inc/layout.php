<?php
/**
 * LAYOUT PARTILHADO: page_start() abre a página (cabeçalho + menu),
 * page_end() fecha-a (rodapé + scripts). Usa-se em todas as páginas.
 */
require_once __DIR__ . '/helpers.php';

function page_start(array $m): void {
    $menu   = require __DIR__ . '/../data/menu.php';
    $titulo = ($m['title'] ?? '') ? $m['title'] . ' · ' . cfg('nome_curso') : cfg('nome_longo') . ' · ' . cfg('escola');
    $desc   = $m['desc'] ?? 'Site oficial do ' . cfg('nome_longo') . ', ' . cfg('escola') . ', Cascais.';
    $ativo  = basename($_SERVER['SCRIPT_NAME'] ?? '');
    $canon  = cfg('base_url') ? rtrim(cfg('base_url'), '/') . '/' . ($ativo === 'index.php' ? '' : $ativo) : '';

    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header("Content-Security-Policy: default-src 'self'; img-src 'self' data:; style-src 'self'; script-src 'self'; frame-ancestors 'self'; base-uri 'self'; form-action 'self'");
    ?>
<!doctype html>
<html lang="pt-PT">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($titulo) ?></title>
  <meta name="description" content="<?= e($desc) ?>">
  <?php if ($canon): ?><link rel="canonical" href="<?= e($canon) ?>"><?php endif; ?>
  <meta property="og:type" content="website">
  <meta property="og:locale" content="pt_PT">
  <meta property="og:title" content="<?= e($titulo) ?>">
  <meta property="og:description" content="<?= e($desc) ?>">
  <meta name="theme-color" content="#0a1a33">
  <link rel="icon" href="assets/img/logo.svg" type="image/svg+xml">
  <script src="assets/js/theme.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<a class="skip" href="#conteudo">Saltar para o conteúdo</a>
<header class="site-header">
  <div class="wrap bar">
    <a class="brand" href="index.php" aria-label="<?= e(cfg('nome_curso')) ?> – página inicial">
      <img src="assets/img/logo.svg" alt="" width="40" height="40">
      <span><strong>Informática de Gestão</strong><small><?= e(cfg('escola')) ?></small></span>
    </a>
    <button class="nav-toggle" aria-expanded="false" aria-controls="menu">Menu</button>
    <nav id="menu" class="nav" aria-label="Principal">
      <ul>
      <?php foreach ($menu as $it):
          $sub = $it[3] ?? null;
          $files = $sub ? array_column($sub, 1) : [$it[1]];
          $cur = in_array($ativo, $files, true) ? ' aria-current="page"' : ''; ?>
        <li<?= $sub ? ' class="has-sub"' : '' ?>>
          <a href="<?= e($it[1]) ?>"<?= $cur ?>><?= e($it[0]) ?></a>
          <?php if ($sub): ?>
          <ul class="sub">
            <?php foreach ($sub as $s): ?><li><a href="<?= e($s[1]) ?>"><?= e($s[0]) ?></a></li><?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
      </ul>
      <form class="search" action="pesquisa.php" role="search">
        <label class="sr" for="q">Pesquisar no site</label>
        <input id="q" name="q" type="search" placeholder="Pesquisar…" maxlength="60">
      </form>
      <button class="theme-toggle" type="button" aria-label="Alternar modo claro/escuro">◐</button>
    </nav>
  </div>
</header>
<main id="conteudo">
<?php }

function page_hero(string $kicker, string $titulo, string $texto = ''): void { ?>
  <section class="page-hero">
    <div class="wrap">
      <p class="kicker"><?= e($kicker) ?></p>
      <h1><?= e($titulo) ?></h1>
      <?php if ($texto): ?><p class="lead"><?= e($texto) ?></p><?php endif; ?>
    </div>
  </section>
<?php }

function page_end(): void {
    $menu = require __DIR__ . '/../data/menu.php'; ?>
</main>
<footer class="site-footer">
  <div class="wrap grid-4">
    <div>
      <h2>Informática de Gestão</h2>
      <p><?= e(cfg('nome_longo')) ?><br><?= e(cfg('escola')) ?></p>
      <p>Direção de curso: <?= ph(cfg('direcao_curso')) ?><br><a href="mailto:<?= e(cfg('direcao_curso_email')) ?>"><?= e(cfg('direcao_curso_email')) ?></a></p>
    </div>
    <div>
      <h2>Contactos</h2>
      <address>
        <?= e(cfg('escola_sede')) ?><br>
        <?= e(cfg('morada')) ?><br><?= e(cfg('codigo_postal')) ?><br>
        Tel. <a href="tel:<?= e(cfg('telefone_href')) ?>"><?= e(cfg('telefone')) ?></a><br>
        <a href="mailto:<?= e(cfg('email')) ?>"><?= e(cfg('email')) ?></a>
      </address>
    </div>
    <div>
      <h2>Navegação</h2>
      <ul class="plain">
        <?php foreach ($menu as $it): ?><li><a href="<?= e($it[1]) ?>"><?= e($it[0]) ?></a></li><?php endforeach; ?>
        <li><a href="privacidade.php">Privacidade</a></li>
      </ul>
    </div>
    <div>
      <h2>Redes sociais</h2>
      <ul class="plain">
        <?php foreach (cfg('redes') as $nome => $url): ?>
          <li><a href="<?= e($url) ?>" rel="noopener" target="_blank"><?= e($nome) ?><span class="sr"> (abre noutra janela)</span></a></li>
        <?php endforeach; ?>
        <li><a href="<?= e(cfg('site_escola')) ?>" rel="noopener" target="_blank">Site do agrupamento</a></li>
      </ul>
    </div>
  </div>
  <div class="wrap legal">© <?= date('Y') ?> <?= e(cfg('escola')) ?> · Ano letivo <?= e(cfg('ano_letivo')) ?></div>
</footer>
<script src="assets/js/main.js" defer></script>
</body>
</html>
<?php }
