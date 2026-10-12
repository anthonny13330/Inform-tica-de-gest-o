<?php
require __DIR__ . '/inc/layout.php';
$plano = require __DIR__ . '/data/plano.php';
$tot = [horas_ano($plano,1), horas_ano($plano,2), horas_ano($plano,3)];
$geral = array_sum($tot);
$comps = array_values(array_unique(array_column($plano['disciplinas'], 'comp')));
page_start(['title' => 'Plano de estudos', 'desc' => 'Plano curricular interativo do curso: disciplinas, módulos e horas por ano.']);
page_hero('Curso', 'Plano de estudos', 'Organização modular oficial: ' . $geral . ' horas ao longo de 3 anos.');
?>
<section id="plano">
  <div class="wrap">
    <div class="filters" role="group" aria-label="Filtrar por componente">
      <button class="chip" data-group="comp" data-filter="todas" aria-pressed="true">Todas</button>
      <?php foreach ($comps as $c): ?><button class="chip" data-group="comp" data-filter="<?= e($c) ?>" aria-pressed="false"><?= e($c) ?></button><?php endforeach; ?>
    </div>
    <div class="filters" role="group" aria-label="Filtrar por ano">
      <button class="chip" data-group="ano" data-filter="todos" aria-pressed="true">Todos os anos</button>
      <?php for ($a = 1; $a <= 3; $a++): ?><button class="chip" data-group="ano" data-filter="<?= $a ?>" aria-pressed="false"><?= $a ?>.º ano</button><?php endfor; ?>
    </div>

    <div class="table-wrap">
      <table>
        <caption class="sr">Horas por disciplina e por ano</caption>
        <thead><tr><th scope="col">Disciplina</th><th scope="col">Componente</th><th class="n" scope="col">1.º ano</th><th class="n" scope="col">2.º ano</th><th class="n" scope="col">3.º ano</th><th class="n" scope="col">Total</th></tr></thead>
        <tbody>
        <?php foreach ($plano['disciplinas'] as $d): ?>
          <tr data-comp="<?= e($d['comp']) ?>" data-h="<?= e(implode(',', $d['horas'])) ?>">
            <th scope="row"><?= e($d['nome']) ?></th><td><?= e($d['comp']) ?></td>
            <?php foreach ($d['horas'] as $h): ?><td class="n"><?= $h ?: '–' ?></td><?php endforeach; ?>
            <td class="n"><strong><?= array_sum($d['horas']) ?></strong></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot><tr><td colspan="2">Total</td><?php foreach ($tot as $t): ?><td class="n"><?= $t ?></td><?php endforeach; ?><td class="n"><?= $geral ?></td></tr></tfoot>
      </table>
    </div>
    <p class="notice">Os totais são a soma das horas do documento oficial de organização modular do agrupamento. <a href="<?= e(cfg('plano_pdf')) ?>" rel="noopener" target="_blank">Ver PDF oficial<span class="sr"> (abre noutra janela)</span></a></p>
  </div>
</section>

<section class="alt">
  <div class="wrap">
    <h2>Módulos por disciplina</h2>
    <p>Abre cada disciplina para ver os módulos e as respetivas horas.</p>
    <?php foreach ($plano['disciplinas'] as $d): if (empty($d['modulos'])) continue; ?>
      <details class="mod">
        <summary><span><?= e($d['nome']) ?></span><span><?= array_sum($d['horas']) ?> h</span></summary>
        <?php foreach ($d['modulos'] as $ano => $mods): ?>
          <h3 class="mod-year"><?= (int)$ano ?>.º ano</h3>
          <ul><?php foreach ($mods as $m): ?><li><span><?= e($m[0]) ?></span><span><?= (int)$m[1] ?> h</span></li><?php endforeach; ?></ul>
        <?php endforeach; ?>
      </details>
    <?php endforeach; ?>
  </div>
</section>
<?php page_end();
