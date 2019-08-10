FROM php:7.2-fpm

RUN groupadd developer && useradd -g developer developer

RUN apt-get update && apt-get install

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /app

USER developer

CMD ["php-fpm"]