# syntax=docker/dockerfile:1

# Use official PHP image with Apache for Render deployment
FROM php:8.3-apache

# Configure Apache to serve the application from /var/www/html (default)
WORKDIR /var/www/html

# Copy project files into the container
COPY . /var/www/html

# Ensure the Apache process owns the application files so logging works
RUN chown -R www-data:www-data /var/www/html

# Expose the default Apache port
EXPOSE 80

# The base image already defines the default CMD (apache2-foreground)
# so no additional start command is required.
