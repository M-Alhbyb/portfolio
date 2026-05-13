<?php

$envFile = __DIR__ . '/../../config/.env';

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) {
            continue;
        }
        if (str_contains($line, '=')) {
            [$key, $value] = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

return [
    'env' => $_ENV['APP_ENV'] ?? 'production',
    'debug' => ($_ENV['APP_DEBUG'] ?? 'false') === 'true',
    'session_secret' => $_ENV['SESSION_SECRET'] ?? '',
    'name' => 'Elhabib Portfolio',
    'url' => $_ENV['APP_URL'] ?? 'https://portfolio.example.com',
];
