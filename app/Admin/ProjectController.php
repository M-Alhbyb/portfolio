<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Core\Validation;
use App\Models\Project;
use App\Models\ProjectImage;

class ProjectController
{
    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $locale = \App\Helpers\Language::getLocale();
        $dir = \App\Helpers\Language::dir();
        $projects = [];
        try {
            $db = \App\Core\Database::getInstance();
            $projects = $db->fetchAll("SELECT * FROM projects ORDER BY sort_order ASC, created_at DESC");
        } catch (\Exception $e) {}

        ob_start();
        require __DIR__ . '/../../templates/admin/projects/index.php';
        $content = ob_get_clean();
        $title = 'Manage Projects';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function create(array $params = []): void
    {
        Auth::requireLogin();
        $locale = \App\Helpers\Language::getLocale();
        $dir = \App\Helpers\Language::dir();
        $project = [];
        $errors = Session::flash('errors') ?? [];

        ob_start();
        require __DIR__ . '/../../templates/admin/projects/form.php';
        $content = ob_get_clean();
        $title = 'Create Project';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function store(array $params = []): void
    {
        Auth::requireLogin();
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF token');
        }

        $data = $this->sanitizeProjectData($_POST);
        $validator = new Validation();
        $rules = ['title' => 'required|max:200', 'short_description' => 'required', 'content' => 'required'];
        if (!$validator->validate($data, $rules)) {
            Session::flash('errors', $validator->getErrors());
            header('Location: /admin/projects/create');
            exit;
        }

        $data['user_id'] = Auth::getUserId();
        $data['slug'] = $data['slug'] ?: $this->slugify($data['title']);
        $data['tech_stack'] = !empty($data['tech_stack']) ? json_encode(explode(',', $data['tech_stack'])) : null;
        $data['featured'] = !empty($data['featured']) ? 'true' : 'false';
        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = date('Y-m-d H:i:s');
        }
        $data['created_at'] = date('Y-m-d H:i:s');

        $id = Project::create($data);

        $this->handleGallery($id);

        header('Location: /admin/projects');
        exit;
    }

    public function edit(array $params = []): void
    {
        Auth::requireLogin();
        $locale = \App\Helpers\Language::getLocale();
        $dir = \App\Helpers\Language::dir();
        $id = (int) ($params['id'] ?? 0);
        $project = Project::findById($id);
        if (!$project) { http_response_code(404); echo 'Project not found'; return; }

        $errors = Session::flash('errors') ?? [];
        $images = ProjectImage::findByProjectId($id);

        ob_start();
        require __DIR__ . '/../../templates/admin/projects/form.php';
        $content = ob_get_clean();
        $title = 'Edit Project';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function update(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF token');
        }

        $data = $this->sanitizeProjectData($_POST);
        $data['slug'] = $data['slug'] ?: $this->slugify($data['title']);
        $data['tech_stack'] = !empty($data['tech_stack']) ? json_encode(explode(',', $data['tech_stack'])) : null;
        $data['featured'] = !empty($data['featured']) ? 'true' : 'false';
        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = date('Y-m-d H:i:s');
        }
        $data['updated_at'] = date('Y-m-d H:i:s');

        Project::update($id, $data);
        $this->handleGallery($id);
        $this->updateExistingImages();

        header('Location: /admin/projects');
        exit;
    }

    public function destroy(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        ProjectImage::deleteByProjectId($id);
        Project::delete($id);
        header('Location: /admin/projects');
        exit;
    }

    private function sanitizeProjectData(array $input): array
    {
        return [
            'title' => Validation::sanitize($input['title'] ?? ''),
            'slug' => Validation::sanitize($input['slug'] ?? ''),
            'short_description' => Validation::sanitize($input['short_description'] ?? ''),
            'content' => $input['content'] ?? '',
            'tech_stack' => $input['tech_stack'] ?? '',
            'architecture_details' => $input['architecture_details'] ?? '',
            'deployment_notes' => $input['deployment_notes'] ?? '',
            'challenges' => $input['challenges'] ?? '',
            'outcomes' => $input['outcomes'] ?? '',
            'link' => Validation::sanitize($input['link'] ?? ''),
            'status' => in_array($input['status'] ?? '', ['draft', 'published']) ? $input['status'] : 'draft',
            'featured' => $input['featured'] ?? '',
            'sort_order' => (int) ($input['sort_order'] ?? 0),
            'locale' => in_array($input['locale'] ?? '', ['en', 'ar']) ? $input['locale'] : 'en',
        ];
    }

    private function handleGallery(int $projectId): void
    {
        if (empty($_FILES['gallery'])) return;
        $files = $_FILES['gallery'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
        $maxSize = 5 * 1024 * 1024;

        foreach ($files['tmp_name'] as $i => $tmp) {
            if ($files['error'][$i] !== UPLOAD_ERR_OK) continue;
            if ($files['size'][$i] > $maxSize) continue;
            $mime = mime_content_type($tmp);
            if (!in_array($mime, $allowedTypes)) continue;

            $ext = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
            $ext = strtolower($ext);
            if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) continue;

            $filename = uniqid('proj_') . '.' . $ext;
            $filepath = 'uploads/' . $filename;

            if (move_uploaded_file($tmp, __DIR__ . '/../../public/' . $filepath)) {
                ProjectImage::create([
                    'project_id' => $projectId,
                    'filename' => $files['name'][$i],
                    'filepath' => $filepath,
                    'mime_type' => $mime,
                    'file_size' => $files['size'][$i],
                    'alt_text' => '',
                    'sort_order' => $i,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }

    private function updateExistingImages(): void
    {
        if (empty($_POST['existing_images'])) return;

        foreach ($_POST['existing_images'] as $id => $data) {
            $id = (int) $id;
            if ($id <= 0) continue;
            ProjectImage::update($id, [
                'alt_text' => Validation::sanitize($data['alt_text'] ?? ''),
                'sort_order' => (int) ($data['sort_order'] ?? 0),
            ]);
        }
    }

    private function slugify(string $text): string
    {
        $text = preg_replace('/[^\p{L}\p{N}\s-]/u', '', $text);
        $text = preg_replace('/[\s-]+/', '-', $text);
        $text = trim($text, '-');
        return mb_strtolower($text);
    }
}
