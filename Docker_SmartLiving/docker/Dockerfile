# SmartLiving
#
# VERSION               0.1

FROM php:7.4-fpm-alpine

#RUN curl https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh --output /usr/bin/wait-for-it
#RUN chmod +x /usr/bin/wait-for-it

RUN docker-php-ext-install pdo pdo_mysql opcache
RUN apk update && apk add --no-cache git unzip bash

WORKDIR /code

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./SmartLiving/composer.json .
COPY ./SmartLiving/composer.lock .

RUN composer install

#CMD  php bin/console make:migration --no-debug -n && php bin/console doctrine:migrations:migrate -n --allow-no-migration && php bin/console doctrine:fixtures:load -n && php-fpm


