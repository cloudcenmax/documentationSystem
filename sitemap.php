<?php

include 'config.php';
include 'environment.php';

$articles = $database->select('posts', '*');

header('Content-Type: application/xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

foreach ($articles as $article) {
  echo '<url>' . PHP_EOL;
  echo '<loc>' . $baseUrl . '/article/' . $article['slug'] . '</loc>' . PHP_EOL;
  echo '<lastmod>' . date('c', strtotime($article['updated_at'])) . '</lastmod>' . PHP_EOL;
  echo '<changefreq>monthly</changefreq>' . PHP_EOL;
  echo '<priority>0.8</priority>' . PHP_EOL;
  echo '</url>' . PHP_EOL;
}

echo '</urlset>' . PHP_EOL;
