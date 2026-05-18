<?php

namespace App\Models;

use App\Core\Database;

class Language
{
    public static function findAll(?string $locale = null): array
    {
        $db = Database::getInstance();
        if ($locale) {
            return $db->fetchAll("SELECT * FROM languages WHERE locale = ? ORDER BY sort_order ASC, name ASC", [$locale]);
        }
        return $db->fetchAll("SELECT * FROM languages ORDER BY sort_order ASC, name ASC");
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM languages WHERE id = ?", [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('languages', $data);
    }

    public static function update(int $id, array $data): int
    {
        $db = Database::getInstance();
        return $db->update('languages', $data, 'id = ?', [$id]);
    }

    public static function delete(int $id): int
    {
        $db = Database::getInstance();
        return $db->delete('languages', 'id = ?', [$id]);
    }
}
