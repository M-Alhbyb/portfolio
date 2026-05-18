<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Database;
use App\Models\Message;

class MessageController
{
    public function index(array $params = []): void
    {
        Auth::requireLogin();
        $locale = \App\Helpers\Language::getLocale();
        $dir = \App\Helpers\Language::dir();
        $db = Database::getInstance();
        $messages = $db->fetchAll("SELECT * FROM messages ORDER BY created_at DESC");

        ob_start();
        require __DIR__ . '/../../templates/admin/messages/index.php';
        $content = ob_get_clean();
        $title = 'Messages';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function show(array $params = []): void
    {
        Auth::requireLogin();
        $locale = \App\Helpers\Language::getLocale();
        $dir = \App\Helpers\Language::dir();
        $id = (int) ($params['id'] ?? 0);
        $db = Database::getInstance();
        $message = $db->fetch("SELECT * FROM messages WHERE id = ?", [$id]);
        if (!$message) { http_response_code(404); echo 'Message not found'; return; }

        ob_start();
        require __DIR__ . '/../../templates/admin/messages/show.php';
        $content = ob_get_clean();
        $title = 'Message Detail';
        require __DIR__ . '/../../templates/layouts/admin.php';
    }

    public function markRead(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        $db = Database::getInstance();
        $db->update('messages', [
            'is_read' => 'true',
            'read_by' => Auth::getUserId(),
            'read_at' => date('Y-m-d H:i:s'),
        ], 'id = ?', [$id]);

        header('Location: /admin/messages/' . $id);
        exit;
    }

    public function destroy(array $params = []): void
    {
        Auth::requireLogin();
        $id = (int) ($params['id'] ?? 0);
        $db = Database::getInstance();
        $db->delete('messages', 'id = ?', [$id]);
        header('Location: /admin/messages');
        exit;
    }
}
