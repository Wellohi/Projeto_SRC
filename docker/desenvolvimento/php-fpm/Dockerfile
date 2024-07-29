FROM php:8.1-fpm-alpine

RUN apk add --no-cache linux-headers
# RUN apk add --no-cache autoconf g++ make
# RUN pecl install xdebug
# RUN rm -rf /tmp/pear
# RUN docker-php-ext-enable xdebug

RUN apk add --no-cache autoconf g++ make \
    && pecl install xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo pdo_mysql

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

# Baixar e instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Verifique a instalação do Composer
RUN composer --version

COPY ./php/conf.d /usr/local/etc/php/conf.d

WORKDIR /app