<?php

namespace App\Models;

use App\Core\Database;

class Category
{
    public static function findAll(): array
    {
        $db = Database::getInstance();
        return $db->fetchAll("SELECT * FROM categories ORDER BY name ASC");
    }

    public static function findBySlug(string $slug): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM categories WHERE slug = ?", [$slug]);
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM categories WHERE id = ?", [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('categories', $data);
    }

    public static function update(int $id, array $data): void
    {
        $db = Database::getInstance();
        $db->update('categories', $data, 'id = ?', [$id]);
    }

    public static function delete(int $id): void
    {
        $db = Database::getInstance();
        $db->delete('categories', 'id = ?', [$id]);
    }

    public static function findByPostId(int $postId): array
    {
        $db = Database::getInstance();
        return $db->fetchAll(
            "SELECT c.* FROM categories c
             JOIN post_categories pc ON c.id = pc.category_id
             WHERE pc.post_id = ?
             ORDER BY c.name ASC",
            [$postId]
        );
    }

    public static function countByPostId(int $postId): int
    {
        $db = Database::getInstance();
        $result = $db->fetch(
            "SELECT COUNT(*) as count FROM post_categories WHERE post_id = ?",
            [$postId]
        );
        return (int) ($result['count'] ?? 0);
    }
}
