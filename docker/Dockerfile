# Debian
FROM debian:12.6-slim
ARG USERNAME
ARG UID
ARG GID
ARG GITREPOSBACKPARAM
ARG GITREPOSFRONTPARAM


# Basic setup
RUN apt update && apt upgrade -y && \
apt install -y sudo nano zip git unzip libzip-dev wget php-xdebug \
php8.2-fpm php8.2-mbstring php8.2-xml php8.2-pgsql php8.2-curl php8.2-zip

RUN mkdir /var/www
# PHP
RUN apt install -y php-dev autoconf automake


# Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN sudo mv composer.phar /usr/local/bin/composer

# PostgreSQL
RUN apt install -y postgresql-common
RUN /usr/share/postgresql-common/pgdg/apt.postgresql.org.sh -y
RUN apt -y install postgresql-16
RUN sed -i "s/#listen_addresses = 'localhost'/listen_addresses = '0.0.0.0'/g" /etc/postgresql/16/main/postgresql.conf
RUN echo "host all all 0.0.0.0/0 md5" | tee -a /etc/postgresql/16/main/pg_hba.conf
RUN sed -i 's/local   all             postgres                                peer/local   all             postgres                                trust/g' /etc/postgresql/16/main/pg_hba.conf


# Remover apache2
RUN apt remove apache2-bin apache2-data apache2-utils apache2 libapache2-mod-php8.2
RUN rm -rf /etc/apache2
RUN rm -rf /usr/sbin/apache2
RUN rm -rf /usr/lib/apache2
RUN rm -rf /usr/share/apache2
RUN apt autoremove && apt autoclean && apt clean all

# Node
RUN apt install -y curl
RUN curl -fsSL https://deb.nodesource.com/setup_22.x -o nodesource_setup.sh
RUN bash nodesource_setup.sh
RUN apt install -y nodejs

# Nginx
RUN apt install nginx -y



# Docker user
RUN groupadd --gid $GID $USERNAME
RUN useradd --uid $UID --gid $GID -m $USERNAME
RUN echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME
RUN chmod 0440 /etc/sudoers.d/$USERNAME
WORKDIR /var/www/
####
COPY docker/start.sh /

COPY docker/php.ini-debug /etc/php/8.2/fpm/php.ini
COPY docker/php.ini-debug /etc/php/8.2/cli/php.ini
RUN sudo chmod +x /start.sh
RUN sudo chown -R $USERNAME:$USERNAME /var/www 
RUN sudo chmod 777 -R /var/www

# Definir variáveis de ambiente
ENV GITREPOSBACK=$GITREPOSBACKPARAM
ENV GITREPOSFRONT=$GITREPOSFRONTPARAM


ENTRYPOINT ["/start.sh"]
