# LeaseWeb Project
LeaseWeb project with docker infrastructure. Simple Apis to add, delete and read servers with basic UI.

## Backend Functionalities

* API to add Ram Modules (http://127.0.0.1:8080/ramModules - Post)
* API to get Ram Modules  (http://127.0.0.1:8080/ramModules - Get)
* API to get Servers  (http://127.0.0.1:8080/servers - Get)
* API to add Servers  (http://127.0.0.1:8080/servers - Post)
* API to delete servers  (http://127.0.0.1:8080/servers - delete)

## Frontend Functionalities

* List all the servers with ram module data
* Delete servers
* Add servers with ram modules

## Installation guide

 * Get a clone from this remo
 * Run following command from the root folder in the clone to get containes up and running (you need Docker and Docker-Compose installed in your host)
 ```bash
docker-compose up -d --build
```
 * Access the PHP container by running below command
 ```bash
docker exec -it leaseweb_php bash
```
 * install the dependancies
 ```bash
composer install
```
 * Crate database and make required changes
 ```bash
php bin/console doctrine:migrations:migrate
```
 * Strat server
 ```bash
symfony server:start
```
 
 ## Access the application
 
 * Access the frontend using http://localhost:4200/
 * Access the backend using http://localhost:8080/
 * Access the adminer console using http://localhost:9001/
 * Run unin tests by runing below command inside php container
 ```bash
symfony php bin/phpunit tests
```
 * You can find the Postman collection from leaseweb-backend/postman/leaseweb.postman_collection.json

## Improvements to be done if time permits

* Better front end with validations
* More unit tests and integration tests
* Authentication


