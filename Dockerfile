FROM php:5.4-apache

RUN apt-get update; \
	apt-get install openssl libssl-dev libcurl4-openssl-dev -y; \
	pecl install mongo; \
	echo "extension=mongo.so" > /usr/local/etc/php/conf.d/mongo.ini
RUN docker-php-ext-install pdo_mysql