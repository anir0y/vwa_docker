#!/bin/bash

chown -R mysql:mysql /var/lib/mysql /var/run/mysqld
chmod 777 /images
echo '[+] Starting mysql...'
service mysql start
sleep 3
mysql -u root < /docker-entrypoint-initdb.d/db.sql

echo '[+] Starting apache'
service apache2 start
# ngrok
wget https://bin.equinox.io/c/bNyj1mQVY4c/ngrok-v3-stable-linux-amd64.tgz -O /home/ngrok.tgz
tar zxvf /home/ngrok.tgz
./ngrok config add-authtoken token
./ngrok http 80 &&

while true
do
    tail -f /var/log/apache2/*.log
    exit 0
done
