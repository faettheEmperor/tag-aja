FROM php:8.2-fpm

# Install system deps
RUN apt-get update \
    && apt-get install -y \
        git curl wget \
        libpng-dev libonig-dev libxml2-dev \
        zip unzip libzip-dev \
        libfreetype6-dev libjpeg62-turbo-dev libwebp-dev \
        libpq-dev libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_pgsql mbstring bcmath exif pcntl opcache \
    && apt-get -y autoremove && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www/html

# Copy composer files first (cache layer)
COPY composer.json composer.lock ./

# Install PHP deps WITHOUT running scripts (app files not copied yet)
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-progress --prefer-dist

# NOW copy full app source
COPY . .

# Copy .env
RUN cp .env.example .env

# Run composer scripts NOW that artisan and .env.example exist
RUN composer run-script post-autoload-dump --no-dev

# Fix permissions
RUN usermod -u 1000 www-data \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Build frontend assets
RUN npm ci --no-progress \
    && npm run build --no-progress

# Laravel production caches (APP_KEY must be set via env at runtime)
RUN php artisan config:clear \
    && php artisan route:cache \
    && php artisan view:cache

EXPOSE 9000
CMD ["php-fpm"]
