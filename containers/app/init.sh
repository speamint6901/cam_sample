#!/bin/bash

docker-compose exec -w /var/www/html/campbug app /usr/local/bin/composer.phar install
docker-compose exec -w /var/www/html/campbug app cp .env.example .env
docker-compose exec -w /var/www/html/campbug app php artisan key:generate
docker-compose exec -w /var/www/html/campbug app php artisan migrate
docker-compose exec -w /var/www/html/campbug app npm install
docker-compose exec -w /var/www/html/campbug app npm install vuex --save
docker-compose exec -w /var/www/html/campbug app npm install vue-router
docker-compose exec -w /var/www/html/campbug app npm run dev
