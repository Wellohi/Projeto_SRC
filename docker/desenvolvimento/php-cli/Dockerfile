FROM php:8.1-cli-alpine


RUN apk add --no-cache linux-headers
# RUN apk add --no-cache autoconf g++ make
# RUN pecl install xdebug
# RUN rm -rf /tmp/pear
# RUN docker-php-ext-enable xdebug


RUN apk add --no-cache autoconf g++ make \
    && pecl install xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug


RUN apk add --no-cache unzip wget bash git

RUN docker-php-ext-install pdo pdo_mysql

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./php/conf.d /usr/local/etc/php/conf.d

ENV COMPOSER_ALLOW_SUPERUSER 1

# Instalar Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash

# Mover o binário do Symfony CLI para /usr/local/bin
RUN mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Verifique a instalação do Symfony CLI
RUN symfony -v

# Baixar e instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



# Verifique a instalação do Composer
RUN composer --version

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet
#RUN wget https://get.symfony.com/cli/installer -O - | bash
#RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

WORKDIR /app

