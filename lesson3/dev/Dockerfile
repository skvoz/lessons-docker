FROM php:7.2-fpm-alpine

# -D user without password
# -G add to group
RUN addgroup developer && adduser -D -G developer developer

RUN apk update && apk add build-base

RUN apk add zlib-dev git zip \
  && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY app /app

WORKDIR /app

RUN chown -R developer:developer /app

USER developer

RUN composer install --prefer-source --no-interaction



CMD ["php", "-S", "0.0.0.0:5000", "index.php"]