<?php
require __DIR__ . '/inc/layout.php';
$projetos = require __DIR__ . '/data/projetos.php';
$tags = []; foreach ($projetos as $p) foreach (array_merge([$p['ano']], $p['tecnologias']) as $t) $tags[$t] = 1;
page_start(['title' => 'Projetos', 'desc' => 'Projetos e trabalhos dos alunos do curso de Informática de Gestão.']);
page_hero('Projetos', 'Mostra de projetos', 'Aplicações, bases de dados e sites desenvolvidos pelos nossos alunos.');
?>
<section>
  <div class="wrap">
  <?php if (!$projetos): ?>
    <div class="notice"><mark class="ph">[PREENCHER: projetos dos alunos]</mark> Ainda não há projetos publicados. Para adicionar, edita o ficheiro <code>data/projetos.php</code> (há um exemplo comentado lá dentro).</div>
  <?php else: ?>
    <div class="filters" role="group" aria-label="Filtrar projetos">
      <button class="chip" data-pfilter="todos" aria-pressed="true">Todos</button>
      <?php foreach (array_keys($tags) as $t): ?><button class="chip" data-pfilter="<?= e($t) ?>" aria-pressed="false"><?= e($t) ?></button><?php endforeach; ?>
    </div>
    <div class="grid-3">
      <?php foreach ($projetos as $p): ?>
      <article class="card" data-ptag="<?= e(implode('|', array_merge([$p['ano']], $p['tecnologias']))) ?>">
        <span class="ico"><?= e($p['ano']) ?></span><h3><?= e($p['titulo']) ?></h3><p><?= e($p['resumo']) ?></p>
        <p><?= e(implode(' · ', $p['tecnologias'])) ?></p>
        <?php if (!empty($p['link'])): ?><a href="<?= e($p['link']) ?>" rel="noopener" target="_blank">Ver projeto<span class="sr"> (abre noutra janela)</span></a><?php endif; ?>
      </article>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  </div>
</section>
<section class="alt">
  <div class="wrap"><h2>Atividades e eventos</h2><p><mark class="ph">[PREENCHER: atividades, concursos, prémios e eventos do curso]</mark></p></div>
</section>
<?php page_end();
