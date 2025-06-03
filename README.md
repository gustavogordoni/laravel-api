# Laravel API REST

Este projeto é uma API REST desenvolvida com Laravel 12 e PHP 8.4. Ele foi criado como parte do meu aprendizado sobre o funcionamento de APIs usando o framework Laravel.

A base do projeto foi inspirada no vídeo [**"Introdução à API Rest com Laravel 10"**](https://www.youtube.com/watch?v=AO3gug_3DRs) do canal [**Especializa TI**](https://www.youtube.com/@EspecializaTI), utilizando como referência o [repositório original](https://github.com/especializati/laravel-10-rest-api), mantido por [Carlos Ferreira](https://github.com/carlosfgti).

---

## Endpoints

A API conta com endpoints RESTful para a entidade `User`, incluindo as operações de listagem, criação, visualização, atualização e remoção de usuários, implementadas com `Route::apiResource`.

| Método | Endpoint          | Descrição                                                                |
| ------ | ----------------- | ------------------------------------------------------------------------ |
| GET    | `/users`      | Lista todos os usuários com paginação. Retorna uma coleção de usuários.  |
| GET    | `/users/{id}` | Retorna os dados de um usuário específico, identificado por seu ID.      |
| POST   | `/users`      | Cria um novo usuário com os dados fornecidos no corpo da requisição.     |
| PATCH  | `/users/{id}` | Atualiza parcialmente os dados de um usuário específico.                 |
| DELETE | `/users/{id}` | Remove um usuário específico do sistema.                                 |

---

## Instalação

### Clone o repositório

```sh
git clone -b laravel-12-with-php8.4 https://github.com/gustavogordoni/laravel-api.git
cd laravel-api
```

### Crie o arquivo `.env`

```sh
cp .env.example .env
```

### Suba os containers com Docker

```sh
docker compose up -d
```

### Acesse o container da aplicação

```sh
docker compose exec app bash
```

### Instale as dependências e configure o Laravel

```sh
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```

---

## Acesse o projeto

Abra no navegador: [http://localhost:8000](http://localhost:8000)
