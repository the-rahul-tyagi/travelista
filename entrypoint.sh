#!/bin/sh

# 1. Run migrations
echo "Running migrations..."
php /var/www/html/artisan migrate --force

# 2. Start the processes directly
# This bypasses the problematic entrypoint.sh and goes straight to the supervisor
echo "Starting services..."
exec /usr/bin/supervisord -c /opt/docker/etc/supervisor.conf