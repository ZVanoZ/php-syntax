FROM php:7.0.33-apache
ARG IMAGE_NAME
ENV IMAGE_NAME=${IMAGE_NAME}

#
#       php-dev \
# 2.821 E: Package 'php-dev' has no installation candidate
#
RUN set -e                                             ;\
  echo "deb http://archive.debian.org/debian stretch main contrib non-free" > /etc/apt/sources.list ;\
  DEBIAN_FRONTEND=noninteractive                       ;\
  echo "DEBIAN_FRONTEND='${DEBIAN_FRONTEND}'"          ;\
  apt update                                           ;\
    apt install -y  \
        alien \
        build-essential \
        ca-certificates \
        curl \
        dh-autoreconf \
        g++ \
        gcc \
        git \
        file \
        libc-dev \
        libaio1 \
        libaio-dev \
        make \
        pkg-config \
        strace \
        subversion \
        wget \
        zlib1g-dev

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN \
    type gcc ;\
    type git ;\
    type phpize ;\
    type svn ;\
    type strace ;\
    type wget

#
#10 14.47 Installing '/usr/local/lib/php/extensions/no-debug-non-zts-20151012/xdebug.so'
#10 14.49 install ok: channel://pecl.php.net/xdebug-2.6.1
#
RUN set -e                                             ;\
  install-php-extensions \
    xdebug \
    @composer-2

RUN set -e              ;\
    a2enmod rewrite