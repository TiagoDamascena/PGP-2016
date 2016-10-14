#!/usr/bin/env bash

docker-compose up -d

docker-compose run -u laradock workspace php artisan migrate

echo 'Study Each is running...'

docker-compose run -u laradock workspace bash

docker-compose kill