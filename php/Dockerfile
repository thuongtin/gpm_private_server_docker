FROM php:8.1-apache
RUN apt-get update \
  && apt-get install -y zlib1g-dev \
  && apt-get install -y zip unzip \
  && apt-get install -y libonig-dev \
  && apt-get -y install libzip-dev \
  && docker-php-ext-install pdo_mysql mysqli mbstring zip \
  && docker-php-ext-enable mysqli \
  && a2enmod rewrite

# composer インストール
RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && chmod +x /usr/local/bin/composer

# ワーキングディレクトリの指定
WORKDIR /var/www/html

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
ENV TZ=Asia/Tokyo