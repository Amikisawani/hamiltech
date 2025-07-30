# Utilise une image officielle PHP avec les extensions nécessaires
FROM php:8.2-cli

# Installe les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crée le répertoire de travail
WORKDIR /var/www

# Copie tout le projet
COPY . .

# Donne les bonnes permissions
RUN chmod -R 775 storage bootstrap/cache

# Installe les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Cache la config Laravel (important)
RUN php artisan config:cache

# Génère la clé de l'application
RUN php artisan key:generate

# Lance le serveur intégré de Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]

EXPOSE 9000

