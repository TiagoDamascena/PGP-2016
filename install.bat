@ECHO OFF

COPY .\.env.example .\.env

docker-compose build
docker-compose up -d

docker exec -it -u laradock studyeach_workspace composer update
docker exec -it -u laradock studyeach_workspace php artisan key:generate && php artisan config:clear
docker exec -it -u laradock studyeach_workspace php artisan migrate

docker-compose down

ECHO Study Each installed