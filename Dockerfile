FROM php:8.3-cli
RUN apt-get update && apt-get install -y unzip git libzip-dev libsqlite3-dev \
 && docker-php-ext-install pdo pdo_sqlite \
 && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY . /app
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress \
 && php artisan config:cache || true \
 && php artisan route:cache || true \
 && php artisan view:cache || true
RUN mkdir -p storage \
 && touch storage/database.sqlite \
 && chmod -R 777 storage bootstrap/cache
EXPOSE 8080
CMD [ "bash", "-lc", "php artisan migrate --force && php -S 0.0.0.0:8080 -t public" ]
