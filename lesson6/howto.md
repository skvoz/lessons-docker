##HOWTO: install jenkins, deploy with jenkins

####create image
- docker build -t identidock .
- docker run --rm -it -e ENV=UNIT -p 5000:5000 -v $pwd:/app identidock        
    > run test
- docker run --rm -it -e ENV=PROD -p 5000:5000 -v $pwd:/app identidock      
    > run prod
   
###install jenkins
 - get Dockerfile from https://github.com/liufan-hana/identijenk
 - $ docker build -t identijenk .
 - $ docker run -v /var/run/docker.sock:/var/run/docker.sock identijenk bash 
 - in container $ docker ps , you must see docker ID
    > mount docker socket
    > look runned container 
 - $ docker run --name jenkins-data identijenk echo "Jenkins Data Container"
    > container for store persistent config params
 - $ docker run -d --name jenkins1 -p 8081:8080 --volumes-from jenkins-data \
      -v /var/run/docker.sock:/var/run/docker.sock identijenk
    > run jenkins
 - settings jenkins 
    Add build step >> execute shell >> command:
    ```
    COMPOSE_ARGS=" -f jenkins.yml -p jenkins"
    sudo docker-compose $COMPOSE_ARGS stop
    sudo docker-compose $COMPOSE_ARGS rm --force -v
    sudo docker-compose $COMPOSE_ARGS build --no-cache
    sudo docker-compose $COMPOSE_ARGS up -d
    sudo docker-compose $COMPOSE_ARGS run --no-deps --rm -e ENV=UNIT identidock ERR=$?
    if [$ERR -eq 0]; then
     IP=$(sudo docker inspect -f {{.NetworkSettings.IPAddress}}
     	jenkins_identidock_1)
     CODE=$(curl -sL -w "%{http_code}" $IP:9090/monster/bla -o /dev/null) || true
     if [$CODE -ne 200]; then
     	echo "Site returned" $CODE
        ERR=1
     fi
    fi
    
    sudo docker-compose $COMPOSE_ARGS stop
    sudo docker-compose $COMPOSE_ARGS rm --force -v 
    
    return $ERR


```