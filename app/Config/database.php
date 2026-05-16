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
    'driver' => $_ENV['DB_DRIVER'] ?? 'sqlite',
    'path' => $_ENV['DB_PATH'] ?? __DIR__ . '/../../database/portfolio.sqlite',
];
