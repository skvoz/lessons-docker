#FROM php:7.2-fpm-alpine
#
#WORKDIR /app
#
#ADD composer.phar /app/
#ADD composer.json /app/
#
#RUN php /app/appcomposer.phar install --no-dev --no-interaction -o
#
## Finish composer
#RUN php /app/composer.phar dump-autoload --no-scripts --no-dev --optimize
#
#VOLUME /app
#
#CMD ["php", "-S", "0.0.0.0:5000", "-t", "/app", "/app/identidock.php"]
#
#

FROM php:7.2-fpm-alpine

# -D user without password
# -G add to group
RUN addgroup developer && adduser -D -G developer developer

WORKDIR /app

COPY app /app

EXPOSE 5000

USER developer

CMD ["php", "-S", "0.0.0.0:5000", "-t", "/app", "/app/identidock.php"]