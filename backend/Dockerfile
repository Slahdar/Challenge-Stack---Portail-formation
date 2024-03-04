FROM php:8.1-fpm

RUN docker-php-ext-install pdo pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html


CMD ["composer install --no-scripts"]

CMD ["php-fpm"]