# Парсер на Laravel
Тестовое задание от elmikeev: https://github.com/cy322666/wb-api
## Инструкция
- `clone`

- `docker-compose up -d --build app`

- `docker-compose run --rm composer update`

- `docker-compose run --rm composer install`

- `docker-compose up -d`

- `cp .env.example .env`

### .env
`API_KEY=add_key`

- `docker-compose run --rm artisan migrate`

### 

ports:

- **nginx** - `:80`
- **mysql** - `:3306`


## Если проблемы с редактированием файлов в директории

- `chmod -R 777 ./`