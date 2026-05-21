#!/bin/sh

# 1. Run migrations
php /var/www/html/artisan migrate --force

# 2. Start the services correctly
# Using 'set --' and '$@' passes all arguments the container received to the real entrypoint
set -- /opt/docker/bin/entrypoint.sh "$@"
exec "$@"