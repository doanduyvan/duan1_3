FROM php:8.0-apache

RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer

RUN docker-php-ext-install mysqli pdo pdo_mysql

# a2enmod rewrite
RUN a2enmod rewrite

# Install git
RUN apt-get update && apt-get install -y git

# Install unzip

RUN apt-get update && apt-get install -y unzip

# Install zip

RUN apt-get update && apt-get install -y zip