<?php

namespace App\Models;

use App\Core\Database;

class Tag
{
    public static function findAll(): array
    {
        $db = Database::getInstance();
        return $db->fetchAll("SELECT * FROM tags ORDER BY name ASC");
    }

    public static function findBySlug(string $slug): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM tags WHERE slug = ?", [$slug]);
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM tags WHERE id = ?", [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('tags', $data);
    }

    public static function update(int $id, array $data): void
    {
        $db = Database::getInstance();
        $db->update('tags', $data, 'id = ?', [$id]);
    }

    public static function delete(int $id): void
    {
        $db = Database::getInstance();
        $db->delete('tags', 'id = ?', [$id]);
    }

    public static function findByPostId(int $postId): array
    {
        $db = Database::getInstance();
        return $db->fetchAll(
            "SELECT t.* FROM tags t
             JOIN post_tags pt ON t.id = pt.tag_id
             WHERE pt.post_id = ?
             ORDER BY t.name ASC",
            [$postId]
        );
    }
}
