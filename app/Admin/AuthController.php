<?php

namespace App\Admin;

use App\Core\Auth;
use App\Core\Session;
use App\Core\Validation;
use App\Models\User;

class AuthController
{
    public function login(array $params = []): void
    {
        if (Auth::isLoggedIn()) {
            header('Location: /admin');
            exit;
        }

        $error = Session::flash('login_error');

        require __DIR__ . '/../../templates/admin/login.php';
    }

    public function authenticate(array $params = []): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /admin/login');
            exit;
        }

        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) {
            Session::flash('login_error', 'Invalid security token. Please try again.');
            header('Location: /admin/login');
            exit;
        }

        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        if ($this->isLockedOut($ip)) {
            Session::flash('login_error', 'Account temporarily locked. Try again in 15 minutes.');
            header('Location: /admin/login');
            exit;
        }

        $validator = new Validation();
        if (!$validator->validate($_POST, [
            'username' => 'required|max:50',
            'password' => 'required|max:255',
        ])) {
            Session::flash('login_error', $validator->getFirstError());
            header('Location: /admin/login');
            exit;
        }

        $username = Validation::sanitize($_POST['username']);
        $password = $_POST['password'];

        $user = User::verifyPassword($username, $password);

        if (!$user) {
            $this->recordFailedAttempt($ip);
            $attempts = $this->getFailedAttempts($ip);
            $remaining = 5 - $attempts;
            $msg = $remaining > 0
                ? "Invalid username or password. {$remaining} attempt(s) remaining."
                : 'Account temporarily locked. Try again in 15 minutes.';
            Session::flash('login_error', $msg);
            header('Location: /admin/login');
            exit;
        }

        $this->clearFailedAttempts($ip);

        Auth::login($user['id'], $user['username']);
        User::updateLastLogin($user['id']);

        header('Location: /admin');
        exit;
    }

    public function logout(array $params = []): void
    {
        Auth::logout();
        header('Location: /admin/login');
        exit;
    }

    private function isLockedOut(string $ip): bool
    {
        $attempts = Session::get('login_attempts_' . $ip, []);
        if (empty($attempts)) {
            return false;
        }

        $recent = array_filter($attempts, fn($t) => $t > (time() - 900));
        if (count($recent) >= 5) {
            return true;
        }

        return false;
    }

    private function recordFailedAttempt(string $ip): void
    {
        $attempts = Session::get('login_attempts_' . $ip, []);
        $attempts[] = time();
        $attempts = array_filter($attempts, fn($t) => $t > (time() - 900));
        Session::set('login_attempts_' . $ip, $attempts);
    }

    private function getFailedAttempts(string $ip): int
    {
        $attempts = Session::get('login_attempts_' . $ip, []);
        $recent = array_filter($attempts, fn($t) => $t > (time() - 900));
        return count($recent);
    }

    private function clearFailedAttempts(string $ip): void
    {
        Session::remove('login_attempts_' . $ip);
    }
}
