# Utilise une image PHP officielle avec Composer et extensions nécessaires
FROM php:8.2-fpm

# Installe les dépendances système
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    nano \
    mariadb-client \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crée le répertoire de travail
WORKDIR /var/www

# Copie les fichiers de l'application dans le conteneur
COPY . .

# Installe les dépendances PHP sans les dev
RUN composer install --optimize-autoloader --no-dev

# Met en cache la config Laravel
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose le port
EXPOSE 9000

# Commande à exécuter au lancement du conteneur
CMD ["php-fpm"]
