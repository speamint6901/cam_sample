#!/bin/bash

docker-compose exec app cp .env.example .env
docker-compose exec app php artisan storage:link
docker-compose exec app /usr/local/bin/composer.phar install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate:refresh
docker-compose exec app npm install
docker-compose exec app npm install vuex --save
docker-compose exec app npm install vue-router
docker-compose exec app npm run dev
docker-compose exec app service supervisor start
