##HOWTO: install jenkins, deploy with jenkins

####create image
- docker build -t identidock .
- docker run --rm -it -e ENV=UNIT -p 5000:5000 -v $pwd:/app identidock        
    > run test
- docker run --rm -it -e ENV=PROD -p 5000:5000 -v $pwd:/app identidock      
    > run prod