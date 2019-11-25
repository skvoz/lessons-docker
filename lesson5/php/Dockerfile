FROM php:7.2-fpm

RUN groupadd developer && useradd -g developer developer

RUN apt-get update && apt-get install

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer


ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

COPY app /app

WORKDIR /app

USER developer

RUN composer install --no-interaction

ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"


CMD ["php-fpm"]