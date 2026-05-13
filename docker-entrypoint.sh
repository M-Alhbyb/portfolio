#!/bin/bash
set -e

if [ ! -f /app/vendor/autoload.php ]; then
    echo "Installing PHP dependencies..."
    composer install --no-dev --optimize-autoloader
fi

cat > /app/config/.env << ENVEOF
DB_DRIVER=pgsql
DB_HOST=${DB_HOST:-db}
DB_PORT=${DB_PORT:-5432}
DB_NAME=${DB_NAME:-portfolio}
DB_USER=${DB_USER:-portfolio}
DB_PASS=${DB_PASS:-portfolio_secret}
APP_ENV=${APP_ENV:-production}
APP_DEBUG=${APP_DEBUG:-false}
SESSION_SECRET=${SESSION_SECRET:-}
ENVEOF

echo "Waiting for PostgreSQL..."
until php -r "
    try {
        new PDO('pgsql:host=${DB_HOST:-db};port=${DB_PORT:-5432};dbname=${DB_NAME:-portfolio}', '${DB_USER:-portfolio}', '${DB_PASS:-portfolio_secret}');
        echo 'ok';
    } catch (PDOException \$e) {
        exit(1);
    }
" 2>/dev/null; do
    sleep 1
done
echo "PostgreSQL ready."

exec "$@"