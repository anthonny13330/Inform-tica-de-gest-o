<?php
require __DIR__ . '/inc/layout.php';
page_start(['title' => 'Candidaturas', 'desc' => 'Como te candidatares ao Curso Profissional de Técnico de Informática de Gestão: pré-inscrição e perguntas frequentes.']);
page_hero('Candidaturas', 'Candidata-te ao curso', 'Pré-inscrição online e respostas às dúvidas mais comuns.');
$faq = [
 ['Quem se pode candidatar?', 'Alunos que concluíram o 9.º ano de escolaridade.'],
 ['Que certificação obtenho?', 'O 12.º ano de escolaridade e o Certificado Profissional de Nível 4 (dupla certificação).'],
 ['Quanto dura o curso?', 'Três anos letivos, com formação em contexto de trabalho (600 horas) no 3.º ano.'],
 ['Posso continuar a estudar depois?', 'Sim. O curso permite aceder a cursos TeSP (nível 5) e ao ensino superior universitário ou politécnico.'],
 ['O curso funciona em que horário?', 'Regime diurno. Horários detalhados: [PREENCHER: horário]'],
 ['Quantas vagas existem?', '[PREENCHER: número de vagas]'],
 ['Quais são os critérios de seleção?', '[PREENCHER: critérios de seriação]'],
 ['Posso fazer estágio no estrangeiro?', 'Os alunos dos cursos profissionais podem candidatar-se a mobilidades Erasmus+. Ver página FCT e Erasmus+.'],
];
?>
<section>
  <div class="wrap grid-2">
    <div>
      <h2>Pré-inscrição</h2>
      <p>A pré-inscrição faz-se no formulário oficial do agrupamento.</p>
      <p><a class="btn" href="<?= e(cfg('preinscricao_url')) ?>" rel="noopener" target="_blank">Abrir formulário de pré-inscrição<span class="sr"> (abre noutra janela)</span></a></p>
      <p>Prazos e documentos necessários: <mark class="ph">[PREENCHER: datas de candidatura e documentos]</mark></p>
    </div>
    <div class="card">
      <h3>Precisas de ajuda?</h3>
      <p>Contacta a secretaria: <a href="tel:<?= e(cfg('telefone_href')) ?>"><?= e(cfg('telefone')) ?></a> ou <a href="mailto:<?= e(cfg('email')) ?>"><?= e(cfg('email')) ?></a>.</p>
    </div>
  </div>
</section>
<section class="alt">
  <div class="wrap">
    <h2>Perguntas frequentes</h2>
    <label for="faq-q">Pesquisar nas perguntas</label>
    <input id="faq-q" type="search" placeholder="Ex.: vagas, horário, estágio" style="max-width:420px;margin-bottom:1rem">
    <div class="faq">
      <?php foreach ($faq as $f): ?><details><summary><?= e($f[0]) ?></summary><p><?= ph($f[1]) ?></p></details><?php endforeach; ?>
    </div>
  </div>
</section>
<?php page_end();
