<?php
require __DIR__ . '/inc/layout.php';
$plano = require __DIR__ . '/data/plano.php';
$total = 0; for ($a = 1; $a <= 3; $a++) $total += horas_ano($plano, $a);
page_start(['title' => '', 'desc' => 'Curso Profissional de Técnico de Informática de Gestão em Cascais. 3 anos, nível 4, programação, bases de dados, redes e gestão, com 600 horas de estágio.']);
?>
<section class="hero">
  <div class="wrap">
    <div>
      <p class="kicker">Curso Profissional · Nível 4 · Cascais</p>
      <h1>Técnico de <em>Informática de Gestão</em></h1>
      <p>Formação diversificada nas áreas da informática e da gestão: programação, bases de dados, redes, contabilidade e aplicações de gestão. Dupla certificação: 12.º ano e Certificado Profissional de Nível 4.</p>
      <p><?= ph(cfg('slogan')) ?></p>
      <div class="actions">
        <a class="btn" href="curso.php">Saber mais</a>
        <a class="btn ghost" href="candidaturas.php">Candidatar-me</a>
      </div>
    </div>
    <div class="terminal" aria-hidden="true">
      <header>ig@cidadela:~$ curso --info</header>
<pre><span class="g">$</span> duracao   = "3 anos"
<span class="g">$</span> horas     = <?= (int)$total ?>

<span class="g">$</span> fct       = 600
<span class="g">$</span> nivel     = 4  <span class="o">// QNQ/QEQ</span>
<span class="g">$</span> certifica = ["12.º ano", "Profissional"]
<span class="g">$</span> saidas    = ["emprego", "TeSP", "ensino superior"]</pre>
    </div>
  </div>
</section>

<section>
  <div class="wrap stats reveal">
    <div class="stat"><strong data-count="3">3</strong><span>anos de formação</span></div>
    <div class="stat"><strong data-count="<?= (int)$total ?>"><?= (int)$total ?></strong><span>horas de formação</span></div>
    <div class="stat"><strong data-count="600">600</strong><span>horas de estágio (FCT)</span></div>
    <div class="stat"><strong data-count="10">10</strong><span>alunos na 1.ª turma concluída</span></div>
  </div>
</section>

<section class="alt">
  <div class="wrap grid-2">
    <div class="reveal">
      <h2>Apresentação do curso</h2>
      <p>O Técnico de Informática de Gestão é o profissional qualificado com uma formação abrangente em informática e gestão. Intervém na programação, desenvolvimento, instalação e manutenção de aplicações e no desenvolvimento e manutenção de bases de dados, com competências de gestão, apoio ao expediente e arquivo.</p>
      <p><a class="btn" href="curso.php">Saber mais</a></p>
    </div>
    <div class="card reveal">
      <h3>A quem se destina</h3>
      <p>A alunos que concluíram o 9.º ano e pretendem uma formação de nível secundário com vista à:</p>
      <ul class="ticks"><li>inserção no mundo do trabalho;</li><li>continuação de estudos em cursos TeSP (nível 5) ou no ensino superior, universitário ou politécnico.</li></ul>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="section-head"><h2>O que fazemos</h2><p>Áreas e competências desenvolvidas ao longo dos três anos.</p></div>
    <div class="grid-3">
      <?php foreach ([
        ['{ }','Programação','Aplicações de gestão com linguagens orientadas a objetos, procedimentais e visuais.'],
        ['SQL','Bases de dados','Instalar, configurar, desenvolver e manter bases de dados e acessos remotos.'],
        ['WEB','Tecnologias web','Desenvolver e manter servidores, páginas e sistemas de informação web.'],
        ['SO','Sistemas e redes','Instalar, configurar e manter sistemas operativos, software e políticas de segurança.'],
        ['ERP','Gestão e contabilidade','Faturação, stocks, contas correntes, salários, contabilidade e obrigações fiscais.'],
        ['RPT','Análise e relatórios','Analisar problemas, propor soluções e elaborar relatórios e mapas de gestão.'],
      ] as $c): ?>
      <article class="card reveal"><span class="ico"><?= e($c[0]) ?></span><h3><?= e($c[1]) ?></h3><p><?= e($c[2]) ?></p></article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="alt">
  <div class="wrap grid-2">
    <div class="reveal">
      <h2>Formação em Contexto de Trabalho</h2>
      <p>No 3.º ano, os alunos realizam 600 horas de formação em contexto de trabalho, em empresas e instituições, aplicando o que aprenderam.</p>
      <p><a class="btn ghost" href="fct-erasmus.php">FCT e Erasmus+</a></p>
    </div>
    <div class="reveal">
      <h2>Qualidade e Erasmus+</h2>
      <p>O agrupamento tem um sistema de garantia da qualidade alinhado com o Quadro EQAVET e candidata alunos dos cursos profissionais a mobilidades Erasmus+.</p>
      <p><a class="btn ghost" href="qualidade.php">Ver qualidade</a></p>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="section-head"><h2>Parcerias</h2><p>Empresas e instituições que recebem os nossos alunos.</p></div>
    <div class="logos">
      <?php for ($i = 1; $i <= 6; $i++): ?><div class="logo-slot"><mark class="ph">[PREENCHER: logótipo <?= $i ?>]</mark></div><?php endfor; ?>
    </div>
  </div>
</section>

<section class="alt">
  <div class="wrap">
    <div class="notice reveal">
      <strong>Candidaturas.</strong> Faz a pré-inscrição no formulário oficial do agrupamento ou contacta a secretaria.
      <p><a class="btn" href="candidaturas.php">Como me candidatar</a></p>
    </div>
  </div>
</section>
<?php page_end();
