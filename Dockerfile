FROM php:8.0-fpm

RUN curl -sSLf -o /usr/local/bin/install-php-extensions https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions
RUN chmod +x /usr/local/bin/install-php-extensions

RUN install-php-extensions @composer bcmath mysqli pdo_mysql