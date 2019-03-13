#!/bin/bash

docker-compose exec app service supervisor start
docker-compose exec app supervisorctl reread
docker-compose exec app supervisorctl update
docker-compose exec app supervisorctl start laravel-worker:*
