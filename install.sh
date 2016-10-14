#!/usr/bin/env bash

cp ./.env.example ./.env

docker-compose build
docker-compose up -d

docker-compose exec workspace composer update
docker-compose exec workspace php artisan key:generate && php artisan config:clear
docker-compose exec workspace php artisan migrate

docker-compose kill

echo 'DONE - Study Each installed'