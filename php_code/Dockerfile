FROM php:8.2-fpm

RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql sockets

COPY . /var/www/html

EXPOSE 9000    