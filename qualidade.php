<?php
require __DIR__ . '/inc/layout.php';
page_start(['title' => 'Qualidade (EQAVET)', 'desc' => 'Sistema de garantia da qualidade EQAVET do Agrupamento de Escolas da Cidadela.']);
page_hero('Qualidade', 'Certificação de qualidade EQAVET', 'Melhoria contínua da formação profissional.');
?>
<section>
  <div class="wrap">
    <p>O Agrupamento de Escolas da Cidadela implementa, desde o ano letivo 2020/2021, um sistema de garantia da qualidade alinhado com o Quadro Europeu de Referência EQAVET. Cada ano letivo tem equipa, calendarização, relatórios de acompanhamento e planos de melhoria.</p>
    <p class="notice">O agrupamento obteve o Selo de Conformidade EQAVET. O respetivo documento está publicado na página EQAVET do agrupamento, no ano letivo 2021/2022.</p>
    <p><a class="btn" href="<?= e(cfg('eqavet_url')) ?>" rel="noopener" target="_blank">Documentos EQAVET no site do agrupamento<span class="sr"> (abre noutra janela)</span></a></p>
  </div>
</section>
<?php page_end();
