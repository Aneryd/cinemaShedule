ТЕСТОВОЕ ЗАДАНИЕ "Расписание сеансов кинотеатра"

.env файл - конфигурация БД
```sh
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=cinema_shedule
DB_USERNAME=root
DB_PASSWORD=password
```

После этого, нужно выполнить несколько команд, для создания docker контейнера:
```sh
docker-compose build
docker-compose up -d
```

Далее нужно, зайти в контейнер с fpm-php и выполнить миграцию и обновить файлы composer:
```sh
docker exec -it cinemashedule-fpm-1 bash
composer update
php artisan migrate:refresh --seed
php artisan storage:link
```

ЕСЛИ НЕ СОХРАНЯЮТСЯ ФАЙЛЫ нужно выполнить команду:
chmod -R 777 storage/

Авторизация сделал с помощью laravel-breeze.

Есть 2 типа роли 'Админ' и 'Пользователь'. При регистрации по стандарту ставится роль 'Пользователь' для всех аккаунтов. Если же нужно поменять роль на админа, то нужно в таблице user_roles, поставить в поле role_id = 1.
Стандартный аккаунт админа, который добавляется через сидер:
```sh
admin@mail.com
admin
```
