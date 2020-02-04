#Nginx proxy for identidock app

Need: 
- nginx proxy app
- identidock app
- image generate app

##Install 
- nginx proxy app 
    > cd identiproxy && docker build --no-cache -t proxy:0.1 .
- identidock app
    > git clone https://github.com/skvoz/identidock
    > cd identidock && docker-compose -f prod.yml up -d
    
##Howto

Now we can use our app in prod through nginx proxy(load balancer) , and develop version (only one app without
nginx) at local machine.    

##Push to server
