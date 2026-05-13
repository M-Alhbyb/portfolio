<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Core\Validation;
use App\Models\Timeline;

class TimelineController
{
    private const LOGO_ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/webp'];
    private const LOGO_ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'webp'];
    private const LOGO_MAX_SIZE = 2 * 1024 * 1024;

    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $entries = Timeline::findAll();
        $error = Session::flash('timeline_error');
        $success = Session::flash('timeline_success');

        ob_start();
        require __DIR__ . '/../../templates/admin/timeline.php';
        $content = ob_get_clean();
        $title = 'Manage Timeline';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function store(array $params = []): void
    {
        Auth::requireLogin();
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $logo = '';
        if (!empty($_FILES['logo']) && $_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploaded = $this->handleLogoUpload($_FILES['logo']);
            if ($uploaded === null) {
                header('Location: /admin/timeline');
                exit;
            }
            $logo = $uploaded;
        }

        $data = [
            'type' => Validation::sanitize($_POST['type'] ?? ''),
            'period' => Validation::sanitize($_POST['period'] ?? ''),
            'title' => Validation::sanitize($_POST['title'] ?? ''),
            'organization' => Validation::sanitize($_POST['organization'] ?? ''),
            'link' => Validation::sanitize($_POST['link'] ?? ''),
            'logo' => $logo,
            'description' => Validation::sanitize($_POST['description'] ?? ''),
            'sort_order' => (int) ($_POST['sort_order'] ?? 0),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if (empty($data['title'])) {
            Session::flash('timeline_error', 'Title is required');
            header('Location: /admin/timeline');
            exit;
        }

        Timeline::create($data);
        Session::flash('timeline_success', 'Timeline entry created');
        header('Location: /admin/timeline');
        exit;
    }

    public function update(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $entry = Timeline::findById($id);
        $logo = $entry['logo'] ?? '';

        if (!empty($_POST['remove_logo'])) {
            if ($logo && str_starts_with($logo, 'uploads/')) {
                $oldPath = __DIR__ . '/../../public/' . $logo;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $logo = '';
        } elseif (!empty($_FILES['logo']) && $_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploaded = $this->handleLogoUpload($_FILES['logo']);
            if ($uploaded === null) {
                header('Location: /admin/timeline');
                exit;
            }
            if ($logo && str_starts_with($logo, 'uploads/')) {
                $oldPath = __DIR__ . '/../../public/' . $logo;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $logo = $uploaded;
        }

        $data = [
            'type' => Validation::sanitize($_POST['type'] ?? ''),
            'period' => Validation::sanitize($_POST['period'] ?? ''),
            'title' => Validation::sanitize($_POST['title'] ?? ''),
            'organization' => Validation::sanitize($_POST['organization'] ?? ''),
            'link' => Validation::sanitize($_POST['link'] ?? ''),
            'logo' => $logo,
            'description' => Validation::sanitize($_POST['description'] ?? ''),
            'sort_order' => (int) ($_POST['sort_order'] ?? 0),
        ];

        Timeline::update($id, $data);
        Session::flash('timeline_success', 'Timeline entry updated');
        header('Location: /admin/timeline');
        exit;
    }

    public function destroy(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);

        $entry = Timeline::findById($id);
        if ($entry && !empty($entry['logo']) && str_starts_with($entry['logo'], 'uploads/')) {
            $path = __DIR__ . '/../../public/' . $entry['logo'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        Timeline::delete($id);
        Session::flash('timeline_success', 'Timeline entry deleted');
        header('Location: /admin/timeline');
        exit;
    }

    private function handleLogoUpload(array $file): ?string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            Session::flash('timeline_error', 'Logo upload failed');
            return null;
        }

        if ($file['size'] > self::LOGO_MAX_SIZE) {
            Session::flash('timeline_error', 'Logo exceeds 2MB maximum size');
            return null;
        }

        $mime = mime_content_type($file['tmp_name']);
        if (!in_array($mime, self::LOGO_ALLOWED_TYPES)) {
            Session::flash('timeline_error', 'Logo must be JPG, PNG, or WebP');
            return null;
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, self::LOGO_ALLOWED_EXTENSIONS)) {
            Session::flash('timeline_error', 'Invalid logo file extension');
            return null;
        }

        $filename = uniqid('timeline_') . '.' . $ext;
        $filepath = 'uploads/' . $filename;
        $dest = __DIR__ . '/../../public/' . $filepath;

        if (!move_uploaded_file($file['tmp_name'], $dest)) {
            Session::flash('timeline_error', 'Failed to save logo');
            return null;
        }

        return $filepath;
    }
}
