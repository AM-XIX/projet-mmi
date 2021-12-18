FROM php:8.0.10-apache-buster

# Surpresses debconf complaints of trying to install apt packages interactively
# https://github.com/moby/moby/issues/4032#issuecomment-192327844
 
ARG DEBIAN_FRONTEND=noninteractive

# Update
RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get --no-install-recommends install -y apt-utils && \
    rm -rf /var/lib/apt/lists/*

# Other PHP8 Extensions

RUN docker-php-ext-install pdo_mysql && \
    docker-php-ext-install mysqli

# Enable apache modules
RUN a2enmod rewrite headers

# Cleanup
RUN rm -rf /usr/src/*