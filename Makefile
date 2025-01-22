help:
	@echo "\n"
	@echo "пример ввода: \t\033[1;34mmake \033[1;32m{команды}\033[0m"
	@echo "\n"
	@echo "\033[1;33mДоступные команды:\033[0m"
	@echo "\033[1;32mnetwork-create\033[0m\t\t - Создание сети контейнеров."
	@echo "\033[1;32mnetwork-prune\033[0m\t\t - Удаление всех сети контейнеров."
	@echo "\033[1;32mup\033[0m\t\t\t - Поднять докер композ. \033[93mДля локальной разработки\033[0m"
	@echo "\033[1;32mup-build\033[0m\t\t - Обновить образы докера. \033[93mДля локальной разработки\033[0m"
	@echo "\033[1;32mdown\033[0m\t\t\t - Остановить контейнеры. \033[93mДля локальной разработки\033[0m"
	@echo "\033[1;32mdown-clear\033[0m\t\t - Остановить и очистить контейнеры. \033[93mДля локальной разработки\033[0m"
	@echo "\033[1;32mcomposer-update\033[0m\t\t - Обновить все пакеты.\033[0m"
	@echo "\033[1;32mcomposer-install\033[0m\t - Установить все пакеты."
	@echo "\033[1;32mmigrate-up\033[0m\t\t - Накат миграции БД."
	@echo "\n"
network-create:
	docker network create if-network
network-prune:
	docker network rm $(docker network ls -q)
up:
	docker compose up -d
up-build:
	docker compose up -d --build --force-recreate
down:
	docker compose down
down-clear:
	docker compose down -v --remove-orphans
composer-update:
	docker compose run --rm if-php-cli composer update
composer-install:
	docker compose run --rm if-php-cli composer install
migrate-up:
	docker compose run --rm if-php-cli php ./applications/spark migrate --all --no-header
modify-dir:
	docker compose run --rm if-php-cli chmod 777 -R /app/src/applications/writable/cache/
	docker compose run --rm if-php-cli chmod 777 -R /app/src/applications/writable/logs/
	docker compose run --rm if-php-cli chmod 777 -R /app/src/applications/writable/session/
	docker compose run --rm if-php-cli chmod 777 -R /app/src/applications/writable/uploads/
