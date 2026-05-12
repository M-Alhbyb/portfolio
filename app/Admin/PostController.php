<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Core\Validation;
use App\Models\Post;

class PostController
{
    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $posts = [];
        try {
            $db = \App\Core\Database::getInstance();
            $posts = $db->fetchAll("SELECT * FROM posts ORDER BY created_at DESC");
        } catch (\Exception $e) {}

        ob_start();
        require __DIR__ . '/../../templates/admin/posts/index.php';
        $content = ob_get_clean();
        $title = 'Manage Posts';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function create(array $params = []): void
    {
        Auth::requireLogin();
        $post = [];
        $errors = Session::flash('errors') ?? [];
        $categories = \App\Models\Category::findAll();
        $tags = \App\Models\Tag::findAll();
        $selectedCategories = [];
        $selectedTags = [];

        ob_start();
        require __DIR__ . '/../../templates/admin/posts/form.php';
        $content = ob_get_clean();
        $title = 'Create Post';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function store(array $params = []): void
    {
        Auth::requireLogin();
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $data = $this->sanitizePostData($_POST);
        $validator = new Validation();
        if (!$validator->validate($data, ['title' => 'required|max:200', 'content' => 'required'])) {
            Session::flash('errors', $validator->getErrors());
            header('Location: /admin/posts/create');
            exit;
        }

        $data['user_id'] = Auth::getUserId();
        $data['slug'] = $data['slug'] ?: $this->slugify($data['title']);
        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = date('Y-m-d H:i:s');
        }
        $data['created_at'] = date('Y-m-d H:i:s');

        $postId = Post::create($data);

        $categoryIds = $_POST['category_ids'] ?? [];
        if (!empty($categoryIds)) {
            Post::syncCategories($postId, (array) $categoryIds);
        }
        $tagIds = $_POST['tag_ids'] ?? [];
        if (!empty($tagIds)) {
            Post::syncTags($postId, (array) $tagIds);
        }

        header('Location: /admin/posts');
        exit;
    }

    public function edit(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        $post = Post::findById($id);
        if (!$post) { http_response_code(404); echo 'Post not found'; return; }
        $errors = Session::flash('errors') ?? [];
        $categories = \App\Models\Category::findAll();
        $tags = \App\Models\Tag::findAll();
        $selectedCategories = \App\Models\Category::findByPostId($id);
        $selectedTags = \App\Models\Tag::findByPostId($id);

        ob_start();
        require __DIR__ . '/../../templates/admin/posts/form.php';
        $content = ob_get_clean();
        $title = 'Edit Post';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function update(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $data = $this->sanitizePostData($_POST);
        $data['slug'] = $data['slug'] ?: $this->slugify($data['title']);
        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = date('Y-m-d H:i:s');
        }
        $data['updated_at'] = date('Y-m-d H:i:s');

        Post::update($id, $data);

        $categoryIds = $_POST['category_ids'] ?? [];
        Post::syncCategories($id, (array) $categoryIds);
        $tagIds = $_POST['tag_ids'] ?? [];
        Post::syncTags($id, (array) $tagIds);

        header('Location: /admin/posts');
        exit;
    }

    public function destroy(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        Post::delete($id);
        header('Location: /admin/posts');
        exit;
    }

    private function sanitizePostData(array $input): array
    {
        return [
            'title' => Validation::sanitize($input['title'] ?? ''),
            'slug' => Validation::sanitize($input['slug'] ?? ''),
            'content' => $input['content'] ?? '',
            'excerpt' => Validation::sanitize($input['excerpt'] ?? ''),
            'status' => in_array($input['status'] ?? '', ['draft', 'published']) ? $input['status'] : 'draft',
            'meta_title' => Validation::sanitize($input['meta_title'] ?? ''),
            'meta_description' => Validation::sanitize($input['meta_description'] ?? ''),
            'locale' => in_array($input['locale'] ?? '', ['en', 'ar']) ? $input['locale'] : 'en',
        ];
    }

    private function slugify(string $text): string
    {
        $text = preg_replace('/[^\p{L}\p{N}\s-]/u', '', $text);
        $text = preg_replace('/[\s-]+/', '-', $text);
        $text = trim($text, '-');
        return mb_strtolower($text);
    }
}
