#!/bin/sh

docker-compose exec -w /var/www/html/mireru/ app vendor/bin/phpunit
