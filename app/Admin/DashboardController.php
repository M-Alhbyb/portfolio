<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Database;
use App\Models\Project;
use App\Models\Post;
use App\Models\Media;

class DashboardController
{
    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $locale = \App\Helpers\Language::getLocale();
        $dir = \App\Helpers\Language::dir();

        $totalProjects = 0;
        $totalPosts = 0;
        $unreadMessages = 0;
        $recentMedia = [];
        $db = Database::getInstance();

        try {
            $totalProjects = Project::countAll();
            $totalPosts = Post::countPublished();
            $result = $db->fetch("SELECT COUNT(*) as count FROM messages WHERE is_read = FALSE");
            $unreadMessages = (int) ($result['count'] ?? 0);
            $recentMedia = Media::getRecent(5);
        } catch (\Exception $e) {
        }

        $username = Auth::getUsername();

        ob_start();
        require __DIR__ . '/../../templates/admin/dashboard.php';
        $content = ob_get_clean();

        require __DIR__ . '/../../templates/layouts/admin.php';
    }
}
