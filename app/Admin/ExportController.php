<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Database;
use App\Helpers\Export;

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
