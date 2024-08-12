# About

Обкатка нововведений PHP 8.0

## Run

````shell
# Определяем IP для xdebug 
ip addr | egrep "docker0:" -A 5
````

````shell
set -e
pwd 
ls -la

set +e
docker compose down

set -e
cp -v dist-.env ./.env
cp -v dist-xdebug-2.ini ./xdebug-2.ini

docker compose up
````