#!/bin/sh
set -e

# Generate .env from environment variables
cat > /app/config/.env << EOF
DB_DRIVER=pgsql
DB_HOST=${DB_HOST:-localhost}
DB_PORT=${DB_PORT:-5432}
DB_NAME=${DB_NAME:-portfolio}
DB_USER=${DB_USER:-portfolio}
DB_PASS=${DB_PASS:-}
APP_ENV=${APP_ENV:-production}
APP_DEBUG=${APP_DEBUG:-false}
SESSION_SECRET=${SESSION_SECRET:-}
EOF

# Wait for DB
echo "Waiting for PostgreSQL..."
until php -r "
    try {
        new PDO('pgsql:host=${DB_HOST:-localhost};port=${DB_PORT:-5432};dbname=${DB_NAME:-portfolio}', '${DB_USER:-portfolio}', '${DB_PASS:-}');
        echo 'ok';
    } catch (PDOException \$e) {
        exit(1);
    }
" 2>/dev/null; do
    sleep 1
done
echo "PostgreSQL ready."

exec "$@"
