<?php

namespace App\Models;

use App\Core\Database;

class ProjectImage
{
    public static function findByProjectId(int $projectId): array
    {
        $db = Database::getInstance();
        return $db->fetchAll(
            "SELECT * FROM project_images WHERE project_id = ? ORDER BY sort_order ASC, id ASC",
            [$projectId]
        );
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM project_images WHERE id = ?", [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('project_images', $data);
    }

    public static function update(int $id, array $data): int
    {
        $db = Database::getInstance();
        return $db->update('project_images', $data, 'id = ?', [$id]);
    }

    public static function delete(int $id): int
    {
        $db = Database::getInstance();
        return $db->delete('project_images', 'id = ?', [$id]);
    }

    public static function deleteByProjectId(int $projectId): int
    {
        $db = Database::getInstance();
        return $db->delete('project_images', 'project_id = ?', [$projectId]);
    }
}
