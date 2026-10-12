<?php
http_response_code(404);
require __DIR__ . '/inc/layout.php';
page_start(['title' => 'Página não encontrada']);
page_hero('Erro 404', 'Página não encontrada', 'A página que procuras não existe ou mudou de sítio.');
?>
<section><div class="wrap"><a class="btn" href="index.php">Voltar à Home</a></div></section>
<?php page_end();
