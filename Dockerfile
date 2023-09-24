FROM php:8.0.27-apache

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

RUN docker-php-ext-install mysqli pdo pdo_mysql exif zip
RUN a2enmod rewrite

# Installation de Composer
# COPY --from=composer:2.6 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html/

# RUN composer install --no-dev --optimize-autoloader --no-interaction
