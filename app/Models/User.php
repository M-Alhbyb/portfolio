<?php

namespace App\Models;

use App\Core\Database;
use App\Core\Auth;

class User
{
    public static function findByUsername(string $username): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM users WHERE username = ?", [$username]);
    }

    public static function findByEmail(string $email): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM users WHERE email = ?", [$email]);
    }

    public static function findById(int $id): ?array
    {
        $db = Database::getInstance();
        return $db->fetch("SELECT * FROM users WHERE id = ?", [$id]);
    }

    public static function verifyPassword(string $username, string $password): ?array
    {
        $user = self::findByUsername($username);
        if (!$user) {
            return null;
        }
        if (!Auth::verifyPassword($password, $user['password_hash'])) {
            return null;
        }
        return $user;
    }

    public static function updateLastLogin(int $id): void
    {
        $db = Database::getInstance();
        $db->update('users', ['last_login' => date('Y-m-d H:i:s')], 'id = ?', [$id]);
    }

    public static function create(array $data): int
    {
        $db = Database::getInstance();
        return $db->insert('users', $data);
    }

    public static function update(int $id, array $data): int
    {
        $db = Database::getInstance();
        return $db->update('users', $data, 'id = ?', [$id]);
    }
}
