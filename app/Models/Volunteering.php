<?php

namespace App\Models;

use App\Core\Database;

class Volunteering
{
    public static function findAll(?string $locale = null): array
    {
        $db = Database::getInstance();
        if ($locale) {
            return $db->fetchAll("SELECT * FROM volunteering WHERE locale = ? ORDER BY sort_order ASC, created_at DESC", [$locale]);
        }
        return $db->fetchAll("SELECT * FROM volunteering ORDER BY sort_order ASC, created_at DESC");
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM volunteering WHERE id = ?", [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('volunteering', $data);
    }

    public static function update(int $id, array $data): int
    {
        $db = Database::getInstance();
        return $db->update('volunteering', $data, 'id = ?', [$id]);
    }

    public static function delete(int $id): int
    {
        $db = Database::getInstance();
        return $db->delete('volunteering', 'id = ?', [$id]);
    }
}
