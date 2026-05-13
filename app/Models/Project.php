<?php

namespace App\Models;

use App\Core\Database;

class Project
{
    public static function findFeatured(int $limit = 6): array
    {
        $db = Database::getInstance();
        return $db->fetchAll(
            "SELECT * FROM projects WHERE status = 'published' AND featured = TRUE ORDER BY sort_order ASC, created_at DESC LIMIT ?",
            [$limit]
        );
    }

    public static function findBySlug(string $slug): ?array
    {
        $db = Database::getInstance();
        return $db->fetch(
            "SELECT * FROM projects WHERE slug = ? AND status = 'published'",
            [$slug]
        );
    }

    public static function findAll(int $page = 1, int $perPage = 12): array
    {
        $db = Database::getInstance();
        $offset = ($page - 1) * $perPage;
        return $db->fetchAll(
            "SELECT * FROM projects WHERE status = 'published' ORDER BY sort_order ASC, created_at DESC LIMIT ? OFFSET ?",
            [$perPage, $offset]
        );
    }

    public static function countAll(): int
    {
        $db = Database::getInstance();
        $result = $db->fetch(
            "SELECT COUNT(*) as count FROM projects WHERE status = 'published'"
        );
        return (int) ($result['count'] ?? 0);
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM projects WHERE id = ?", [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('projects', $data);
    }

    public static function update(int $id, array $data): int
    {
        $db = Database::getInstance();
        return $db->update('projects', $data, 'id = ?', [$id]);
    }

    public static function delete(int $id): int
    {
        $db = Database::getInstance();
        return $db->delete('projects', 'id = ?', [$id]);
    }
}
