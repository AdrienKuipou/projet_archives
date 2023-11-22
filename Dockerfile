# Utilisez une image de base avec PHP, Apache et MySQL préinstallés
FROM php:7.4-apache

# Installez les dépendances nécessaires (extensions PHP et client MySQL)
RUN apt-get update \
    && apt-get install -y \
        mariadb-client \
        libpng-dev \
        libjpeg-dev \
        libpq-dev \
    && docker-php-ext-install \
        mysqli \
        pdo_mysql \
        gd

# Copiez les fichiers de l'application dans le conteneur
COPY . /var/www/html

# Définissez les autorisations appropriées sur les fichiers
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Exposez le port 80 pour le trafic HTTP entrant
EXPOSE 80

# Démarrez Apache lorsque le conteneur est lancé
CMD ["apache2-foreground"]
