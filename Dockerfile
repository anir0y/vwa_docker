FROM debian:9.2

LABEL maintainer "mail@anir0y.in"

RUN apt-get update && \
    apt-get upgrade -y && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
    debconf-utils && \
    echo mariadb-server mysql-server/root_password password vulnerables | debconf-set-selections && \
    echo mariadb-server mysql-server/root_password_again password vulnerables | debconf-set-selections && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
    apache2 \
    mariadb-server \
    php \
    php-mysql \
    php-pgsql \
    php-pear \
    php-gd \
    && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*


COPY vwa /var/www/html



RUN chown www-data:www-data -R /var/www/html && \
    rm /var/www/html/index.html

RUN service mysql start && \
    sleep 3 && \
    mysql -uroot -pvulnerables -e "CREATE USER app@localhost IDENTIFIED BY 'vulnerables';CREATE DATABASE vwa;GRANT ALL privileges ON vwa.* TO 'app'@localhost;"

COPY  db.sql /docker-entrypoint-initdb.d/db.sql


EXPOSE 80:80

COPY main.sh /

ENTRYPOINT ["/main.sh"]

