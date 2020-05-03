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

see [cloudcli README](https://github.com/cloudwm/cloudcli/blob/master/README.md) for cloudcli configuration and usage.

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
export CLOUDCLI_API_SERVER=http://server.example.com
docker exec -e APP_DEBUG=true -e CLOUDCLI_API_SERVER -e CLOUDCLI_PROVIDER=proxy \
            -it cloudcli-server-dev php artisan serve --host=0.0.0.0
``` 

Updating dependencies:

* `docker exec -it cloudcli-server php composer upgrade`

## Deployment to Kubernetes using Rancher

Log-in to Rancher and create a new workload:

* Name: `cloudcli-server`
* Workload Type: Scalable deployment of `1` pods (should be possible to increase if needed)
* Docker Image: `cloudwm/cloudcli-server@sha256:290d67fa7969a0c506f5497804e6371d86760cbd61f89b68043ff3967db3c39c`
  * travis-ci builds a docker image on every push to master
  * you can get an image hash by looking at the job log
* Port Mapping:
  * Publish the container port: 80
  * Protocol: TCP
  * As a: `Cluster IP (Internal only)`
  * On listening port: same as container port
* Environment variables:
  * `CLOUDCLI_API_SERVER` = `https://api.example.com`
  * `CLOUDCLI_PROVIDER` = `proxy`

## Running 3rd party integration tests

Create a Python virtualenv

```
mkdir tests/venv
python3 -m virtualenv -p python3 tests/venv
```

Start cloudcli-server localy

#### Running Libcloud tests

Install Libcloud development version

```
tests/venv/bin/python3 -m pip install -e git+https://git-wip-us.apache.org/repos/asf/libcloud.git@trunk#egg=apache-libcloud
```

Run the tests:

```
export API_CLIENT_ID=XXX
export API_SECRET=YYY
export API_SERVER=localhost
tests/venv/bin/python3 tests/libcloud_create_node.py && tests/venv/bin/python3 tests/libcloud_node_operations.py 
```

#### Running Ansible tests

[Install latest Ansible](https://docs.ansible.com/ansible/latest/installation_guide/intro_installation.html)

Verify version: `ansible-galaxy --version | grep "ansible-galaxy 2.9."`

Install the Kamatera collection:

```
ansible-galaxy collection install --force https://github.com/OriHoch/ansible-collection-kamatera/releases/download/v0.0.1/kamatera-kamatera-0.0.0.tar.gz
```

Run the tests:

```
export KAMATERA_API_CLIENT_ID=
export KAMATERA_API_SECRET=
export KAMATERA_API_URL=http://localhost:8000
tests/venv/bin/python3 tests/ansible.py
```

#### Running Salt tests

Install Salt with Kamatera

```
tests/venv/bin/python3 -m pip install https://github.com/OriHoch/salt/archive/kamatera-cloud.zip
```

Run the tests:

```
export KAMATERA_API_CLIENT_ID=
export KAMATERA_API_SECRET=
export KAMATERA_API_URL=http://localhost:8000
export SALT_BIN_DIR=`pwd`/tests/venv/bin
tests/venv/bin/python3 tests/salt.py
```
