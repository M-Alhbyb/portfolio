<?php

namespace App\Models;

use App\Core\Database;

class Setting
{
    public static function get(string $key, ?string $default = null): ?string
    {
        $db = Database::getInstance();
        $result = $db->fetch("SELECT value FROM settings WHERE key = ?", [$key]);
        return $result['value'] ?? $default;
    }

    public static function set(string $key, string $value, string $group = 'general', string $locale = 'both'): void
    {
        $db = Database::getInstance();
        $existing = $db->fetch("SELECT id FROM settings WHERE key = ?", [$key]);

        if ($existing) {
            $db->update('settings', [
                'value' => $value,
                'group_name' => $group,
                'locale' => $locale,
                'updated_at' => date('Y-m-d H:i:s'),
            ], 'id = ?', [$existing['id']]);
        } else {
            $db->insert('settings', [
                'key' => $key,
                'value' => $value,
                'group_name' => $group,
                'locale' => $locale,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public static function getByGroup(string $group): array
    {
        $db = Database::getInstance();
        return $db->fetchAll(
            "SELECT * FROM settings WHERE group_name = ? ORDER BY key ASC",
            [$group]
        );
    }

    public static function getByGroupAndLocale(string $group, string $locale): array
    {
        $db = Database::getInstance();
        return $db->fetchAll(
            "SELECT * FROM settings WHERE group_name = ? AND (locale = ? OR locale = 'both') ORDER BY key ASC",
            [$group, $locale]
        );
    }

    public static function getAll(): array
    {
        $db = Database::getInstance();
        return $db->fetchAll("SELECT * FROM settings ORDER BY group_name, key");
    }

    public static function delete(string $key): void
    {
        $db = Database::getInstance();
        $db->delete('settings', 'key = ?', [$key]);
    }
}
