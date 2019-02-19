#!/bin/bash

git pull origin develop
docker-compose exec app cp .env.example .env
docker-compose exec app /usr/local/bin/composer.phar install
docker-compose exec app php artisan migrate
docker-compose exec app npm install
