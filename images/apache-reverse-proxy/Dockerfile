FROM php:7.2-apache

COPY apache2-foreground /usr/local/bin

COPY conf/ /etc/apache2
COPY template /var/apache2

RUN apt-get update && \
 apt-get install -y dos2unix

RUN dos2unix /usr/local/bin/apache2-foreground
CMD ["/usr/local/bin/apache2-foreground"]

RUN a2enmod proxy proxy_http
RUN a2ensite 000-* 001-*
