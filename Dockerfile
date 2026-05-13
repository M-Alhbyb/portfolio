# Build CSS
FROM node:20-alpine AS css-builder
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY tailwind.config.js ./
COPY public/assets/css/input.css ./public/assets/css/input.css
RUN npm run build:css

# PHP runtime (alpine, built-in server)
FROM php:8.4-cli-alpine

RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo_pgsql

COPY . /app
COPY --from=css-builder /app/public/assets/css/app.css /app/public/assets/css/app.css
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh && \
    mkdir -p /app/public/uploads

WORKDIR /app

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
