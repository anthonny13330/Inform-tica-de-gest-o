<?php
require __DIR__ . '/inc/layout.php';
$q = trim(mb_substr((string)($_GET['q'] ?? ''), 0, 60));
$idx = [];
foreach (require __DIR__ . '/data/menu.php' as $it) {
    $idx[] = [$it[0], $it[1], $it[2]];
    foreach ($it[3] ?? [] as $s) $idx[] = [$s[0], $s[1], $s[2]];
}
$idx[] = ['Privacidade', 'privacidade.php', 'Política de privacidade e dados pessoais.'];
$norm = fn($s) => mb_strtolower(strtr($s, ['á'=>'a','à'=>'a','â'=>'a','ã'=>'a','é'=>'e','ê'=>'e','í'=>'i','ó'=>'o','ô'=>'o','õ'=>'o','ú'=>'u','ç'=>'c','Á'=>'a','É'=>'e','Í'=>'i','Ó'=>'o','Ú'=>'u','Ç'=>'c']));
$res = [];
if ($q !== '') {
    $nq = $norm($q);
    foreach ($idx as $i) if (str_contains($norm($i[0] . ' ' . $i[2]), $nq)) $res[$i[1]] = $i;
}
page_start(['title' => 'Pesquisa', 'desc' => 'Pesquisa no site.']);
page_hero('Pesquisa', 'Resultados');
?>
<section><div class="wrap">
  <p>Pesquisa por: <strong><?= e($q) ?></strong></p>
  <?php if ($q === ''): ?><p>Escreve algo na caixa de pesquisa do menu.</p>
  <?php elseif (!$res): ?><p>Sem resultados. Tenta outra palavra.</p>
  <?php else: ?><ul class="ticks"><?php foreach ($res as $r): ?><li><a href="<?= e($r[1]) ?>"><?= e($r[0]) ?></a> – <?= e($r[2]) ?></li><?php endforeach; ?></ul><?php endif; ?>
</div></section>
<?php page_end();
