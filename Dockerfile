FROM php:8.4-cli

RUN apt-get update && apt-get install -y libzip-dev git
RUN docker-php-ext-install zip


COPY --from=composer /usr/bin/composer /usr/bin/composer
