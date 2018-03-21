FROM ubuntu:latest
MAINTAINER Devin Matte <matted@csh.rit.edu>

RUN mkdir /opt/webdrink

RUN apt-get update -yq && \
    apt-get -yq install php php-curl composer

ADD . /opt/webdrink
WORKDIR /opt/webdrink

RUN composer install

CMD ["php", "-S", "0.0.0.0:8080", "-t", "/opt/webdrink"]