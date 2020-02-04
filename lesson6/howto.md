##HOWTO: install jenkins, deploy with jenkins

####create image
- now app in another repository https://github.com/skvoz/identidock
- docker build -t identidock .
- docker run --rm -it -e ENV=UNIT -p 5000:5000 -v $pwd:/app identidock        
    > run test
- docker run --rm -it -e ENV=PROD -p 5000:5000 -v $pwd:/app identidock      
    > run prod
   
###install jenkins
 - pull Dockerfile from https://github.com/liufan-hana/identijenk
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
    #default arguments
    COMPOSE_ARGS=" -f jenkins.yml -p jenkins"
    #drop old containers
    sudo docker-compose $COMPOSE_ARGS stop
    sudo docker-compose $COMPOSE_ARGS rm --force -v
    
    #run composer 
    #sudo docker-compose $COMPOSE_ARGS run composer cd /app && composer install 
    
    #build system
    sudo docker-compose $COMPOSE_ARGS build --no-cache
    sudo docker-compose $COMPOSE_ARGS up -d
    #unit testing
    sudo docker-compose $COMPOSE_ARGS run --no-deps --rm -e ENV=UNIT identidock ERR=$?
    
    #after unit testing omg ) 
    if [$ERR -eq 0]; then
     IP=$(sudo docker inspect -f {{.NetworkSettings.IPAddress}}
     	jenkins_identidock_1)
     CODE=$(curl -sL -w "%{http_code}" $IP:9090/monster/bla -o /dev/null) || true
     if [$CODE -ne 200]; then
        echo "Test passed - Tagging"
        HASH=$(git rev-parse --short HEAD)
        sudo docker tag jenkins_identidock localhost:5043/identidock:$HASH
        sudo docker tag jenkins_identidock localhost:5043/identidock:newest
        echo "Pushing"
        sudo docker login -u testuser -p testpassword registryv2:5043
        sudo docker push localhost:5043/identidock:$HASH
        sudo docker push localhost:5043/identidock:newest
     else
        echo "Site returned" $CODE
        ERR=1
     fi
    fi
    
    #stop system
    sudo docker-compose $COMPOSE_ARGS stop
    sudo docker-compose $COMPOSE_ARGS rm --force -v 
     
    return $ERR


```


###actions 
- search tags $ docker images --no-trunc | grep $(docker inspect -f {{.Id}} localhost:5043/identidock:newest)
- you must drop all image older then some date