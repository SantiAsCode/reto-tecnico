#!/bin/bash

# source_dir="/var/www/alegra/volumes"
target_dir="/var/www/alegra"

cd $target_dir
echo "Running php artisan key:generate..."
php artisan key:generate
php artisan optimize:clear
php artisan octane:install --server="swoole"
echo "Running supervisord..."
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

echo "Deployment completed."

# Optional: You can add error handling or checks for the success of each step.