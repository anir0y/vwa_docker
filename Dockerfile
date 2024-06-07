FROM debian:latest

LABEL maintainer="mail@anir0y.in"
LABEL Version="E.1.3"

ENV DEBIAN_FRONTEND=noninteractive

# Install necessary packages
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y wget debconf-utils && \
    echo "mariadb-server mysql-server/root_password password vulnerables" | debconf-set-selections && \
    echo "mariadb-server mysql-server/root_password_again password vulnerables" | debconf-set-selections && \
    apt-get install -y \
    apache2 \
    mariadb-server \
    php \
    php-mysql \
    php-pgsql \
    php-pear \
    php-gd && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copy application files
COPY vwa /var/www/html
COPY db.sql /docker-entrypoint-initdb.d/db.sql

# Initialize MySQL database
RUN service mysql start && \
    sleep 3 && \
    mysql -uroot -pvulnerables -e "CREATE USER 'app'@'localhost' IDENTIFIED BY 'vulnerables'; CREATE DATABASE vwa; GRANT ALL PRIVILEGES ON vwa.* TO 'app'@'localhost';"

# Expose port 80
EXPOSE 80

# Copy the main script
RUN echo "IyEvYmluL2Jhc2gKCmVjaG8gIlJ1bm5pbmcgbWFpbi5zaCIKY2htb2QgNzc3IC1SIC92YXIvd3d3L2h0bWwvaW1hZ2VzIApjaG93biB3d3ctZGF0YTp3d3ctZGF0YSAtUiAvdmFyL3d3dy9odG1sIApybSAvdmFyL3d3dy9odG1sL2luZGV4Lmh0bWwKCgpjaG93biAtUiBteXNxbDpteXNxbCAvdmFyL2xpYi9teXNxbCAvdmFyL3J1bi9teXNxbGQKZWNobyAnWytdIFN0YXJ0aW5nIG15c3FsLi4uJwpzZXJ2aWNlIG15c3FsIHN0YXJ0CnNsZWVwIDMKbXlzcWwgLXUgcm9vdCA8IC9kb2NrZXItZW50cnlwb2ludC1pbml0ZGIuZC9kYi5zcWwKCmVjaG8gJ1srXSBTdGFydGluZyBhcGFjaGUnCnNlcnZpY2UgYXBhY2hlMiBzdGFydAoKCndoaWxlIHRydWUKZG8KICAgIHRhaWwgLWYgL3Zhci9sb2cvYXBhY2hlMi8qLmxvZwogICAgZXhpdCAwCmRvbmUKCiMgTGVhZGtpbmcgdG9rZW46IDJNd2hkWWlsOEw0NUE3RXg0U21PRFFTeFROVF8zNXBzY1dLcXc5YmZ5UDRIcVRVVmQgIHwgdGhpcyBpcyB0aGUgZmxhZyB0b2tlbiAK" | base64 -d > /main.sh

# Set script permissions
RUN chmod +x /main.sh

# Set user flag
RUN echo "5258686c62474666526d78685a3374454d474e725a584a6656584e6c636c39776432356c5a48303d" > /root/userflag.txt

# Set entrypoint
ENTRYPOINT ["/main.sh"]
