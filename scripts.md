#UNIX scripts

- docker rm $(docker ps -aq -f status=exited)
    > drop all stopped images
- docker stop $(docker ps -lq)
    > stop all container
