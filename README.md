Сборка проекта:
docker-compose up --build
(Записи с id 1 и 2 уже будут в БД),
миграции при первой сборке не выполняются,
запустите docker-compose up --build второй раз,
миграции выполнятся

Api работает на localhost:8005
Пример в Postman  http://localhost:8005/api/games
Ответ:
[
    {
        "id": 1,
        "title": "Шахматы",
        "studio": "Chess Mentor",
        "genre": "Настольная логическая"
    },
    {
        "id": 2,
        "title": "DOOM",
        "studio": "id Software",
        "genre": "Шутер"
    }
]


Все роуты:
docker exec -it store-api php artisan route:list

