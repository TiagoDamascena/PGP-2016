@ECHO OFF

docker-compose up -d

docker exec -it -u laradock studyeach_workspace php artisan migrate

ECHO Study Each is running...
ECHO Type exit to quit

docker exec -it -u laradock studyeach_workspace bash

docker-compose down
ECHO Study Each id down...