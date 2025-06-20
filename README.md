Para instalar la aplicación 

se instala con composer

composer update / composer install

corremos las migraciones con

php artisan migrate

luego se corre la aplicación

php artisan serve

para correr las pruebas unitarias y de integración

php artisan serve

para correr dusk (selenium)

se instala dusk

composer require --dev laravel/dusk
php artisan dusk:install
y se corre
php artisan dusk

y corremos locust

locust -f locustfile.py --host=http://localhost:8000

y ya profe, no me pida mas, ando mas tostao que cafe recien hecho