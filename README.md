# cloudcli-server

Server-side component to support [cloudcli](https://github.com/cloudwm/cloudcli)

## Running the server locally

Build

```
docker build -t cloudcli-server .
```

Run using proxy provider to a supported server

```
docker run --sig-proxy=false -e CLOUDCLI_PROVIDER=proxy -e CLOUDCLI_API_SERVER=https://console.kamatera.com -p 8080:80 cloudcli-server
```

Run cloudcli using this server:

```
cloudcli --api-server http://localhost:8080 init
```  

see [cloudcli README](https://github.com/OriHoch/cloudcli/blob/master/README.md) for cloudcli configuration and usage.

## Running the server for development

Clone and change to the project root directory:

```
git clone https://github.com/cloudwm/cloudcli-server.git &&\
cd cloudcli-server
```

Build and run the dev container:

```
( docker rm --force cloudcli-server-dev || true ) &&\
docker build --build-arg CLOUDCLI_USER_ID=`id -u` \
             --build-arg CLOUDCLI_GROUP_ID=`id -g` \
             -t cloudcli-server-dev -f Dockerfile.dev . &&\
docker run -d --name cloudcli-server-dev --entrypoint bash \
           -p 8000:8000 -p 8001:8001 \
           -v `pwd`:/home/cloudwm/cloudcli-server cloudcli-server-dev -c "tail -f /dev/null"
```

Install the project dependencies:

```
docker exec -it cloudcli-server-dev composer install
```

Start the cloudcli test server which can be used for debugging without performing any actions:

```
docker exec -e APP_DEBUG=true -e CLOUDCLI_PROVIDER=test -it cloudcli-server-dev php artisan serve --host=0.0.0.0
```

Open a new terminal and run cloudcli, connecting to the test server:

```
cloudcli --api-server http://localhost:8000 server list
```

Start a proxy server which forwards requests to a compatible API server

```
docker exec -e APP_DEBUG=true -e CLOUDCLI_API_SERVER=http://server.example.com -e CLOUDCLI_PROVIDER=proxy \
            -it cloudcli-server-dev php artisan serve --host=0.0.0.0
``` 
