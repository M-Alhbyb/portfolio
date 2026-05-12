<?php

namespace App\Controllers;

use App\Helpers\SEO;
use App\Helpers\Language;
use App\Models\Project;
use App\Models\ProjectImage;

class ProjectController
{
    public function index(array $params = []): void
    {
        $seo = new SEO();
        $seo->setTitle('Projects - Mohamed Elhabib')
            ->setDescription('Engineering case studies showcasing architecture, implementation, and deployment.');

        $page = (int) ($_GET['page'] ?? 1);
        $projects = Project::findAll($page);
        $total = Project::countAll();

        $locale = Language::getLocale();
        $dir = Language::dir();

        ob_start();
        require __DIR__ . '/../../templates/pages/projects.php';
        $content = ob_get_clean();

        $seo = $seo->render();
        require __DIR__ . '/../../templates/layouts/public.php';
    }

    public function show(array $params = []): void
    {
        $slug = $params['slug'] ?? '';
        $project = Project::findBySlug($slug);

        if (!$project) {
            http_response_code(404);
            require __DIR__ . '/../../templates/pages/404.php';
            return;
        }

        $seo = new SEO();
        $seo->setTitle($project['title'] . ' - Mohamed Elhabib')
            ->setDescription($project['short_description'] ?? '')
            ->setOgType('article');

        $images = ProjectImage::findByProjectId($project['id']);
        $techStack = !empty($project['tech_stack']) ? json_decode($project['tech_stack'], true) : [];

        $locale = Language::getLocale();
        $dir = Language::dir();

        ob_start();
        require __DIR__ . '/../../templates/pages/project-detail.php';
        $content = ob_get_clean();

        $seo = $seo->render();
        require __DIR__ . '/../../templates/layouts/public.php';
    }
}
