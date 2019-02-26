FROM php:7.1-fpm

ENV PATH /usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    zip \
    libmemcached-dev \
    git \
    unzip \
    libpng-dev

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Set timezone
RUN echo "America/Toronto" > /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata

#memcached
RUN curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
        && mkdir -p /usr/src/php/ext/memcached \
        && tar -C /usr/src/php/ext/memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
        && docker-php-ext-configure memcached \
        && docker-php-ext-install memcached \
        && docker-php-ext-install zip \
    && rm /tmp/memcached.tar.gz

RUN docker-php-ext-install pdo_mysql

RUN apt-get install -y --no-install-recommends \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxpm-dev \
    libvpx-dev \
&& docker-php-ext-configure gd \
    --with-freetype-dir=/usr/lib/x86_64-linux-gnu/ \
    --with-jpeg-dir=/usr/lib/x86_64-linux-gnu/ \
    --with-xpm-dir=/usr/lib/x86_64-linux-gnu/ \
    --with-vpx-dir=/usr/lib/x86_64-linux-gnu/ \
&& docker-php-ext-install gd

#xdebug
ADD ext-xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
RUN yes | pecl install xdebug \
    && printf "\nzend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" >> /usr/local/etc/php/conf.d/xdebug.ini

#soap
RUN rm /etc/apt/preferences.d/no-debian-php
RUN apt-get update -y \
   && apt-get install -y \
        libxml2-dev \
             php-soap \
                && apt-get clean -y \
                   && docker-php-ext-install soap
#gmp
RUN apt-get update -y
RUN apt-get install -y libgmp-dev re2c libmhash-dev libmcrypt-dev file
RUN ln -s /usr/include/x86_64-linux-gnu/gmp.h /usr/local/include/
RUN docker-php-ext-configure gmp
RUN docker-php-ext-install gmp

#bcmatch
RUN docker-php-ext-install bcmath

# Cleanup
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www/app
