FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

RUN pecl install xdebug-3.1.4 \
   && docker-php-ext-enable xdebug

RUN echo xdebug.mode=debug >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.start_with_request=yes >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.client_host=172.17.0.1 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.xdebug.mode=debug >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.remote_handler ="dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.xdebug.client_port=9003 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.discover_client_host=false >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo xdebug.idekey=VSCODE >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo memory_limit=-1 >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd soap zip

# Get latest Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www

WORKDIR /var/www

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY --chown=www:www . /var/www

RUN composer install

USER www

ENTRYPOINT ["/bin/bash", "start.sh"]
