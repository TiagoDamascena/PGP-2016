#!/usr/bin/env bash

cp ./.env.example ./.env

docker-compose build
docker-compose up -d

docker-compose run -u laradock workspace composer update
docker-compose run -u laradock workspace php artisan key:generate && php artisan config:clear

docker-compose down

echo 'Study Each installed'