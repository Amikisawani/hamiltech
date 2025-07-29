# Étape 1 : Image PHP avec extensions nécessaires
FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libzip-dev \
    libpq-dev \
    libcurl4-openssl-dev \
    libssl-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Créer le dossier de travail
WORKDIR /var/www

# Copier tout le contenu dans le conteneur
COPY . .

# Installer les dépendances PHP de Laravel
RUN composer install --optimize-autoloader --no-dev

# Donner les permissions aux fichiers de Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Générer la clé de l'application (sera exécutée au runtime si besoin)
# CMD utilisé pour attendre que le conteneur soit lancé (mieux que pendant le build)
CMD php artisan migrate --force && php artisan config:cache && php artisan key:generate && php-fpm
