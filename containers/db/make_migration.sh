#!/bin/bash

docker-compose exec -w /var/www/html/campbug app php artisan make:migration $1
