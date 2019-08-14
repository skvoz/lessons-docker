##HOWTO: add "develop" web server, and some containers. First step to microservices


- docker run -p 5000:5000  identidock
    > run container with volume
    
- docker run -d  -p 5000:5000 -v "$(pwd)"/app:/app identidock
    > run container with volume

- docker-compose : new mechanics
    > fast version cli command

- docker-compose -f docker-compose.dev.yml build --no-cache
    > build dev container

- docker-compose -f docker-compose.dev.yml up 
    > run dev container
        
- new command:
    > RUN - run command
    > WORKDIR - default current dir for other command ( like CMD)
    > COPY - copy file to image
    > EXPOSE - ports
    > USER - current user
    > ENTRYPOINT -  executed file
    > CMD - params for ENTRYPOINT, if only CMD , executed app
    > VOLUME - file or dir as (tom ;))
         
##Note

Base "web" service now base at alpine image.  

In plan , add production part , now is not working        