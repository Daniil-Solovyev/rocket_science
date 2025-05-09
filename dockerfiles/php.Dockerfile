FROM php:8.4-fpm

WORKDIR /var/www/laravel

RUN useradd -ms /bin/bash dws

RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y \
        git \
        libzip-dev \
        zip \
        unzip \
        libicu-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

USER dws
