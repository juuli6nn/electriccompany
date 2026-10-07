FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libicu-dev libonig-dev unzip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j"$(nproc)" intl mbstring mysqli \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV PORT=10000

RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf \
    && sed -ri -e 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && sed -ri -e 's/<VirtualHost \*:80>/<VirtualHost *:10000>/' /etc/apache2/sites-available/*.conf

WORKDIR /var/www/html

COPY composer.json ./
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader

COPY . .

RUN mkdir -p writable/cache writable/logs writable/session writable/uploads \
    && chown -R www-data:www-data writable \
    && chmod -R 775 writable

EXPOSE 10000

CMD ["sh", "-c", "if [ -f /etc/secrets/aiven-ca.pem ]; then chmod 644 /etc/secrets/aiven-ca.pem; fi; exec apache2-foreground"]
