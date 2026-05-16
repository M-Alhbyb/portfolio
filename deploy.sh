#!/bin/bash
set -e

cd "$(dirname "$0")"

echo "Pulling latest changes..."
git pull origin main

echo "Building and starting containers..."
docker compose build app
docker compose up -d --no-deps

echo "Waiting for app container to be ready..."
for i in $(seq 1 30); do
    if docker compose exec -T app php -r 'echo "ok\n";' 2>/dev/null; then
        break
    fi
    sleep 2
done

echo "Running database migrations if needed..."
docker compose exec -T app php -r "
\$pdo = new PDO('sqlite:/app/database/portfolio.sqlite');
\$pdo->exec('PRAGMA foreign_keys = ON');
\$tables = \$pdo->query(\"SELECT name FROM sqlite_master WHERE type='table'\")->fetchAll(PDO::FETCH_COLUMN);
if (!in_array('timeline', \$tables)) {
    \$sql = file_get_contents('/app/database/schema.sql');
    \$pdo->exec(\$sql);
} else {
    \$pdo->exec('ALTER TABLE timeline ADD COLUMN link TEXT DEFAULT NULL');
    \$pdo->exec('ALTER TABLE timeline ADD COLUMN logo TEXT DEFAULT NULL');
}
\$pdo->exec('ALTER TABLE projects ADD COLUMN link TEXT DEFAULT NULL');
if (!in_array('languages', \$tables)) {
    \$pdo->exec('CREATE TABLE IF NOT EXISTS languages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        proficiency TEXT NOT NULL,
        sort_order INTEGER DEFAULT 0,
        created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
    )');
    \$pdo->exec(\"INSERT OR IGNORE INTO languages (name, proficiency, sort_order) VALUES
        ('English', 'Fluent', 1),
        ('Arabic', 'Native', 2),
        ('French', 'Intermediate', 3)
    \");
}
if (!in_array('users', \$tables)) {
    \$sql = file_get_contents('/app/database/seed.sql');
    \$pdo->exec(\$sql);
}
"

echo "Clearing caches..."
docker compose exec -T app php -r "if (function_exists('opcache_reset')) opcache_reset();"

echo "Deployment complete."
