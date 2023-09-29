FROM php:8.0.27-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

RUN docker-php-ext-install mysqli pdo pdo_mysql exif zip
RUN a2enmod rewrite

# Installation de Composer
# COPY --from=composer:2.6 /usr/bin/composer /usr/local/bin/composer
# RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy source files
COPY . /var/www/html/
# USER www-data
RUN mkdir -p storage/img/

# # Give write permisions to storage folder
RUN chown www-data storage -R
RUN chmod 755 storage -R
