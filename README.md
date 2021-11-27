## SISTEMA WEB SCRAPING ##

#### DEPLOY DOCKER PARA PRODUCAO ####
docker-compose --file docker-compose.prod.yml up -d

#### DEPLOY DOCKER PARA DEV ####
docker-compose up -d 

#### INSTALAÇÃO DAS DEPENDENCIAS ####

Em seguida execute os seguintes comandos:

- `cp .env.exemple .env`
- `docker-compose run --rm composer install`
- `docker-compose run --rm npm install`
- `docker-compose run --rm npm run dev`
- `docker-compose run --rm artisan migrate`
- `docker-compose run --rm artisan db:seed`
- `docker-compose run --rm artisan key:generate`
- `docker-compose run --rm app chmod -R 775 bootstrap storage`
- `docker-compose run --rm app chown -R www-data.www-data bootstrap storage`
