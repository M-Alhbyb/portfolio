<?php

namespace App\Models;

use App\Core\Database;

class Skill
{
    public static function findByCategory(string $category): array
    {
        $db = Database::getInstance();
        return $db->fetchAll(
            "SELECT * FROM skills WHERE category = ? ORDER BY sort_order ASC, name ASC",
            [$category]
        );
    }

    public static function findAll(): array
    {
        $db = Database::getInstance();
        return $db->fetchAll("SELECT * FROM skills ORDER BY category, sort_order ASC, name ASC");
    }

    public static function getCategories(): array
    {
        $db = Database::getInstance();
        return $db->fetchAll("SELECT DISTINCT category FROM skills ORDER BY category");
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM skills WHERE id = ?", [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('skills', $data);
    }

    public static function update(int $id, array $data): int
    {
        $db = Database::getInstance();
        return $db->update('skills', $data, 'id = ?', [$id]);
    }

    public static function delete(int $id): int
    {
        $db = Database::getInstance();
        return $db->delete('skills', 'id = ?', [$id]);
    }
}
