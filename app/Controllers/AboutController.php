<?php

namespace App\Controllers;

use App\Core\Database;
use App\Helpers\SEO;
use App\Helpers\Language;
use App\Models\Setting;

class AboutController
{
    public function index(array $params = []): void
    {
        $seo = new SEO();
        $seo->setTitle('About - Mohamed Elhabib')
            ->setDescription('Learn about Mohamed Elhabib — engineering philosophy, infrastructure mindset, and professional journey.');

        $settings = [];
        try {
            $db = Database::getInstance();
            $allSettings = $db->fetchAll("SELECT * FROM settings WHERE group_name = 'about' OR group_name = 'social'");
            foreach ($allSettings as $s) {
                $settings[$s['key']] = $s['value'];
            }
        } catch (\Exception $e) {
            $settings = [];
        }

        $locale = Language::getLocale();
        $dir = Language::dir();

        ob_start();
        require __DIR__ . '/../../templates/pages/about.php';
        $content = ob_get_clean();

        $seo = $seo->render();
        require __DIR__ . '/../../templates/layouts/public.php';
    }
}
