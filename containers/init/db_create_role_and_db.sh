#!/bin/bash

# アプリユーザー作成
docker-compose exec db psql -U postgres \
                            -c "CREATE ROLE mireru_user WITH SUPERUSER CREATEDB LOGIN PASSWORD 'test1234';"

# DB作成
docker-compose exec db psql -U postgres \
                            -c "CREATE DATABASE mireru_development WITH OWNER mireru_user;"
