<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Database;
use App\Helpers\Export;
use App\Models\Timeline;
use App\Models\Skill;
use App\Models\Project;

class ExportController
{
    public function index(array $params = []): void
    {
        Auth::requireLogin();

        ob_start();
        require __DIR__ . '/../../templates/admin/export.php';
        $content = ob_get_clean();
        $title = 'Export Data';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function download(array $params = []): void
    {
        Auth::requireLogin();
        $type = $params['type'] ?? '';
        $format = $_GET['format'] ?? 'json';

        $data = $this->getExportData($type);
        if (empty($data)) {
            echo 'No data to export';
            return;
        }

        $filename = $type . '_export_' . date('Y-m-d') . ($format === 'csv' ? '.csv' : '.json');

        if ($format === 'csv') {
            Export::csv($data, $filename);
        } else {
            Export::json($data, $filename);
        }
    }

    public function cv(array $params = []): void
    {
        Auth::requireLogin();

        $db = Database::getInstance();

        $name = 'Mohamed Elhabib';
        $email = 'contact@elhabib.dev';
        $phone = '';
        $location = '';
        $github = 'https://github.com/mohamedelhabib';
        $linkedin = 'https://linkedin.com/in/mohamedelhabib';

        $siteSettings = $db->fetchAll("SELECT key, value FROM settings WHERE key IN ('site_title', 'social_github', 'social_linkedin', 'social_email')");
        $settingsMap = [];
        foreach ($siteSettings as $s) {
            $settingsMap[$s['key']] = $s['value'];
        }

        $summary = 'Architect, build, and deploy resilient systems. From bare metal to cloud-native, bridge the gap between development and infrastructure.';

        $experience = Timeline::findByType('experience');
        $education = Timeline::findByType('education');

        $allSkills = Skill::findAll();
        $groupedSkills = [];
        foreach ($allSkills as $skill) {
            $groupedSkills[$skill['category']][] = $skill;
        }

        $projects = Project::findFeatured(10);

        ob_start();
        require __DIR__ . '/../../templates/admin/cv-pdf.php';
        $html = ob_get_clean();

        require __DIR__ . '/../../vendor/autoload.php';

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($html);
        $dompdf->render();

        $dompdf->stream('cv_' . date('Y-m-d') . '.pdf', ['Attachment' => true]);
        exit;
    }

    private function getExportData(string $type): array
    {
        $db = Database::getInstance();

        return match ($type) {
            'projects' => $db->fetchAll("SELECT * FROM projects ORDER BY created_at DESC"),
            'posts' => $db->fetchAll("SELECT * FROM posts ORDER BY created_at DESC"),
            'skills' => $db->fetchAll("SELECT * FROM skills ORDER BY category, sort_order"),
            'messages' => $db->fetchAll("SELECT * FROM messages ORDER BY created_at DESC"),
            default => [],
        };
    }
}
