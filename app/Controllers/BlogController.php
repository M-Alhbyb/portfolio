<?php

namespace App\Controllers;

use App\Core\Database;
use App\Helpers\SEO;
use App\Helpers\Language;
use App\Helpers\Markdown;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class BlogController
{
    private const PER_PAGE = 9;

    public function index(array $params = []): void
    {
        $seo = new SEO();
        $seo->setTitle('Blog - MohamedElhabib Mohamed')
            ->setDescription('Engineering insights, tutorials, and thoughts from MohamedElhabib Mohamed.');

        $page = (int) ($_GET['page'] ?? 1);
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * self::PER_PAGE;

        $categorySlug = $_GET['category'] ?? '';
        $tagSlug = $_GET['tag'] ?? '';

        $db = Database::getInstance();
        $where = "WHERE p.status = 'published'";
        $params = [];
        $join = '';
        $groupBy = '';

        if ($categorySlug !== '') {
            $category = Category::findBySlug($categorySlug);
            if ($category) {
                $join .= " JOIN post_categories pc ON p.id = pc.post_id";
                $where .= " AND pc.category_id = ?";
                $params[] = $category['id'];
                $groupBy = " GROUP BY p.id";
            }
        }

        if ($tagSlug !== '') {
            $tag = Tag::findBySlug($tagSlug);
            if ($tag) {
                $join .= " JOIN post_tags pt ON p.id = pt.post_id";
                $where .= " AND pt.tag_id = ?";
                $params[] = $tag['id'];
                $groupBy = " GROUP BY p.id";
            }
        }

        $countSql = "SELECT COUNT(DISTINCT p.id) as count FROM posts p{$join} {$where}";
        $totalResult = $db->fetch($countSql, $params);
        $total = (int) ($totalResult['count'] ?? 0);
        $totalPages = max(1, (int) ceil($total / self::PER_PAGE));

        $postsSql = "SELECT p.* FROM posts p{$join} {$where}{$groupBy} ORDER BY p.published_at DESC LIMIT ? OFFSET ?";
        $queryParams = array_merge($params, [self::PER_PAGE, $offset]);
        $posts = $db->fetchAll($postsSql, $queryParams);

        $categories = Category::findAll();
        $tags = Tag::findAll();

        $locale = Language::getLocale();
        $dir = Language::dir();

        ob_start();
        require __DIR__ . '/../../templates/pages/blog.php';
        $content = ob_get_clean();

        $seo = $seo->render();
        require __DIR__ . '/../../templates/layouts/public.php';
    }

    public function show(array $params = []): void
    {
        $slug = $params['slug'] ?? '';
        $post = Post::findBySlug($slug);

        if (!$post) {
            http_response_code(404);
            require __DIR__ . '/../../templates/pages/404.php';
            return;
        }

        $seo = new SEO();
        $metaTitle = $post['meta_title'] ?: $post['title'];
        $metaDescription = $post['meta_description'] ?: ($post['excerpt'] ?: '');
        $seo->setTitle($metaTitle . ' - MohamedElhabib Mohamed')
            ->setDescription($metaDescription)
            ->setOgType('article');

        if ($post['og_image']) {
            $seo->setOgImage($post['og_image']);
        }
        if ($post['featured_image']) {
            $seo->setOgImage($post['featured_image']);
        }
        $seo->setCanonical('/blog/' . $post['slug']);

        $content = Markdown::render($post['content']);
        $categories = Category::findByPostId($post['id']);
        $tags = Tag::findByPostId($post['id']);

        $locale = Language::getLocale();
        $dir = Language::dir();

        ob_start();
        require __DIR__ . '/../../templates/pages/blog-post.php';
        $content = ob_get_clean();

        $seo = $seo->render();
        require __DIR__ . '/../../templates/layouts/public.php';
    }
}
