## Техническое задание от компании "Интернет-Фрегат"
### Подготовка к развертывания проекта
#### Требование:
1. OS: семейства Linux / Windows 10/11 with WSL2
2. Docker
3. Make

#### Запуск проекта:
 1. Создать сеть для докера
```
make network-create
```
или
```
docker network create if-network
```
2. Поднять контейнеры
```
make up
```
или
```
docker compose up -d
```
3. Установка зависимости проекта
```
make composer-install
```
или
```
docker compose run --rm if-php-cli composer install
```

4. Накат миграции
```
make migrate-up 
```
или
```
docker compose run --rm if-php-cli php ./applications/spark migrate --all --no-header
```
5. Изменение прав у директории "writable"
```
modify-dir
```
или
```
	docker compose run --rm if-php-cli chmod 777 -R /app/src/applications/writable/cache/
```
```
	docker compose run --rm if-php-cli chmod 777 -R /app/src/applications/writable/logs/
```
```
	docker compose run --rm if-php-cli chmod 777 -R /app/src/applications/writable/session/
```
```
	docker compose run --rm if-php-cli chmod 777 -R /app/src/applications/writable/uploads/
```

#### Проект доступен по адресу:
```
http://localhost:3000
```
