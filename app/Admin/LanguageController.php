<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Core\Validation;
use App\Models\Language;

class LanguageController
{
    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $languages = Language::findAll();

        $error = Session::flash('language_error');
        $success = Session::flash('language_success');

        ob_start();
        require __DIR__ . '/../../templates/admin/languages.php';
        $content = ob_get_clean();
        $title = 'Manage Languages';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function store(array $params = []): void
    {
        Auth::requireLogin();
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $data = [
            'name' => Validation::sanitize($_POST['name'] ?? ''),
            'proficiency' => min(100, max(1, (int) ($_POST['proficiency'] ?? 0))),
            'sort_order' => (int) ($_POST['sort_order'] ?? 0),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if (empty($data['name'])) {
            Session::flash('language_error', 'Name is required');
            header('Location: /admin/languages');
            exit;
        }

        Language::create($data);
        Session::flash('language_success', 'Language created');
        header('Location: /admin/languages');
        exit;
    }

    public function update(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $data = [
            'name' => Validation::sanitize($_POST['name'] ?? ''),
            'proficiency' => min(100, max(1, (int) ($_POST['proficiency'] ?? 0))),
            'sort_order' => (int) ($_POST['sort_order'] ?? 0),
        ];

        Language::update($id, $data);
        Session::flash('language_success', 'Language updated');
        header('Location: /admin/languages');
        exit;
    }

    public function destroy(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        Language::delete($id);
        Session::flash('language_success', 'Language deleted');
        header('Location: /admin/languages');
        exit;
    }
}
