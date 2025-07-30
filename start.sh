#!/bin/bash

# Affiche les erreurs et quitte en cas d'échec
set -e

# Donne les bons droits pour éviter les erreurs d’écriture
chmod -R 775 storage bootstrap/cache

# Lance les commandes nécessaires avant de servir l'application
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Lancer Laravel avec PHP en mode production
php -S 0.0.0.0:${PORT:-9000} -t public
