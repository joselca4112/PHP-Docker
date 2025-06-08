FROM php:8.2-apache

# Instalamos las extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Copia tu código fuente a /var/www/html (opcional)
COPY . /var/www/html/
