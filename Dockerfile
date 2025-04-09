FROM php:8.1-fpm

# Установка зависимостей для GD и PHP-расширений
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    zip \
    curl \
    git \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    bash

# Установка GD
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg

# Установка PHP-расширений
RUN docker-php-ext-install \
    gd \
    pdo \
    pdo_mysql \
    mbstring \
    zip \
    xml \
    curl

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копирование php.ini (если нужно)
COPY php/php.ini /usr/local/etc/php/

# Установка рабочей директории
WORKDIR /var/www/html
