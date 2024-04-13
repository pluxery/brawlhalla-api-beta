FROM php:7.4-apache

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем необходимые инструменты
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

WORKDIR /app

COPY . /app

RUN composer install

# В случае необходимости можно выполнять миграции и сиды
RUN php artisan migrate
RUN php artisan db:seed

# Открываем порт 80 для веб-сервера
EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
