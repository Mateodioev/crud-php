FROM php:8.0.27-apache

EXPOSE 80

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql exif
RUN a2enmod rewrite

# Copy source files
COPY . /var/www/html/