<?php

namespace App\Models;

use App\Core\Database;

class Project
{
    public static function findFeatured(int $limit = 6, ?string $locale = null): array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM projects WHERE status = 'published' AND featured = TRUE";
        $params = [$limit];
        if ($locale !== null) {
            $sql .= " AND locale = ?";
            array_splice($params, 0, 0, [$locale]);
        }
        $sql .= " ORDER BY sort_order ASC, created_at DESC LIMIT ?";
        return $db->fetchAll($sql, $params);
    }

    public static function findBySlug(string $slug, ?string $locale = null): ?array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM projects WHERE slug = ? AND status = 'published'";
        $params = [$slug];
        if ($locale !== null) {
            $sql .= " AND locale = ?";
            $params[] = $locale;
        }
        return $db->fetch($sql, $params);
    }

    public static function findAll(int $page = 1, int $perPage = 12, ?string $locale = null): array
    {
        $db = Database::getInstance();
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM projects WHERE status = 'published'";
        $params = [$perPage, $offset];
        if ($locale !== null) {
            $sql .= " AND locale = ?";
            array_splice($params, 0, 0, [$locale]);
        }
        $sql .= " ORDER BY sort_order ASC, created_at DESC LIMIT ? OFFSET ?";
        return $db->fetchAll($sql, $params);
    }

    public static function countAll(?string $locale = null): int
    {
        $db = Database::getInstance();
        $sql = "SELECT COUNT(*) as count FROM projects WHERE status = 'published'";
        $params = [];
        if ($locale !== null) {
            $sql .= " AND locale = ?";
            $params[] = $locale;
        }
        $result = $db->fetch($sql, $params);
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
