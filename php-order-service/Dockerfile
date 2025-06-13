FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    zip unzip sqlite3 libsqlite3-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader

COPY . .
RUN cp .env.example .env

RUN composer dump-autoload
RUN composer run-script post-autoload-dump || true

EXPOSE 8000
