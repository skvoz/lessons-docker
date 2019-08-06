FROM php:7.2-fpm-alpine

WORKDIR /app


COPY app /app

RUN php /app/composer.phar install --no-dev --no-interaction -o

# Finish composer
RUN php /app/composer.phar dump-autoload --no-scripts --no-dev --optimize


CMD ["php", "-S", "0.0.0.0:5000", "-t", "/app", "/app/identidock.php"]


