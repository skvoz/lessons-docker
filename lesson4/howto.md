##HOWTO: work with local docker registry

- run register
> docker run -d -p 5000:5000 registry:2

- generate keys 
```
openssl req -newkey rsa:4096 -nodes -sha256 \
 -keyout registry_certs/domain.key -x509 -days 365 \
 -out registry_certs/domain.crt
```

- run register wit TLS

```
docker run -d -p 5000:5000 \
-v $(pwd)/registry_certs:/certs \
-e REGISTRY_HTTP_TLS_CERTIFICATE=/certs/domain.crt \
-e REGISTRY_HTTP_TLS_KEY=/certs/domain.key \
--restart=always --name registry registry:2
```

- run register with config file 
```
docker run -d -p 5000:5000 --restart=always --name registry \
             -v `pwd`/config.yml:/etc/docker/registry/config.yml \
             registry:2
```
##Note

For osx access to local storage only through tls connection 

certificate storages:
- osx - ~/.docker/certs.d/<hostname>:<port>/ca.crt
- nix - /etc/docker/certs.d/<hostname>:<port>/ca.crt

###How create secure local registry ? 

Firstly add ssh/ssl certs. Next step add auth for every user 

- [proxy-server based on nginx]( https://docs.docker.com/registry/recipes/nginx/)
- [token base auth]( https://github.com/cesanta/docker_auth)