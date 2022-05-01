#!/bin/bash

composer install

chmod -R 777 /var/www/bootstrap
chmod -R 777 /var/www/storage

php artisan migrate
php artisan key:generate
php artisan jwt:secret

php-fpm -F