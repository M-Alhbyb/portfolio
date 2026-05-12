<?php

namespace App\Core;

class Auth
{
    private const IDLE_TIMEOUT = 1800;

    public static function isLoggedIn(): bool
    {
        if (Session::get('user_id') === null) {
            return false;
        }

        $lastActivity = Session::get('last_activity');
        if ($lastActivity !== null && (time() - $lastActivity) > self::IDLE_TIMEOUT) {
            self::logout();
            return false;
        }

        Session::set('last_activity', time());
        return true;
    }

    public static function requireLogin(): void
    {
        if (!self::isLoggedIn()) {
            header('Location: /admin/login');
            exit;
        }
    }

    public static function getUserId(): ?int
    {
        return Session::get('user_id');
    }

    public static function getUsername(): ?string
    {
        return Session::get('username');
    }

    public static function login(int $userId, string $username): void
    {
        Session::regenerate();
        Session::set('user_id', $userId);
        Session::set('username', $username);
        Session::set('last_activity', time());
    }

    public static function logout(): void
    {
        Session::destroy();
    }

    public static function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    }

    public static function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
