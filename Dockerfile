FROM php:8.2-cli as cli

# Update package list and install necessary packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    bash \
    mc \
    libpq-dev \
    libsqlite3-dev \
    libmariadb-dev-compat \
    libmariadb-dev

# Install PHP extensions
RUN docker-php-ext-install bcmath

# Install database drivers
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql pdo_sqlite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Set environment variables for Composer
ENV COMPOSER_MEMORY_LIMIT=-1
ENV COMPOSER_ALLOW_SUPERUSER=1

# Copy application code and set working directory
COPY . /app/
WORKDIR /app/

# Install application dependencies
RUN composer install
