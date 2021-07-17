# test_performance

<<<<<<< HEAD
Changez .env.exemple à .env avec la config de votre pc (les accés wamp xamp et le nom de la base de donnée)

create database dans wamp ou xamp et aprés

=> Composer install

=>php artisan key:generate

=>php artisan migrate

=>php artisan serve
=======
##Config init projet
Changez .env.exemple à .env avec la config de votre pc
aprés\
=> Composer install\
=>php artisan key:generate\
=>php artisan migrate\
=>php artisan serve

##K6
docker pull loadimpact/k6\
docker run -i loadimpact/k6 run - <script.js
>>>>>>> e3d61afdb85eae7f3cdc8e311af3b86d62027b93
