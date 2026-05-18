<?php

namespace App\Models;

use App\Core\Database;

class Post
{
    public static function findPublished(int $limit = 10, int $offset = 0, ?string $locale = null): array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM posts WHERE status = 'published'";
        $params = [$limit, $offset];
        if ($locale !== null) {
            $sql .= " AND locale = ?";
            array_splice($params, 0, 0, [$locale]);
        }
        $sql .= " ORDER BY published_at DESC LIMIT ? OFFSET ?";
        return $db->fetchAll($sql, $params);
    }

    public static function findRecent(int $limit = 3, ?string $locale = null): array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM posts WHERE status = 'published'";
        $params = [$limit];
        if ($locale !== null) {
            $sql .= " AND locale = ?";
            array_splice($params, 0, 0, [$locale]);
        }
        $sql .= " ORDER BY published_at DESC LIMIT ?";
        return $db->fetchAll($sql, $params);
    }

    public static function findBySlug(string $slug, ?string $locale = null): ?array
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM posts WHERE slug = ? AND status = 'published'";
        $params = [$slug];
        if ($locale !== null) {
            $sql .= " AND locale = ?";
            $params[] = $locale;
        }
        return $db->fetch($sql, $params);
    }

    public static function countPublished(?string $locale = null): int
    {
        $db = Database::getInstance();
        $sql = "SELECT COUNT(*) as count FROM posts WHERE status = 'published'";
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
        return $db->fetch("SELECT * FROM posts WHERE id = ?", [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('posts', $data);
    }

    public static function update(int $id, array $data): int
    {
        $db = Database::getInstance();
        return $db->update('posts', $data, 'id = ?', [$id]);
    }

    public static function delete(int $id): int
    {
        $db = Database::getInstance();
        return $db->delete('posts', 'id = ?', [$id]);
    }

    public static function syncCategories(int $postId, array $categoryIds): void
    {
        $db = Database::getInstance();
        $db->delete('post_categories', 'post_id = ?', [$postId]);
        foreach ($categoryIds as $catId) {
            $catId = (int) $catId;
            if ($catId > 0) {
                $db->insert('post_categories', ['post_id' => $postId, 'category_id' => $catId]);
            }
        }
    }

    public static function syncTags(int $postId, array $tagIds): void
    {
        $db = Database::getInstance();
        $db->delete('post_tags', 'post_id = ?', [$postId]);
        foreach ($tagIds as $tagId) {
            $tagId = (int) $tagId;
            if ($tagId > 0) {
                $db->insert('post_tags', ['post_id' => $postId, 'tag_id' => $tagId]);
            }
        }
    }
}
