# Stage 1: Build CSS/JS assets using Node
FROM node:20-alpine AS assets-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: Create the production runtime image
FROM webdevops/php-nginx:8.3-alpine

# Set environment variables for the new web server image
ENV WEB_DOCUMENT_ROOT=/var/www/html/public
ENV APP_ENV=production

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Copy compiled assets from Stage 1
COPY --from=assets-builder /app/public/build ./public/build

# Run composer installation for production dependencies
RUN composer update --no-dev --optimize-autoloader

# Set correct storage permissions for Laravel
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache