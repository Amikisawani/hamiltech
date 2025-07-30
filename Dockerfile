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

# Installe les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Donne les bonnes permissions à Laravel
RUN chmod -R 775 storage bootstrap/cache

# Copie le script de démarrage
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Expose le port
EXPOSE 9000

# Lance le script
CMD ["start.sh"]
