<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Core\Validation;
use App\Models\Setting;

class SettingController
{
    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $settings = Setting::getAll();
        $groups = ['seo', 'homepage', 'social', 'general'];

        $success = Session::flash('settings_success');
        $error = Session::flash('settings_error');

        ob_start();
        require __DIR__ . '/../../templates/admin/settings.php';
        $content = ob_get_clean();
        $title = 'Settings';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function update(array $params = []): void
    {
        Auth::requireLogin();
        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF token');
        }

        $keys = $_POST['keys'] ?? [];
        $values = $_POST['values'] ?? [];
        $groups_input = $_POST['groups'] ?? [];
        $locales = $_POST['locales'] ?? [];

        try {
            foreach ($keys as $i => $key) {
                if (empty($key)) continue;
                $k = Validation::sanitize($key);
                $v = Validation::sanitize($values[$i] ?? '');
                $g = Validation::sanitize($groups_input[$i] ?? 'general');
                $l = in_array($locales[$i] ?? '', ['en', 'ar', 'both']) ? $locales[$i] : 'both';
                Setting::set($k, $v, $g, $l);
            }
            Session::flash('settings_success', 'Settings updated successfully');
        } catch (\Exception $e) {
            Session::flash('settings_error', 'Failed to update settings');
        }

        header('Location: /admin/settings');
        exit;
    }
}
