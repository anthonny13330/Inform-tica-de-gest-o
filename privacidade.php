<?php
require __DIR__ . '/inc/layout.php';
page_start(['title' => 'Privacidade', 'desc' => 'Política de privacidade e cookies do site.']);
page_hero('Legal', 'Privacidade e cookies');
?>
<section><div class="wrap">
  <h2>Cookies</h2>
  <p>Este site não usa cookies de publicidade nem de análise. Usa apenas: um cookie de sessão técnico (proteção do formulário de contactos) e uma preferência de tema (claro/escuro) guardada no teu browser. Por isso não é necessário aviso de consentimento.</p>
  <h2>Formulário de contactos</h2>
  <p>Os dados enviados (nome, email, mensagem) servem apenas para responder ao teu pedido. Responsável pelo tratamento: <?= e(cfg('escola')) ?>. Contacto de proteção de dados: <mark class="ph">[PREENCHER: encarregado de proteção de dados / email]</mark></p>
  <h2>Serviços externos</h2>
  <p>As hiperligações para o formulário de pré-inscrição (Google Forms), mapa (OpenStreetMap) e redes sociais abrem em sites externos, com as suas próprias políticas.</p>
</div></section>
<?php page_end();
