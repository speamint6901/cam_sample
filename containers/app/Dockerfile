FROM php:7.1-fpm

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN mkdir /var/www/html/campbug

COPY ./ /var/www/html/campbug/

COPY ./containers/app/php.ini /usr/local/etc/php/

RUN apt-get update && apt-get clean

RUN apt-get install -y git libzip-dev zip libpng-dev libjpeg-dev
RUN docker-php-ext-configure zip -with-libzip
RUN docker-php-ext-install pdo pdo_mysql zip gd
RUN apt-get install -y supervisor

# install node npm
RUN apt-get install -y gnupg
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install -y nodejs

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filena
