#!/bin/bash
composer install
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load