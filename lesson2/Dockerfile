FROM php:7.2-fpm-alpine

# -D user without password
# -G add to group
RUN addgroup developer && adduser -D -G developer developer

WORKDIR /app

COPY app /app

COPY cmd.sh /

RUN chmod +x /cmd.sh

EXPOSE 5000

USER developer

CMD ["/cmd.sh"]
#CMD ["php", "-S", "0.0.0.0:5000", "-t", "/app", "/app/identidock.php"]