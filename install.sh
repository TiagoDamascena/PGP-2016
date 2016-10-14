#!/usr/bin/env bash

cp ./.env.example ./.env

docker-compose build
docker-compose up -d

docker-compose run -u laradock workspace composer update
docker-compose run -u laradock workspace php artisan key:generate && php artisan config:clear
docker-compose run -u laradock workspace php artisan migrate

docker-compose kill

echo 'DONE - Study Each installed'