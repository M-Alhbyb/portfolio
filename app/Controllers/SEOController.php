<?php

namespace App\Controllers;

use App\Core\Database;
use App\Helpers\Language;

class SEOController
{
    public function sitemap(array $params = []): void
    {
        $baseUrl = $this->getBaseUrl();
        $locale = Language::getLocale();
        $today = date('Y-m-d');

        header('Content-Type: application/xml; charset=utf-8');

        $db = Database::getInstance();

        $projects = $db->fetchAll(
            "SELECT slug, updated_at, published_at FROM projects WHERE status = 'published' ORDER BY sort_order ASC"
        );

        $posts = $db->fetchAll(
            "SELECT slug, updated_at, published_at FROM posts WHERE status = 'published' ORDER BY published_at DESC"
        );

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        $staticPages = [
            ['loc' => '', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => '/projects', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => '/blog', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => '/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            echo '  <url>' . "\n";
            echo '    <loc>' . htmlspecialchars($baseUrl . $page['loc']) . '</loc>' . "\n";
            echo '    <lastmod>' . $today . '</lastmod>' . "\n";
            echo '    <priority>' . $page['priority'] . '</priority>' . "\n";
            echo '    <changefreq>' . $page['changefreq'] . '</changefreq>' . "\n";
            echo '  </url>' . "\n";
        }

        foreach ($projects as $project) {
            $lastmod = $project['updated_at'] ?? $project['published_at'] ?? $today;
            echo '  <url>' . "\n";
            echo '    <loc>' . htmlspecialchars($baseUrl . '/projects/' . $project['slug']) . '</loc>' . "\n";
            echo '    <lastmod>' . date('Y-m-d', strtotime($lastmod)) . '</lastmod>' . "\n";
            echo '    <priority>0.8</priority>' . "\n";
            echo '    <changefreq>monthly</changefreq>' . "\n";
            echo '  </url>' . "\n";
        }

        foreach ($posts as $post) {
            $lastmod = $post['updated_at'] ?? $post['published_at'] ?? $today;
            echo '  <url>' . "\n";
            echo '    <loc>' . htmlspecialchars($baseUrl . '/blog/' . $post['slug']) . '</loc>' . "\n";
            echo '    <lastmod>' . date('Y-m-d', strtotime($lastmod)) . '</lastmod>' . "\n";
            echo '    <priority>0.7</priority>' . "\n";
            echo '    <changefreq>monthly</changefreq>' . "\n";
            echo '  </url>' . "\n";
        }

        echo '</urlset>' . "\n";
    }

    public function robots(array $params = []): void
    {
        $baseUrl = $this->getBaseUrl();
        header('Content-Type: text/plain; charset=utf-8');

        echo "User-agent: *\n";
        echo "Allow: /\n";
        echo "Disallow: /admin\n";
        echo "Disallow: /assets/\n";
        echo "Disallow: /uploads/\n";
        echo "Sitemap: {$baseUrl}/sitemap.xml\n";
    }

    private function getBaseUrl(): string
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        return $scheme . '://' . $host;
    }
}
