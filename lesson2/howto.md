#HOWTO

- docker run -p 5000:5000  identidock
    > run container with volume
    
- docker run -d  -p 5000:5000 -v "$(pwd)"/app:/app identidock
    > run container with volume
- docker-compose : new mechanics
    > 
- > new command:
    > RUN - run command
    > WORKDIR - default current dir for other command ( like CMD)
    > COPY - copy file to image
    > EXPOSE - ports
    > USER - current user
    > ENTRYPOINT -  executed file
    > CMD - params for ENTRYPOINT, if only CMD , executed app
    > VOLUME - file or dir as (tom ;))
         