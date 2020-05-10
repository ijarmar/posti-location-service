FROM composer

EXPOSE 8000

COPY . /app
WORKDIR /app

RUN composer install
#RUN php -S 0.0.0.0:8000 -t examples

CMD ["php", "-S", "0.0.0.0:8000", "-t", "examples"]
