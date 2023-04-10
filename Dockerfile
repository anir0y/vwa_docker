FROM debian:9.2

LABEL maintainer "mail@anir0y.in"
LABEL Version="E.1.3"

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install wget -y && \
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
COPY  db.sql /docker-entrypoint-initdb.d/db.sql

RUN service mysql start && \
    sleep 3 && \
    mysql -uroot -pvulnerables -e "CREATE USER app@localhost IDENTIFIED BY 'vulnerables';CREATE DATABASE vwa;GRANT ALL privileges ON vwa.* TO 'app'@localhost;"

EXPOSE 80:80

#with ngrok
RUN echo "IyEvYmluL2Jhc2gKCmVjaG8gIlJ1bm5pbmcgbWFpbi5zaCIKY2htb2QgNzc3IC1SIC92YXIvd3d3L2h0bWwvaW1hZ2VzIApjaG93biB3d3ctZGF0YTp3d3ctZGF0YSAtUiAvdmFyL3d3dy9odG1sIApybSAvdmFyL3d3dy9odG1sL2luZGV4Lmh0bWwKCmNob3duIC1SIG15c3FsOm15c3FsIC92YXIvbGliL215c3FsIC92YXIvcnVuL215c3FsZAplY2hvICdbK10gU3RhcnRpbmcgbXlzcWwuLi4nCnNlcnZpY2UgbXlzcWwgc3RhcnQKc2xlZXAgMwpteXNxbCAtdSByb290IDwgL2RvY2tlci1lbnRyeXBvaW50LWluaXRkYi5kL2RiLnNxbAoKZWNobyAnWytdIFN0YXJ0aW5nIGFwYWNoZScKc2VydmljZSBhcGFjaGUyIHN0YXJ0CiMgbmdyb2sKd2dldCBodHRwczovL2Jpbi5lcXVpbm94LmlvL2MvYk55ajFtUVZZNGMvbmdyb2stdjMtc3RhYmxlLWxpbnV4LWFtZDY0LnRneiAtTyAvaG9tZS9uZ3Jvay50Z3oKdGFyIHp4dmYgL2hvbWUvbmdyb2sudGd6Ci4vbmdyb2sgY29uZmlnIGFkZC1hdXRodG9rZW4gMk13aGRZaWw4TDQ1QTdFeDRTbU9EUVN4VE5UXzM1cHNjV0txdzliZnlQNEhxVFVWZAouL25ncm9rIGh0dHAgODAgJiYKCndoaWxlIHRydWUKZG8KICAgIHRhaWwgLWYgL3Zhci9sb2cvYXBhY2hlMi8qLmxvZwogICAgZXhpdCAwCmRvbmUKCiMgTGVhZGtpbmcgdG9rZW46IDJNd2hkWWlsOEw0NUE3RXg0U21PRFFTeFROVF8zNXBzY1dLcXc5YmZ5UDRIcVRVVmQgIHwgdGhpcyBpcyB0aGUgZmxhZyB0b2tlbiAK" | base64 -d > /main.sh

# without ngrok
#RUN  echo "IyEvYmluL2Jhc2gKCmVjaG8gIlJ1bm5pbmcgbWFpbi5zaCIKY2htb2QgNzc3IC1SIC92YXIvd3d3L2h0bWwvaW1hZ2VzIApjaG93biB3d3ctZGF0YTp3d3ctZGF0YSAtUiAvdmFyL3d3dy9odG1sIApybSAvdmFyL3d3dy9odG1sL2luZGV4Lmh0bWwKCgpjaG93biAtUiBteXNxbDpteXNxbCAvdmFyL2xpYi9teXNxbCAvdmFyL3J1bi9teXNxbGQKZWNobyAnWytdIFN0YXJ0aW5nIG15c3FsLi4uJwpzZXJ2aWNlIG15c3FsIHN0YXJ0CnNsZWVwIDMKbXlzcWwgLXUgcm9vdCA8IC9kb2NrZXItZW50cnlwb2ludC1pbml0ZGIuZC9kYi5zcWwKCmVjaG8gJ1srXSBTdGFydGluZyBhcGFjaGUnCnNlcnZpY2UgYXBhY2hlMiBzdGFydAoKCndoaWxlIHRydWUKZG8KICAgIHRhaWwgLWYgL3Zhci9sb2cvYXBhY2hlMi8qLmxvZwogICAgZXhpdCAwCmRvbmUKCiMgTGVhZGtpbmcgdG9rZW46IDJNd2hkWWlsOEw0NUE3RXg0U21PRFFTeFROVF8zNXBzY1dLcXc5YmZ5UDRIcVRVVmQgIHwgdGhpcyBpcyB0aGUgZmxhZyB0b2tlbiAK" | base64 -d  > main.sh

RUN chmod +x /main.sh
RUN echo "5258686c62474666526d78685a3374454d474e725a584a6656584e6c636c39776432356c5a48303d" > /userflag.txt
ENTRYPOINT ["/main.sh"]