#!/bin/bash
set -e

mkdir -p /app/config /app/database

cat > /app/config/.env << ENVEOF
DB_DRIVER=sqlite
DB_PATH=/app/database/portfolio.sqlite
APP_ENV=${APP_ENV:-production}
APP_DEBUG=${APP_DEBUG:-false}
SESSION_SECRET=${SESSION_SECRET:-}
ENVEOF

# Initialize schema if database doesn't exist
if [ ! -f /app/database/portfolio.sqlite ]; then
    echo "Initializing SQLite database..."
    php -r "
        \$pdo = new PDO('sqlite:/app/database/portfolio.sqlite');
        \$pdo->exec('PRAGMA journal_mode=WAL');
        \$pdo->exec('PRAGMA foreign_keys=ON');
        \$sql = file_get_contents('/app/database/schema.sql');
        \$pdo->exec(\$sql);
        \$seed = file_get_contents('/app/database/seed.sql');
        \$pdo->exec(\$seed);
    "
    echo "Database initialized with schema and seed data."
fi

exec "$@"
