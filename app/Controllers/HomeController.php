<?php

namespace App\Controllers;

use App\Core\Database;
use App\Helpers\SEO;
use App\Helpers\Language;
use App\Models\Project;
use App\Models\Post;

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

        $timeline = $this->getTimeline();

        $contactInfo = $this->getContactInfo();

        $locale = Language::getLocale();
        $dir = Language::dir();

        ob_start();
        require __DIR__ . '/../../templates/pages/home.php';
        $content = ob_get_clean();

        $seo = $seo->render();

        require __DIR__ . '/../../templates/layouts/public.php';
    }

    private function getTimeline(): array
    {
        return [
            [
                'period' => '2024 - Present',
                'title' => 'Senior DevOps Engineer',
                'organization' => 'Leading Infrastructure & Automation',
                'type' => 'Experience',
                'description' => 'Architecting and managing cloud infrastructure, implementing CI/CD pipelines, and optimizing deployment workflows.',
            ],
            [
                'period' => '2022 - 2024',
                'title' => 'Full Stack Developer',
                'organization' => 'Building Scalable Applications',
                'type' => 'Experience',
                'description' => 'Developed and maintained full-stack web applications using modern technologies and best practices.',
            ],
            [
                'period' => '2020 - 2022',
                'title' => 'Systems Engineer',
                'organization' => 'Infrastructure & Operations',
                'type' => 'Experience',
                'description' => 'Managed server infrastructure, monitored system performance, and automated operational tasks.',
            ],
            [
                'period' => '2018 - 2020',
                'title' => 'Junior Developer',
                'organization' => 'Software Development',
                'type' => 'Experience',
                'description' => 'Contributed to feature development, wrote unit tests, and participated in code reviews.',
            ],
            [
                'period' => '2014 - 2018',
                'title' => 'B.Sc. Computer Engineering',
                'organization' => 'University',
                'type' => 'Education',
                'description' => 'Focused on software engineering, algorithms, and distributed systems.',
            ],
        ];
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
