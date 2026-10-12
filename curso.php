<?php
require __DIR__ . '/inc/layout.php';
page_start(['title' => 'O curso', 'desc' => 'Destinatários, competências, certificação e duração do Curso Profissional de Técnico de Informática de Gestão.']);
page_hero('Curso', cfg('nome_longo'), 'Formação de nível secundário com dupla certificação, em Cascais.');
?>
<section>
  <div class="wrap grid-2">
    <div>
      <h2>Perfil profissional</h2>
      <p>O Técnico de Informática de Gestão é o profissional qualificado com uma formação diversificada e abrangente nas áreas da informática e da gestão, dotado de competências de gestão, apoio ao expediente e arquivo e de informática, capaz de intervir ao nível da programação, desenvolvimento, instalação e manutenção de aplicações e desenvolvimento e manutenção de bases de dados.</p>
      <h2>A quem se destina</h2>
      <p>A alunos que tenham concluído o 9.º ano e pretendam uma formação de nível secundário com a perspetiva de inserção no mundo do trabalho ou de prosseguimento de estudos (cursos TeSP de nível 5 ou ensino superior universitário ou politécnico).</p>
    </div>
    <aside class="card">
      <h3>Em resumo</h3>
      <ul class="ticks">
        <li>Duração: 3 anos</li>
        <li>Formação: <?= (int)(function(){ $p = require __DIR__.'/data/plano.php'; return horas_ano($p,1)+horas_ano($p,2)+horas_ano($p,3); })() ?> horas (inclui 600 h de FCT)</li>
        <li>Nível secundário: 12.º ano de escolaridade</li>
        <li>Certificado Profissional Nível 4</li>
        <li>Regime diurno</li>
        <li>Em funcionamento desde <?= e(cfg('inicio_curso')) ?></li>
        <li>Vagas: sem limite definido; as candidaturas ficam abertas até a direção as encerrar</li>
      </ul>
      <a class="btn" href="plano.php">Ver plano de estudos</a>
    </aside>
  </div>
</section>
<section class="alt">
  <div class="wrap">
    <h2>Competências e principais atividades</h2>
    <ul class="ticks cols-list">
      <?php foreach ([
        'Instalar, configurar e efetuar a manutenção de diferentes sistemas operativos e de software de aplicação;',
        'Instalar, configurar, desenvolver e efetuar a manutenção de bases de dados;',
        'Avaliar e participar na escolha de utilitários, assim como nas políticas de segurança em sistemas informáticos;',
        'Desenvolver aplicações na área de gestão;',
        'Avaliar e participar na escolha de ferramentas de gestão;',
        'Analisar, testar e implementar ferramentas de gestão;',
        'Parametrizar e adequar, a necessidades específicas, ferramentas de gestão existentes;',
        'Analisar problemas e propor soluções adequadas aos meios existentes na empresa;',
        'Desenvolver módulos que complementem as aplicações de gestão, à medida das necessidades da empresa;',
        'Desenvolver, distribuir, instalar e efetuar a manutenção de aplicações informáticas, utilizando ambientes e linguagens de programação orientados a objetos, procedimentais e visuais;',
        'Desenvolver, instalar e manter servidores, páginas e sistemas de informação nas tecnologias web;',
        'Colaborar na gestão de meios humanos, materiais e financeiros;',
        'Participar na execução da contabilidade geral da empresa;',
        'Apoiar o processamento de salários;',
        'Utilizar aplicações de faturação, stocks, contas correntes, imobilizadas, contabilidade e salários;',
        'Participar na organização dos processos e procedimentos das obrigações fiscais;',
        'Participar nos processos e procedimentos referentes aos diversos regimes de proteção social;',
        'Apoiar o expediente e o arquivo;',
        'Participar na elaboração de relatórios e mapas de gestão.',
      ] as $c): ?><li><?= e($c) ?></li><?php endforeach; ?>
    </ul>
  </div>
</section>
<section>
  <div class="wrap">
    <h2>Certificação</h2>
    <p>Curso de nível secundário (12.º ano de escolaridade) com Certificado Profissional de Nível 4. Código da qualificação no Catálogo Nacional de Qualificações: <mark class="ph">[PREENCHER: código ANQEP]</mark></p>
    <p><a class="btn ghost" href="<?= e(cfg('video_url')) ?>" rel="noopener" target="_blank">Ver vídeo de apresentação<span class="sr"> (abre noutra janela)</span></a></p>
  </div>
</section>
<?php page_end();
