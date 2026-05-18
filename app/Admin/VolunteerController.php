<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Core\Validation;
use App\Models\Volunteering;

class VolunteerController
{
    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $locale = \App\Helpers\Language::getLocale();
        $dir = \App\Helpers\Language::dir();
        $entries = Volunteering::findAll();

        $error = Session::flash('volunteer_error');
        $success = Session::flash('volunteer_success');

        ob_start();
        require __DIR__ . '/../../templates/admin/volunteer.php';
        $content = ob_get_clean();
        $title = 'Manage Volunteering';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function store(array $params = []): void
    {
        Auth::requireLogin();
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $data = [
            'title' => Validation::sanitize($_POST['title'] ?? ''),
            'organization' => Validation::sanitize($_POST['organization'] ?? ''),
            'description' => Validation::sanitize($_POST['description'] ?? ''),
            'place' => Validation::sanitize($_POST['place'] ?? ''),
            'start_date' => Validation::sanitize($_POST['start_date'] ?? ''),
            'end_date' => Validation::sanitize($_POST['end_date'] ?? ''),
            'link' => Validation::sanitize($_POST['link'] ?? ''),
            'sort_order' => (int) ($_POST['sort_order'] ?? 0),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if (empty($data['title'])) {
            Session::flash('volunteer_error', 'Title is required');
            header('Location: /admin/volunteering');
            exit;
        }

        Volunteering::create($data);
        Session::flash('volunteer_success', 'Volunteer entry created');
        header('Location: /admin/volunteering');
        exit;
    }

    public function update(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $data = [
            'title' => Validation::sanitize($_POST['title'] ?? ''),
            'organization' => Validation::sanitize($_POST['organization'] ?? ''),
            'description' => Validation::sanitize($_POST['description'] ?? ''),
            'place' => Validation::sanitize($_POST['place'] ?? ''),
            'start_date' => Validation::sanitize($_POST['start_date'] ?? ''),
            'end_date' => Validation::sanitize($_POST['end_date'] ?? ''),
            'link' => Validation::sanitize($_POST['link'] ?? ''),
            'sort_order' => (int) ($_POST['sort_order'] ?? 0),
        ];

        Volunteering::update($id, $data);
        Session::flash('volunteer_success', 'Volunteer entry updated');
        header('Location: /admin/volunteering');
        exit;
    }

    public function destroy(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        Volunteering::delete($id);
        Session::flash('volunteer_success', 'Volunteer entry deleted');
        header('Location: /admin/volunteering');
        exit;
    }
}
