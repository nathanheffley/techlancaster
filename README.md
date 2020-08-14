# Lancaster Software Co. Laravel Template

A laravel template that comes with Docker, Tailwind, PostgreSQL, a dedicated queue worker with Redis, and authentication out of the box.

## Features

### Docker

Comes with [Docker] already configured, so there's no more worrying about setting up your dev environment.

### Tailwind CSS

Comes with [Tailwind CSS] installed by default, so you can get started building views immediately without messing around with CSS.

We also include the [Tailwind UI] package which includes a better default color palette and more features out of the box. You can
remove this by deleting the call to `require('@tailwindcss/ui')` in `tailwind.config.js` and running `npm uninstall @tailwindcss/ui`
if you don't want it.

### PostgreSQL

Comes with a [PostgreSQL] database, which you can easily swap out for something else by editing `docker-compose.yml` if you prefer a different system.

### Dedicated Queue Worker (Redis)

Comes with a dedicated queue worker instance that runs on [Redis]. With a dedicated queue worker you won't have to worry about managing a worker yourself or having sync jobs behaving differently from production.

### Authentication

Comes with the default [auth scaffolding] (using Tailwind instead of Bootstrap for all the default pages, of course) because
what application doesn't have user authentication these days?

## Setup

```bash
git clone git@github.com:lancastersoftwareco/laravel-template.git

cd laravel-template

composer install

npm install && npm run dev

docker-compose build

docker-compose up -d

docker-compose exec web php artisan migrate --seed
```

If you would like to stop your Docker container, run `docker-compose stop`. If you would like to tear down your Docker containers
(be aware that this will lose your database if you don't edit `docker-compose.yml` to store the database in a volume) then you can
run `docker-compose down` instead.

## Development

Once your Docker container is running, you'll be ready to develop! The site will be available at `http://localhost` by default.

<!-- References -->

[Laravel]: https://laravel.com/
[Docker]: https://www.docker.com/
[Tailwind CSS]: https://tailwindcss.com/
[Tailwind UI]: https://tailwindui.com/
[PostgreSQL]: https://www.postgresql.org/
[Redis]: https://redis.io/
[auth scaffolding]: https://laravel.com/docs/7.x/frontend
