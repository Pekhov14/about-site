up:
	docker compose --env-file ./.env.local up -d
	symfony server:start -d

build:
	docker compose --env-file ./.env.local up --build -d

delete:
	docker compose down -v

stop:
	docker compose stop
	symfony server:stop