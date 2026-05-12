<?php

namespace App\Models;

use App\Core\Database;

class Media
{
    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM media WHERE id = ?", [$id]);
    }

    public static function findAll(int $page = 1, int $perPage = 20): array
    {
        $db = Database::getInstance();
        $offset = ($page - 1) * $perPage;
        return $db->fetchAll(
            "SELECT * FROM media ORDER BY created_at DESC LIMIT ? OFFSET ?",
            [$perPage, $offset]
        );
    }

    public static function countAll(): int
    {
        $db = Database::getInstance();
        $result = $db->fetch("SELECT COUNT(*) as count FROM media");
        return (int) ($result['count'] ?? 0);
    }

    public static function getRecent(int $limit = 5): array
    {
        $db = Database::getInstance();
        return $db->fetchAll(
            "SELECT * FROM media ORDER BY created_at DESC LIMIT ?",
            [$limit]
        );
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('media', $data);
    }

    public static function delete(int $id): int
    {
        $db = Database::getInstance();
        $media = self::findById($id);
        if ($media && file_exists($media['filepath'])) {
            unlink($media['filepath']);
        }
        return $db->delete('media', 'id = ?', [$id]);
    }
}
