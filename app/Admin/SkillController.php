<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Core\Validation;
use App\Models\Skill;

class SkillController
{
    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $locale = \App\Helpers\Language::getLocale();
        $dir = \App\Helpers\Language::dir();
        $skills = Skill::findAll();
        $categories = ['AI & Automation', 'Architecture & Concepts', 'Backend', 'Frontend', 'DevOps', 'Cloud', 'Database', 'Tools', 'Other'];

        $error = Session::flash('skill_error');
        $success = Session::flash('skill_success');

        ob_start();
        require __DIR__ . '/../../templates/admin/skills.php';
        $content = ob_get_clean();
        $title = 'Manage Skills';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function store(array $params = []): void
    {
        Auth::requireLogin();
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $data = [
            'name' => Validation::sanitize($_POST['name'] ?? ''),
            'category' => Validation::sanitize($_POST['category'] ?? ''),
            'proficiency' => min(100, max(1, (int) ($_POST['proficiency'] ?? 0))),
            'icon' => Validation::sanitize($_POST['icon'] ?? ''),
            'sort_order' => (int) ($_POST['sort_order'] ?? 0),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if (empty($data['name'])) {
            Session::flash('skill_error', 'Name is required');
            header('Location: /admin/skills');
            exit;
        }

        Skill::create($data);
        Session::flash('skill_success', 'Skill created');
        header('Location: /admin/skills');
        exit;
    }

    public function update(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) die('Invalid CSRF token');

        $data = [
            'name' => Validation::sanitize($_POST['name'] ?? ''),
            'category' => Validation::sanitize($_POST['category'] ?? ''),
            'proficiency' => min(100, max(1, (int) ($_POST['proficiency'] ?? 0))),
            'icon' => Validation::sanitize($_POST['icon'] ?? ''),
            'sort_order' => (int) ($_POST['sort_order'] ?? 0),
        ];

        Skill::update($id, $data);
        Session::flash('skill_success', 'Skill updated');
        header('Location: /admin/skills');
        exit;
    }

    public function destroy(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        Skill::delete($id);
        Session::flash('skill_success', 'Skill deleted');
        header('Location: /admin/skills');
        exit;
    }
}
