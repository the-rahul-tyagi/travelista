#!/bin/sh

# 1. Run migrations
echo "Running migrations..."
php /var/www/html/artisan migrate --force

# 2. Check if migration succeeded
if [ $? -ne 0 ]; then
    echo "Migration failed! Exiting."
    exit 1
fi

# 3. Start the official entrypoint
# We pass all arguments ($@) to the script safely
echo "Starting web server..."
exec /opt/docker/bin/entrypoint.sh "$@"