# Порядок установки проекта (локально)


* Запуск Docker `` docker compose up -d ``
* Переход в контейнер  `` docker-compose exec -it php bash ``
* Запуск установки расширений yii2 `` composer install `` или `` composer install --ignore-platform-reqs ``
* Копировать файл в config db.local.php как db.php
* Запуск миграций `` php yii migrate ``
* Установить права для записи логов и кэша  `` chmod -R 777 runtime/ web/assets/ ``

# Локально сайт
http://localhost:8000/

# Демо
http://wash-lp.ru/