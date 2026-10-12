<?php
header('Content-Type: application/xml; charset=UTF-8');
require __DIR__ . '/inc/helpers.php';
$base = rtrim(cfg('base_url') ?: ((!empty($_SERVER['HTTPS']) ? 'https://' : 'http://') . ($_SERVER['HTTP_HOST'] ?? 'localhost')), '/');
$urls = [];
foreach (require __DIR__ . '/data/menu.php' as $it) { $urls[$it[1]] = 1; foreach ($it[3] ?? [] as $s) $urls[$s[1]] = 1; }
$urls['privacidade.php'] = 1;
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach (array_keys($urls) as $u) echo '  <url><loc>' . e($base . '/' . ($u === 'index.php' ? '' : $u)) . "</loc></url>\n";
echo '</urlset>';
