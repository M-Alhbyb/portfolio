<?php

namespace App\Controllers;

use App\Core\Database;
use App\Helpers\SEO;
use App\Helpers\Language;
use App\Models\Project;
use App\Models\Post;
use App\Models\Timeline;

class HomeController
{
    public function index(array $params = []): void
    {
        $seo = new SEO();
        $seo->setTitle('Mohamed Elhabib - Engineering Portfolio')
            ->setDescription('Portfolio of Mohamed Elhabib, showcasing engineering projects, DevOps infrastructure, and technical expertise.');

        $featuredProjects = Project::findFeatured(6);
        $recentPosts = Post::findRecent(3);

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

        $experience = Timeline::findByType('experience');
        $education = Timeline::findByType('education');

        $contactInfo = $this->getContactInfo();

        $locale = Language::getLocale();
        $dir = Language::dir();

        ob_start();
        require __DIR__ . '/../../templates/pages/home.php';
        $content = ob_get_clean();

        $seo = $seo->render();

        require __DIR__ . '/../../templates/layouts/public.php';
    }

    private function getContactInfo(): array
    {
        return [
            'email' => 'contact@elhabib.dev',
            'github' => 'https://github.com/mohamedelhabib',
            'linkedin' => 'https://linkedin.com/in/mohamedelhabib',
            'whatsapp' => '+1234567890',
        ];
    }
}
