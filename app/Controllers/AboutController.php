<?php

namespace App\Controllers;

use App\Core\Database;
use App\Helpers\SEO;
use App\Helpers\Language;
use App\Models\Setting;
use App\Models\Language as LanguageModel;

class AboutController
{
    public function index(array $params = []): void
    {
        $seo = new SEO();
        $seo->setTitle('About - MohamedElhabib Mohamed')
            ->setDescription('Learn about MohamedElhabib Mohamed — engineering philosophy, infrastructure mindset, and professional journey.');

        $locale = Language::getLocale();
        $dir = Language::dir();

        $settings = [];
        $languages = [];
        try {
            $allSettings = Setting::getByGroupAndLocale('about', $locale);
            $socialSettings = Setting::getByGroupAndLocale('social', $locale);
            foreach (array_merge($allSettings, $socialSettings) as $s) {
                $settings[$s['key']] = $s['value'];
            }
            $languages = LanguageModel::findAll($locale);
        } catch (\Exception $e) {
            $settings = [];
            $languages = [];
        }

        ob_start();
        require __DIR__ . '/../../templates/pages/about.php';
        $content = ob_get_clean();

        $seo = $seo->render();
        require __DIR__ . '/../../templates/layouts/public.php';
    }
}
