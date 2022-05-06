FROM php:8.0-apache
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y
RUN a2enmod rewrite
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN mkdir -p /usr/src/zlib
RUN cd /usr/src/zlib
RUN curl -fsSL 'https://zlib.net/zlib-1.2.12.tar.gz' -o zlib.tar.gz \
    && tar zxvf zlib.tar.gz \
    && cd zlib-1.2.12 \
    && ./configure && make && make install
RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip
RUN service apache2 restart
