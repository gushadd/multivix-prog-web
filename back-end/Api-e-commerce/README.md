## Iniciando API

npm install
composer install
php artisan migrate
php artisan serve

## Populando o banco de dados com Produtos

php artisan db:seed --class=ProdutoSeeder

## Reiniciar banco

php artisan migrate:fresh
