FROM wordpress:php8.1-apache

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Optional: Install curl if debugging
RUN apt-get update && apt-get install -y curl

# Set Xdebug config (optional, can also use .ini)
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
