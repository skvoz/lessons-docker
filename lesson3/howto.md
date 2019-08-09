#HOWTO: add "production" web server (nginx), and some containers. First step to microservices
    
- docker run -d -p 5000:5000 -v "$(pwd)"/app:/app identicon