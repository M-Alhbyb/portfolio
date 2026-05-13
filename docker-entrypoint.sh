#!/bin/sh
set -e

# Install dompdf if not present
if [ ! -f /app/vendor/dompdf/src/Dompdf.php ]; then
    mkdir -p /app/vendor/dompdf /app/vendor/phenx /tmp/pdftmp
    echo "Installing dompdf..."
    curl -sL https://github.com/dompdf/dompdf/archive/v3.0.0.tar.gz -o /tmp/dompdf.tar.gz
    tar -xzf /tmp/dompdf.tar.gz -C /tmp/pdftmp
    cp -r /tmp/pdftmp/dompdf-3.0.0/lib/* /app/vendor/
    mkdir -p /app/vendor/dompdf/src && cp -r /tmp/pdftmp/dompdf-3.0.0/src/* /app/vendor/dompdf/src/
    curl -sL https://github.com/PhenX/php-svg-lib/archive/v0.5.tar.gz -o /tmp/svg.tar.gz
    tar -xzf /tmp/svg.tar.gz -C /tmp/pdftmp
    mkdir -p /app/vendor/phenx/php-svg-lib/src && cp -r /tmp/pdftmp/php-svg-lib-0.5/src/* /app/vendor/phenx/php-svg-lib/src/
    curl -sL https://github.com/PhenX/php-font-lib/archive/v0.5.1.tar.gz -o /tmp/font.tar.gz
    tar -xzf /tmp/font.tar.gz -C /tmp/pdftmp
    mkdir -p /app/vendor/phenx/php-font-lib/src && cp -r /tmp/pdftmp/php-font-lib-0.5.1/src/* /app/vendor/phenx/php-font-lib/src/
    rm -rf /tmp/dompdf.tar.gz /tmp/svg.tar.gz /tmp/font.tar.gz /tmp/pdftmp
    echo "dompdf installed."
fi

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