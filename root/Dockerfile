# Use an official PHP runtime as a parent image
FROM php:8.0-apache

# Copy the contents of your project to the default web directory in the container
COPY . /var/www/html

# Copy the custom Apache config
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Install any PHP extensions you might need (like mysqli for MySQL support)
RUN docker-php-ext-install mysqli

# Expose port 80 to allow access to the web server
EXPOSE 80
