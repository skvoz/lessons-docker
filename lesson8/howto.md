#Logging in docker

ELK, cAdvisor, Prometeus

##Install
- nginx proxy app 
    > cd identiproxy && docker build --no-cache -t proxy:0.1 .
- identidock app
    > git clone https://github.com/skvoz/identidock
    > cd identidock
    > docker-compose -f prod-with-logging.yml up -d
    > docker-compose -f prod-with-logging.yml run composer composer install


##about
```
logspout:
  image: amount/logspout-logstash
  vlolumes:
    - /var/run/docker.sock:/tmp/docker.sock #mount Docker-socket for connect Logspout to Docker API
  ports:
    - "8000:90" #common access to HTTP interface Logspout ( ONLY FOR TEST on PROD close this connection)
```