#!/bin/sh

docker-compose exec -w /var/www/html/mireru/ app php artisan db:seed --class=RolesAndPermissionsSeeder
