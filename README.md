# test_performance


Changez .env.exemple à .env avec la config de votre pc (les accés wamp xamp et le nom de la base de donnée)

create database dans wamp ou xamp et aprés

=> Composer install

=>php artisan key:generate

=>php artisan migrate

=>php artisan serve

##K6
docker pull loadimpact/k6\
docker run -i loadimpact/k6 run - < tests/Performance/script.js
