FROM composer:latest AS composer

FROM php:7.2-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN adduser dveloper --disabled-password

RUN usermod -aG sudo developer

USER dveloper

RUN chown -R developer:sudo /app

RUN whoami

RUN id

WORKDIR /app

ADD composer.json /app/composer.json

ADD composer.phar /app/composer.phar

COPY app /app

RUN composer install --no-interaction

VOLUME /app

RUN echo pwd: 'pwd' && echo ls: 'ls'

#ENTRYPOINT "php -S 0.0.0.0:5000 -t identidock.php"

CMD ["php", "-S", "0.0.0.0:5000", "-t", "/app", "/app/identidock.php"]


