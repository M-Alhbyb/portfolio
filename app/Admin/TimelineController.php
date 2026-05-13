<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Core\Validation;
use App\Models\Timeline;

class TimelineController
{
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

        $data = [
            'type' => Validation::sanitize($_POST['type'] ?? ''),
            'period' => Validation::sanitize($_POST['period'] ?? ''),
            'title' => Validation::sanitize($_POST['title'] ?? ''),
            'organization' => Validation::sanitize($_POST['organization'] ?? ''),
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

        $data = [
            'type' => Validation::sanitize($_POST['type'] ?? ''),
            'period' => Validation::sanitize($_POST['period'] ?? ''),
            'title' => Validation::sanitize($_POST['title'] ?? ''),
            'organization' => Validation::sanitize($_POST['organization'] ?? ''),
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
        Timeline::delete($id);
        Session::flash('timeline_success', 'Timeline entry deleted');
        header('Location: /admin/timeline');
        exit;
    }
}
