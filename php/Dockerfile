FROM php:8.1-apache
RUN apt-get update \
  && apt-get install -y zlib1g-dev \
  && apt-get install -y zip unzip \
  && apt-get install -y libonig-dev \
  && apt-get -y install libzip-dev \
  && docker-php-ext-install pdo_mysql mysqli mbstring zip \
  && docker-php-ext-enable mysqli \
  && a2enmod rewrite

ENV TZ=Asia/Ho_Chi_Minh

# GD
RUN apt-get update && \
  apt-get -y install git libicu-dev libonig-dev libzip-dev unzip libfreetype6-dev libjpeg62-turbo-dev libpng-dev libjpeg-dev \
  && docker-php-ext-install \
  pdo_mysql \
  bcmath \
  gd \
  && docker-php-ext-configure gd \
  --with-freetype=/usr/include/ \
  --with-jpeg=/usr/include/ \
  && docker-php-ext-install -j$(nproc) gd