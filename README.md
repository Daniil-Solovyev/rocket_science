**ЗАПУСК**: <br>

В корне проекта выполнить команды:
- docker-compose build
- docker-compose up -d
- docker exec -it rocket_php_container composer install
- docker exec -it rocket_php_container cp .env.example .env
- docker exec -it rocket_php_container php artisan migrate --seed

**URLs**: <br>

[Все товары](http://localhost:8080/api/products) <br>
[Пример фильтрации 1](http://localhost:8080/api/products?properties[color][]=white) <br>
[Пример фильтрации 2](http://localhost:8080/api/products?properties[color][]=white&properties[brand][]=lenovo)

**URLs !encoded**: <br>

http://localhost:8080/api/products <br>
http://localhost:8080/api/products?properties[color][]=white <br>
http://localhost:8080/api/products?properties[color][]=white&properties[brand][]=lenovo

