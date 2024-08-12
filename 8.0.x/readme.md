# About

Обкатка нововведений PHP 8.0

## Run

````shell
set -e
pwd 
ls -la

set +e
docker compose down

set -e
cp -v dist-.env ./.env
cp -v dist-xdebug-3.ini ./xdebug-3.ini

docker compose up
````