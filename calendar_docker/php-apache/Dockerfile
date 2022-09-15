FROM php:7.4-apache

COPY php.ini /usr/local/etc/php/
ARG UID
ARG GID
ARG USERNAME
ARG GROUPNAME

RUN groupadd -g $GID $GROUPNAME
RUN useradd -u $UID -g $GID -s /bin/sh -m $USERNAME

RUN apt-get update \
    && apt-get install --no-install-recommends -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libjpeg-dev libmcrypt-dev libzip-dev git mariadb-client libonig-dev \
    && docker-php-ext-install fileinfo mbstring pdo_mysql mysqli zip iconv exif -j$(nproc) gd
RUN pecl install mcrypt \
    && docker-php-ext-enable mcrypt \
    && a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN service apache2 restart

USER $UID:$GID