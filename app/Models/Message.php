<?php

namespace App\Models;

use App\Core\Database;

class Message
{
    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM messages WHERE id = ?", [$id]);
    }

    public static function findAll(): array
    {
        $db = Database::getInstance();
        return $db->fetchAll("SELECT * FROM messages ORDER BY created_at DESC");
    }

    public static function countUnread(): int
    {
        $db = Database::getInstance();
        $result = $db->fetch("SELECT COUNT(*) as count FROM messages WHERE is_read = FALSE");
        return (int) ($result['count'] ?? 0);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('messages', $data);
    }

    public static function markRead(int $id, int $userId): void
    {
        $db = Database::getInstance();
        $db->update('messages', [
            'is_read' => 'true',
            'read_by' => $userId,
            'read_at' => date('Y-m-d H:i:s'),
        ], 'id = ?', [$id]);
    }

    public static function delete(int $id): int
    {
        $db = Database::getInstance();
        return $db->delete('messages', 'id = ?', [$id]);
    }
}
