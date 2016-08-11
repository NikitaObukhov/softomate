Тестовое задание
==================

Разработать RESTful API Service и документацию к нему.

Документация
-------------

[Ссылка на документацию](http://85.143.210.108:667/api/v1/doc)

Установка
-------------

    git clone git@github.com:NikitaObukhov/softomate.git
    cd softomate
    chmod -R 777 var/cache var/logs
    composer install
    php bin/console doctrine:schema:create
    php bin/console doctrine:fixtures:load


#### Установка при помощи docker-compose:

    wget http://85.143.210.108:667/softomate.tar.gz
    tar xfz softomate.tar.gz
    cd softomate
    docker-compose up -d

Приложение будет слушать порт 667 и доступно по адресу http://localhost:667/api/v1/doc
