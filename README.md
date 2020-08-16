# TechLancaster

A new website for TechLancaster that can pull Meetup info from standardized APIs.

## Setup

```bash
git clone git@github.com:nathanheffley/techlancaster.git

cd techlancaster

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
