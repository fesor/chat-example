FROM fesor/php:7.1-fpm-onbuild

RUN apt-get update \
    && apt-get install -y libpq-dev cron \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
        bcmath \
        mbstring \
        pdo pdo_pgsql
RUN yes | pecl install apcu xdebug \
        && echo "extension=apcu.so" > /usr/local/etc/php/conf.d/apcu.ini \
        && echo "apc.enable_cli=1" >> /usr/local/etc/php/conf.d/apcu.ini \
        && echo "zend_extension=xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.remote_connect_back=on" >> /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /app
CMD ["bash", "entrypoint/php-fpm"]

RUN mkdir var
COPY docker/php/entrypoint /app/entrypoint

COPY . /app
