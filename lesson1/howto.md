#howto add image to DockerHub

- docker build -t skvoz/php-image .
    > create image skvoz/php-image

- docker run skvoz/php-image echo 'Hello world!'
    > test image must output 'Hello world!'
    
- docker login 
    > need for push data to dockerhub

- docker push skvoz/php-image
    > where skvoz - docker ID
    > php-image - name of repository 
    > all this params may be changed
    