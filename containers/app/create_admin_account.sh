#!/bin/sh

docker-compose exec -w /var/www/html/mireru/ app php artisan create:platform_account
