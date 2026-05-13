# Quickstart: Portfolio Website & CMS Dashboard

## Prerequisites

- PHP 8.1+
- PostgreSQL or MySQL
- Composer (optional, for any PHP dependencies)
- Node.js & npm (for TailwindCSS build)
- Nginx

## Installation

### 1. Clone & Configure

```bash
git clone <repo-url> portfolio
cd portfolio
cp config/.env.example config/.env
```

Edit `config/.env` with your database credentials and app settings:

```env
DB_DRIVER=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_NAME=portfolio
DB_USER=admin
DB_PASS=secure_password

APP_ENV=production
APP_DEBUG=false
SESSION_SECRET=generate_random_string
```

### 2. Database Setup

```bash
psql -U admin -d portfolio -f database/schema.sql
psql -U admin -d portfolio -f database/seed.sql
```

This creates all required tables and inserts a default admin user
(username: `admin`, password: set during first login setup).

### 3. Install Dependencies

```bash
# TailwindCSS build
npm install -D tailwindcss
npx tailwindcss -i ./public/assets/css/input.css -o ./public/assets/css/app.css --minify

# PHP dependencies (if any, via Composer)
composer install --no-dev
```

### 4. Nginx Configuration

Copy the provided Nginx config:

```bash
sudo cp config/nginx/portfolio.conf /etc/nginx/sites-available/portfolio
sudo ln -s /etc/nginx/sites-available/portfolio /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl reload nginx
```

### 5. File Permissions

```bash
chmod -R 755 public/uploads
chmod -R 755 public/assets
chown -R www-data:www-data public/uploads
```

### 6. Verify

Visit `https://your-domain.com/` to see the public site.
Visit `https://your-domain.com/admin` to access the CMS dashboard.

## Development Workflow

```bash
# Watch TailwindCSS for changes
npx tailwindcss -i ./public/assets/css/input.css -o ./public/assets/css/app.css --watch

# PHP built-in server (local testing)
php -S localhost:8000 -t public/
```

## Deployment

- Set `APP_ENV=production` and `APP_DEBUG=false`
- Enable HTTPS via Let's Encrypt Certbot
- Set up daily database backups via cron
- Configure PHP-FPM for optimal performance

```bash
# Example backup cron (daily at 3 AM)
0 3 * * * pg_dump portfolio > /backups/portfolio_$(date +\%Y\%m\%d).sql
```

## Directory Overview

```
public/          # Web root — Nginx serves from here
  index.php      # Front controller (all requests routed here)
  assets/        # Compiled CSS, JS, static images
  uploads/       # User-uploaded media
app/             # Application logic (not publicly accessible)
  Config/        # Database and app configuration
  Core/          # Router, Database, Auth, Session, Validation
  Controllers/   # Public page controllers
  Admin/         # Admin dashboard controllers
  Models/        # Data access layer
  Helpers/       # SEO, Markdown, i18n, Export utilities
templates/       # View templates (HTML with minimal PHP)
  layouts/       # Public and admin base layouts
  components/    # Reusable partials
  pages/         # Page-specific templates
  admin/         # Admin templates
database/        # Schema and seed SQL files
config/          # Environment and server configuration
```
