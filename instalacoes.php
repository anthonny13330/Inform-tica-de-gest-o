<?php
require __DIR__ . '/inc/layout.php';
page_start(['title' => 'Instalações', 'desc' => 'Salas, equipamentos e software do curso de Informática de Gestão.']);
page_hero('Instalações', 'Como fazemos', 'Salas e equipamentos onde os alunos aprendem na prática.');
?>
<section>
  <div class="wrap">
    <div class="notice"><mark class="ph">[PREENCHER: lista de salas, equipamentos e software]</mark> Não encontrei estas informações em fontes públicas. Indica as salas/laboratórios, número de computadores, software e envia fotografias.</div>
    <h2 style="margin-top:2rem">Galeria</h2>
    <div class="logos">
      <?php for ($i = 1; $i <= 6; $i++): ?><div class="logo-slot"><mark class="ph">[PREENCHER: fotografia <?= $i ?>]</mark></div><?php endfor; ?>
    </div>
  </div>
</section>
<?php page_end();
