<?php
header('Content-Type: text/plain; charset=UTF-8');
require __DIR__ . '/inc/helpers.php';
$base = rtrim(cfg('base_url') ?: ((!empty($_SERVER['HTTPS']) ? 'https://' : 'http://') . ($_SERVER['HTTP_HOST'] ?? 'localhost')), '/');
echo "User-agent: *\nAllow: /\nDisallow: /storage/\nSitemap: $base/sitemap.xml\n";
