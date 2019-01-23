#!/bin/bash

git pull origin develop
docker-compose exec -w /var/www/html/campbug app cp .env.example .env
docker-compose exec -w /var/www/html/campbug app /usr/local/bin/composer.phar install
docker-compose exec -w /var/www/html/campbug app php artisan migrate
docker-compose exec -w /var/www/html/campbug app npm install
