# Build CSS
FROM node:20-alpine AS css-builder
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY tailwind.config.js ./
COPY public/assets/css/input.css ./public/assets/css/input.css
COPY templates ./templates
COPY app ./app
RUN npm run build:css

# PHP runtime (alpine, built-in server)
FROM php:8.4-cli-alpine

RUN apk add --no-cache postgresql-dev libzip-dev unzip curl bash && \
    docker-php-ext-install pdo_pgsql && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=css-builder /app/public/assets/css/app.css /app/public/assets/css/app.css
COPY composer.json ./
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh && mkdir -p /app/public/uploads

WORKDIR /app

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]