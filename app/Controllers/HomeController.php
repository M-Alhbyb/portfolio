<?php

namespace App\Controllers;

use App\Core\Database;
use App\Helpers\SEO;
use App\Helpers\Language;
use App\Models\Project;
use App\Models\Post;
use App\Models\Timeline;
use App\Models\Language as LanguageModel;

class HomeController
{
    public function index(array $params = []): void
    {
        $seo = new SEO();
        $seo->setTitle('MohamedElhabib Mohamed - Full Stack & AI Developer')
            ->setDescription('Portfolio of MohamedElhabib Mohamed, showcasing full-stack web development projects, AI solutions, and technical expertise.');

        $locale = Language::getLocale();
        $dir = Language::dir();

        $featuredProjects = Project::findFeatured(6, $locale);
        $recentPosts = Post::findRecent(3, $locale);

        $skills = [];
        try {
            $db = Database::getInstance();
            $skills = $db->fetchAll("SELECT * FROM skills ORDER BY category, sort_order ASC");
        } catch (\Exception $e) {
            $skills = [];
        }

        $groupedSkills = [];
        foreach ($skills as $skill) {
            $groupedSkills[$skill['category']][] = $skill;
        }

        $languages = LanguageModel::findAll();
        $experience = Timeline::findByType('experience');
        $education = Timeline::findByType('education');

        $volunteering = [];
        try {
            $db = Database::getInstance();
            $volunteering = $db->fetchAll("SELECT * FROM volunteering ORDER BY sort_order ASC, created_at DESC");
        } catch (\Exception $e) {
            $volunteering = [];
        }

        $contactInfo = $this->getContactInfo();

        ob_start();
        require __DIR__ . '/../../templates/pages/home.php';
        $content = ob_get_clean();

        $seo = $seo->render();

        require __DIR__ . '/../../templates/layouts/public.php';
    }

    private function getContactInfo(): array
    {
        return [
            'email' => 'mohammedalhbyb@gmail.com',
            'github' => 'https://github.com/M-Alhbyb',
            'linkedin' => 'https://linkedin.com/in/m-elhabib',
            'whatsapp' => 'wa.me/249111696468',
        ];
    }
}
