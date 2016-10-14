#!/usr/bin/env bash

docker-compose up -d

docker-compose exec workspace php artisan migrate

echo 'Study Each is running...'

docker-compose exec workspace bash

docker-compose kill