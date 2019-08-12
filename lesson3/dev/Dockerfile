FROM php:7.2-fpm-alpine

# -D user without password
# -G add to group
RUN addgroup developer && adduser -D -G developer developer

WORKDIR /app

COPY app /app

ADD composer.json app/composer.json

ADD composer.lock app/composer.lock

#RUN mkdir /bin/sh
#
#RUN chown -R developer:developer /bin/sh

COPY composer.phar /bin/


#USER root

#RUN composer dump-autoload --no-scripts --no-dev --optimize

USER developer

RUN composer install


EXPOSE 5000


CMD ["php", "-S", "0.0.0.0:5000", "index.php"]