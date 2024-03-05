FROM php:8.1-fpm

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . /var/www/html/

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install 

# CMD ["php-fpm"] 

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public", "-D"]
