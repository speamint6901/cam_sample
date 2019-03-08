#!/bin/bash

docker-compose exec db mysqldump -uroot -p -r /etc/mysql/dump/campbug.sql campbug
