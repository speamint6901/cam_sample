#!/bin/bash

docker-compose exec db mysqldump -uroot -psecret --no-create-info campbug gears gear_profiles categories big_categories genres brands brand_groups -r /etc/mysql/dump/campbug.sql
