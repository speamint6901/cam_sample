#!/bin/bash

git pull origin develop
docker-compose exec app service supervisor start
docker-compose exec app /usr/local/bin/composer.phar install
docker-compose exec app php artisan migrate
docker-compose exec app npm install
