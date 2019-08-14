FROM alpine:latest

# -D user without password
# -G add to group
RUN addgroup developer && adduser -D -G developer developer

RUN apk update && apk add build-base

RUN apk add zlib-dev php php-cli git zip php-gd bash curl autoconf \
                                                          		g++ \
                                                          		libtool \
                                                          		make tar gzip

ENV PHPREDIS_VERSION 3.0.0
RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis

#look if need new libs
#RUN apk search php7

COPY app /app

WORKDIR /app

RUN chown -R developer:developer /app

USER developer

CMD ["php", "-S", "0.0.0.0:5000", "index.php"]