build:
	docker-compose build
up:
	docker-compose up -d
app:
	docker-compose exec app bash
clear:
	docker-compose exec app php artisan cache:clear
	docker-compose exec app php artisan config:clear
	docker-compose exec app php artisan route:clear
	docker-compose exec app php artisan view:clear
migrate:
	docker-compose exec app php artisan migrate
db-init:
	docker-compose exec app php artisan migrate:fresh
	docker-compose exec app php artisan db:seed