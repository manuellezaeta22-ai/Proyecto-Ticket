FROM php:8.2-apache

# Habilitar mod_rewrite de Apache para las rutas limpias de la API
RUN a2enmod rewrite

# Instalar extensiones de PHP necesarias para PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Configurar el directorio de trabajo por defecto en el contenedor
WORKDIR /var/www/html