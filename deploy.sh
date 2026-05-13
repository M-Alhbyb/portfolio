#!/bin/bash
set -e

cd "$(dirname "$0")"

echo "Pulling latest changes..."
git pull origin main

echo "Building and starting containers..."
docker compose build app
docker compose up -d --no-deps

echo "Running database migrations if needed..."
docker compose exec -T app php -r "
\$pdo = new PDO('pgsql:host=db,port=5432,dbname=portfolio', 'portfolio', 'portfolio_secret');
\$tables = \$pdo->query(\"SELECT tablename FROM pg_tables WHERE schemaname = 'public'\")->fetchAll(PDO::FETCH_COLUMN);
if (!in_array('timeline', \$tables)) {
    \$sql = file_get_contents('/app/database/schema.sql');
    \$pdo->exec(\$sql);
}
if (!in_array('users', \$tables)) {
    \$sql = file_get_contents('/app/database/seed.sql');
    \$pdo->exec(\$sql);
}
"

echo "Clearing caches..."
docker compose exec -T app php -r "if (function_exists('opcache_reset')) opcache_reset();"

echo "Deployment complete."