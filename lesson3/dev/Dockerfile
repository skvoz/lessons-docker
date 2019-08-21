FROM alpine:latest

# -D user without password
# -G add to group
RUN addgroup developer && adduser -D -G developer developer

RUN apk update && apk add build-base

RUN apk add zlib-dev php php-cli git zip php-gd bash curl

#look if need new libs
#RUN apk search php7

COPY app /app

RUN la -la

WORKDIR /app

RUN chown -R developer:developer /app

USER developer

CMD ["php", "-S", "0.0.0.0:5000", "index.php"]