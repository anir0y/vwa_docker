Status:

[![Docker Image CI](https://github.com/anir0y/vwa_docker/actions/workflows/docker-image.yml/badge.svg?branch=main)](https://github.com/anir0y/vwa_docker/actions/workflows/docker-image.yml)

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

## Local Build 

```docker
docker build -t vwalocal .
docker run -p 80:80 vwalocal

# check https://dashboard.ngrok.com/ agents page to get the URL for ngrok
```

### Talk to me 

  - mail@anir0y.in
  - https://twitter.com/anir0y
 
  
---
