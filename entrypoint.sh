#!/bin/sh

# 1. Run migrations
php /var/www/html/artisan migrate --force

# 2. Run the original entrypoint that starts Nginx and PHP-FPM
# This is the standard location for the webdevops entrypoint
exec /opt/docker/bin/entrypoint.sh