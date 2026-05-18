<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Helpers\Language;
use App\Models\Media;

class MediaController
{
    private const ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/webp'];
    private const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'webp'];
    private const MAX_SIZE = 5 * 1024 * 1024;

    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $locale = \App\Helpers\Language::getLocale();
        $dir = \App\Helpers\Language::dir();
        $page = (int) ($_GET['page'] ?? 1);
        $mediaItems = Media::findAll($page);
        $total = Media::countAll();

        $error = Session::flash('media_error');
        $success = Session::flash('media_success');

        ob_start();
        require __DIR__ . '/../../templates/admin/media/index.php';
        $content = ob_get_clean();
        $title = 'Media Library';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function upload(array $params = []): void
    {
        Auth::requireLogin();

        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) {
            Session::flash('media_error', 'Invalid security token');
            header('Location: /admin/media');
            exit;
        }

        if (empty($_FILES['file'])) {
            Session::flash('media_error', 'No file uploaded');
            header('Location: /admin/media');
            exit;
        }

        $file = $_FILES['file'];
        $errors = $this->validateUpload($file);

        if (!empty($errors)) {
            Session::flash('media_error', implode(' ', $errors));
            header('Location: /admin/media');
            exit;
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $filename = uniqid('media_') . '.' . $ext;
        $filepath = 'uploads/' . $filename;
        $dest = __DIR__ . '/../../public/' . $filepath;

        if (!move_uploaded_file($file['tmp_name'], $dest)) {
            Session::flash('media_error', 'Failed to save file');
            header('Location: /admin/media');
            exit;
        }

        list($width, $height) = getimagesize($dest);

        $validatedMime = mime_content_type($dest);

        Media::create([
            'user_id' => Auth::getUserId(),
            'filename' => $file['name'],
            'filepath' => $filepath,
            'mime_type' => $validatedMime,
            'file_size' => $file['size'],
            'width' => $width,
            'height' => $height,
            'alt_text' => '',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        Session::flash('media_success', 'File uploaded successfully');
        header('Location: /admin/media');
        exit;
    }

    public function destroy(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        Media::delete($id);
        Session::flash('media_success', 'File deleted');
        header('Location: /admin/media');
        exit;
    }

    private function validateUpload(array $file): array
    {
        $errors = [];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = 'Upload failed with error code ' . $file['error'];
            return $errors;
        }

        if ($file['size'] > self::MAX_SIZE) {
            $errors[] = 'File exceeds maximum size of 5MB';
        }

        $mime = mime_content_type($file['tmp_name']);
        if (!in_array($mime, self::ALLOWED_TYPES)) {
            $errors[] = 'Invalid file type. Allowed: JPG, PNG, WebP';
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, self::ALLOWED_EXTENSIONS)) {
            $errors[] = 'Invalid file extension';
        }

        if (preg_match('/\.(php|phtml|php\d+|exe|sh|bat|cmd|pl|cgi|py|rb)$/i', $file['name'])) {
            $errors[] = 'Executable files are not allowed';
        }

        if (substr_count($ext, '.') > 1) {
            $errors[] = 'Double extensions are not allowed';
        }

        return $errors;
    }
}
