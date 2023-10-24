#!/bin/bash

# source_dir="/var/www/alegra/volumes"
target_dir="/var/www/alegra"

cd $target_dir
echo "Running php artisan key:generate..."
php artisan key:generate
php artisan optimize:clear
php artisan octane:install --server="swoole"
php artisan octane:start --server="swoole" --host="0.0.0.0"

echo "Deployment completed."

# Optional: You can add error handling or checks for the success of each step.