# test_performance

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
