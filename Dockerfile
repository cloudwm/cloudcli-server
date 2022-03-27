FROM php:7.4-apache

# https://github.com/composer/getcomposer.org/commits/main
ENV COMPOSER_COMMIT=30a8caf5d8e7c4069e243c378d01c7e3a3967bcc
RUN curl -s "https://raw.githubusercontent.com/composer/getcomposer.org/${COMPOSER_COMMIT}/web/installer" | php &&\
    mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer
RUN apt-get update && apt-get install -y git unzip libzip-dev && docker-php-ext-install zip bcmath

RUN groupadd --gid 1000 --system cloudwm &&\
    useradd --home-dir /home/cloudwm --gid 1000 --create-home --system --uid 1000 cloudwm

COPY artisan composer.json composer.lock /home/cloudwm/
COPY database/ /home/cloudwm/database/

RUN chown -R 1000:1000 /home/cloudwm

USER cloudwm
WORKDIR /home/cloudwm
RUN composer install --no-autoloader --no-scripts --no-interaction --no-plugins

USER root
RUN sed -ri -e 's!/var/www/html!/home/cloudwm/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/home/cloudwm!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY . /home/cloudwm
RUN chown -R 1000:1000 /home/cloudwm

USER cloudwm
RUN mkdir -p bootstrap/cache storage/app/public storage/framework/cache storage/framework/sessions \
             storage/framework/testing storage/framework/views storage/logs
ENV CLI_SCHEMA_JSON_DIR /home/cloudwm/cli_schema
RUN composer install --optimize-autoloader

USER root
ENV APACHE_RUN_USER cloudwm
ENV APACHE_RUN_GROUP cloudwm

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN cp config/apache2.conf /etc/apache2/apache2.conf
RUN a2enmod rewrite

ENTRYPOINT ["./entrypoint.sh"]
