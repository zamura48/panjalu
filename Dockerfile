FROM php:7.4-fpm
RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl git zip
# Install GD
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd
# install ext web
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN docker-php-ext-install pdo mcrypt mbstring
WORKDIR /app
COPY . /app
RUN ls && pwd
RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8010
EXPOSE 8010
