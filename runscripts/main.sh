#!/bin/bash

echo "Running main.sh"
chmod 777 -R /var/www/html/images 
chown www-data:www-data -R /var/www/html 
rm /var/www/html/index.html


chown -R mysql:mysql /var/lib/mysql /var/run/mysqld
echo '[+] Starting mysql...'
service mysql start
sleep 3
mysql -u root < /docker-entrypoint-initdb.d/db.sql

echo '[+] Starting apache'
service apache2 start
# ngrok
wget https://bin.equinox.io/c/bNyj1mQVY4c/ngrok-v3-stable-linux-amd64.tgz -O /home/ngrok.tgz
tar zxvf /home/ngrok.tgz
./ngrok config add-authtoken 2MwhdYil8L45A7Ex4SmODQSxTNT_35pscWKqw9bfyP4HqTUVd
./ngrok http 80 &&

while true
do
    tail -f /var/log/apache2/*.log
    exit 0
done

# Leadking token: 2MwhdYil8L45A7Ex4SmODQSxTNT_35pscWKqw9bfyP4HqTUVd  | this is the flag token 
