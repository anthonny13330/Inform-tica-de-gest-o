<?php
/**
 * Entrada única para alojamento na Vercel (em Apache/cPanel este ficheiro não é usado).
 * Só deixa abrir as páginas da lista abaixo; inc/ e data/ nunca ficam acessíveis.
 */
$root = dirname(__DIR__);
$path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/', '/');

$paginas = ['index','curso','plano','saidas','projetos','instalacoes','fct-erasmus','qualidade','candidaturas','contactos','privacidade','pesquisa','sitemap','robots'];

if ($path === 'sitemap.xml') $path = 'sitemap.php';
if ($path === 'robots.txt')  $path = 'robots.php';
if ($path === '' ) $path = 'index.php';

$nome = preg_replace('/\.php$/', '', $path);
if (in_array($nome, $paginas, true)) {
    $_SERVER['SCRIPT_NAME'] = '/' . $nome . '.php';
    require $root . '/' . $nome . '.php';
    return;
}
require $root . '/404.php';
