FROM alpine:latest

# -D user without password
# -G add to group
RUN addgroup developer && adduser -D -G developer developer

RUN apk update && apk add build-base

RUN apk add zlib-dev php php-cli git zip php-gd bash curl

#look if need new libs
#RUN apk search php7

#RUN curl -sS https://getcomposer.org/installer | php \
#        && mv composer.phar /usr/local/bin/ \
#        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer


COPY app /app

RUN ls -la

WORKDIR /app

RUN chown -R developer:developer /app

USER developer

#RUN composer install --prefer-source --no-interaction
#
#ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"

CMD ["php", "-S", "0.0.0.0:5000", "index.php"]