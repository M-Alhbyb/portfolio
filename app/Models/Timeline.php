<?php

namespace App\Models;

use App\Core\Database;

class Timeline
{
    public static function findAll(?string $locale = null): array
    {
        $db = Database::getInstance();
        if ($locale) {
            return $db->fetchAll("SELECT * FROM timeline WHERE locale = ? ORDER BY sort_order ASC, created_at DESC", [$locale]);
        }
        return $db->fetchAll("SELECT * FROM timeline ORDER BY sort_order ASC, created_at DESC");
    }

    public static function findByType(string $type, ?string $locale = null): array
    {
        $db = Database::getInstance();
        if ($locale) {
            return $db->fetchAll(
                "SELECT * FROM timeline WHERE type = ? AND locale = ? ORDER BY sort_order ASC, created_at DESC",
                [$type, $locale]
            );
        }
        return $db->fetchAll(
            "SELECT * FROM timeline WHERE type = ? ORDER BY sort_order ASC, created_at DESC",
            [$type]
        );
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM timeline WHERE id = ?", [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('timeline', $data);
    }

    public static function update(int $id, array $data): int
    {
        $db = Database::getInstance();
        return $db->update('timeline', $data, 'id = ?', [$id]);
    }

    public static function delete(int $id): int
    {
        $db = Database::getInstance();
        return $db->delete('timeline', 'id = ?', [$id]);
    }
}
