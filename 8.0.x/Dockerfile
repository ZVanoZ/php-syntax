FROM php:8.0.30-apache

ENV DEBIAN_FRONTEND "noninteractive"
RUN set -e                                             ;\
  apt update                                           ;\
    apt install -y  \
        wget \
        git \
        subversion \
        libaio1 \
        libaio-dev

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

#    oci8 \
#

RUN set -e                                             ;\
  install-php-extensions \
    xdebug-^3.1 \
    @composer-2

