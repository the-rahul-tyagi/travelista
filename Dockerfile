# Stage 1: Build CSS/JS assets using Node
FROM node:20-alpine AS assets-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: Create the production runtime image
FROM webdevops/php-nginx:8.3-alpine

# Set working directory
WORKDIR /var/www/html

# Environment variables to fix the 502 error
ENV WEB_DOCUMENT_ROOT=/var/www/html/public
ENV PHP_DISPLAY_ERRORS=0
ENV PHP_MAX_EXECUTION_TIME=300

# Copy project files
COPY . .

# Copy compiled assets from Stage 1
COPY --from=assets-builder /app/public/build ./public/build

# Run composer update (to match PHP 8.3)
RUN composer update --no-dev --optimize-autoloader

# Set correct storage permissions for Laravel
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy your entrypoint script
COPY entrypoint.sh /entrypoint.sh

# Make it executable
RUN chmod +x /entrypoint.sh

# Set the entrypoint
ENTRYPOINT ["/entrypoint.sh"]