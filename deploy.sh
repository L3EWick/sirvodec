#!/bin/bash

cd /var/www/fw_tropa

git pull origin marcelo
git pull

#composer update --optimize-autoloader --no-dev

#php artisan config:cache

#php artisan route:cache

cp -R /var/www/fw_tropa/public /var/www/html/tropa/
cp -R /var/www/fw_tropa/public/css /var/www/html/tropa/
cp -R /var/www/fw_tropa/public/fonts /var/www/html/tropa/
cp -R /var/www/fw_tropa/public/img /var/www/html/tropa/
cp -R /var/www/fw_tropa/public/js /var/www/html/tropa/

#/etc/init.d/apache2 restart

