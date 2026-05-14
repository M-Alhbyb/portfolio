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
\$pdo = new PDO('pgsql:host=db;port=5432;dbname=portfolio', 'portfolio', 'portfolio_secret');
\$tables = \$pdo->query(\"SELECT tablename FROM pg_tables WHERE schemaname = 'public'\")->fetchAll(PDO::FETCH_COLUMN);
if (!in_array('timeline', \$tables)) {
    \$sql = file_get_contents('/app/database/schema.sql');
    \$pdo->exec(\$sql);
} else {
    // Add missing columns if schema was updated
    \$pdo->exec(\"ALTER TABLE timeline ADD COLUMN IF NOT EXISTS link VARCHAR(255)\");
    \$pdo->exec(\"ALTER TABLE timeline ADD COLUMN IF NOT EXISTS logo VARCHAR(255)\");
}
if (!in_array('languages', \$tables)) {
    \$pdo->exec(\"CREATE TABLE IF NOT EXISTS languages (
        id SERIAL PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        proficiency INTEGER NOT NULL CHECK (proficiency >= 1 AND proficiency <= 100),
        sort_order INTEGER DEFAULT 0,
        created_at TIMESTAMP NOT NULL DEFAULT NOW()
    )\");
    \$pdo->exec(\"INSERT INTO languages (name, proficiency, sort_order) VALUES
        ('English', 95, 1),
        ('Arabic', 100, 2),
        ('French', 60, 3)
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