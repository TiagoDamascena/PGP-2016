@ECHO OFF

COPY .\.env.example .\.env

docker-compose build
docker-compose up -d

docker exec -it studyeach_workspace composer update
docker exec -it studyeach_workspace php artisan key:generate && php artisan config:clear

docker-compose down

ECHO Study Each installed