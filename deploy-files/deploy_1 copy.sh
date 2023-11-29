#!/bin/bash

# source_dir=/var/www/prod/volumes"
target_dir="/var/www/prod"

cd $target_dir
echo "Running php artisan key:generate..."
php artisan key:generate
php artisan optimize:clear

apache2-foreground

echo "Deployment completed."

# Optional: You can add error handling or checks for the success of each step.