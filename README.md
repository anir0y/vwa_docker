Status:

[![Docker Image CI](https://github.com/anir0y/vwa/actions/workflows/docker-image.yml/badge.svg?branch=main)](https://github.com/anir0y/vwa/actions/workflows/docker-image.yml)

# VWA Lab for Classroom Training

this lab is designed and developved by @anir0y this is a way to teach students about common mistakes made by devs


# setting up local web-application server

# 1 : setting up [LAMP stack](https://notes.anir0y.in/ubuntu-installing-lamp-stack)

LAMP stack is stands for: 

* Linux
* Apache (apache2)
* MySQL	(db)
* Php 	(scripting Lang.)

---

# 2 : download the web-application code.

clone the repo

`git clone https://github.com/anir0y/vwa`

>  move contents of `vwa` folder to `/var/www/html` dir. 

# 3 : configuration

## MySql

```sql

# Login to MySQL

sudo mysql -u root 
# you'll be prompted by `mysql>` 

# create user with password

CREATE USER 'dbadmin'@localhost IDENTIFIED BY 'dbadmin@123';

# create db:

CREATE DATABASE users;

# select DB

use `users`;

# grant our user privileges

GRANT ALL PRIVILEGES ON users.* to 'dbadmin'@'localhost' ;

# creating tables:

CREATE TABLE IF NOT EXISTS `userlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(33) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

# insert values:

INSERT INTO `userlogin` (`id`, `username`, `password`)VALUES (99, 'mentor', 'a1857b83457cfef98da22fefa2fdd3ba');
INSERT INTO `userlogin` (`id`, `username`, `password`)VALUES (1, 'admin', 'a1857b83457cfef98da22fefa2fdd3ba');
```

### PHP

* open `dbconf.php` add the creds:

````php
# old
new mysqli("127.0.0.1", "useradm", "useradm", "userdb");

# new
new mysqli("127.0.0.1", "dbadmin", "dbadmin@123", "users");

```

## Docker 

```bash
docker pull anir0y/vwa
Using default tag: latest
latest: Pulling from anir0y/vwa
...
Status: Downloaded newer image for anir0y/vwa:latest
docker.io/anir0y/vwa:latest

# verify
docker images                    
REPOSITORY   TAG       IMAGE ID       CREATED          SIZE
anir0y/vwa   latest    015c231e4df8   19 minutes ago   719MB

# run the app
docker run -d -p 80:80 anir0y/vwa
```



### Talk to me 
  - mail@anir0y.in
  - https://twitter.com/anir0y
 
  
---
