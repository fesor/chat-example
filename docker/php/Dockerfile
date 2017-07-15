FROM fesor/php:7.1.7-fpm-onbuild

WORKDIR /app
CMD ["bash", "entrypoint/php-fpm"]

RUN mkdir var
COPY docker/php/entrypoint /app/entrypoint

COPY . /app
