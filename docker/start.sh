#!/bin/sh
set -e

# Render tells the app which port to use through the PORT variable
PORT="${PORT:-10000}"
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

if [ -z "$APP_KEY" ]; then
    echo "APP_KEY is not set. Add it in the Render environment settings."
    exit 1
fi

php artisan config:cache
php artisan view:cache

# Create the tables and add the sample events (the seeder skips events that already exist)
php artisan migrate --force
php artisan db:seed --force

exec apache2-foreground
