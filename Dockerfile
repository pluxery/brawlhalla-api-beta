FROM php:8.2-fpm

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql
# Устанавливаем необходимые инструменты
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

WORKDIR /app

COPY . /app

RUN composer install --ignore-platform-reqs

# В случае необходимости можно выполнять миграции и сиды


#RUN php artisan db:seed

# Открываем порт 80 для веб-сервера
EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
