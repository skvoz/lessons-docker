##HOWTO: install jenkins, deploy with jenkins

Description : this is test project for test jenkins @see https://github.com/skvoz/lessons-docker lesson6

### run jenkins

 - docker-compose -f jenkins.yml run composer composer install 
 - docker-compose up -d 
 
### run up

 - docker-compose run composer composer install
 - docker-compose up 
 

###toubleshout

If image is broken > $ chown -R <cur_user>:<cur_group> $(pwd)/app/vendor 
 