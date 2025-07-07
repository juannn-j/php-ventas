FROM php:8.1.16-apache

ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /var/www/html

RUN sed -i 's|http://deb.debian.org|https://deb.debian.org|g' /etc/apt/sources.list

# Habilitar extensiones necesarias
RUN apt-get update && apt-get install -y zip unzip curl

ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && install-php-extensions pdo_pgsql

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
