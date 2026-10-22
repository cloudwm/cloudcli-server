# cloudcli-server

Server-side component to support [cloudcli](https://github.com/cloudwm/cloudcli)

## Running the server with Docker

### PHP security backport (October 2026)

Both Dockerfiles rebuild PHP 7.4.33 with the PHP security team's source
backport for CVE-2026-109618 and CVE-2026-109619. The patch is vendored in
`docker/php-security/` and verified by SHA-256 during the build. Production
rebuilds both the CLI and Apache module; development rebuilds the CLI used by
`artisan serve`. Extension builds use the patched source as well.

This is a temporary compatibility measure. `composer.json` requires PHP `^7.4`,
and the locked `nette/schema`, `nette/utils`, and `phpspec/prophecy` versions
exclude PHP 8.2 and newer. Moving directly to PHP 8.5 requires dependency
upgrades and application compatibility testing. PHP 7.4 and Debian Bullseye
are end-of-life: this backport addresses the two listed PHP vulnerabilities,
not all outstanding runtime, OS, or application dependency vulnerabilities.
The build installs Bullseye's final archived updates with package signature
verification enabled. A supported PHP/framework/OS migration remains necessary.

Rebuild **both** images and replace running containers to activate the fix;
restarting a container created from an older image does not update its PHP:

```sh
docker build --pull -t cloudcli-server:php-security .
docker build --pull -f Dockerfile.dev \
  --build-arg CLOUDCLI_USER_ID="$(id -u)" \
  --build-arg CLOUDCLI_GROUP_ID="$(id -g)" \
  -t cloudcli-server-dev:php-security .
docker image inspect cloudcli-server:php-security \
  --format '{{ index .Config.Labels "org.cloudcli.php-security-backport" }}'
```

The label must be `712e60f9edfd03f0960fc4fc3c2c375f42b90aa2`.
`php --version` still reports 7.4.33, so version-only scanners cannot identify
this backport. The build checks the patch checksum, applies it without fuzzy
matching, and verifies a new engine symbol in each installed PHP binary.
Smoke-test with `CLOUDCLI_PROVIDER=test` before promoting the rebuilt image.
Do not roll back to an unpatched image in response to unrelated deployment
issues; retain a previously validated patched image for rollback.

Sources: [PHP security advisory](https://www.php.net/archive/2026.php#2026-10-21-5),
[upstream backport commit](https://github.com/php/php-src/commit/712e60f9edfd03f0960fc4fc3c2c375f42b90aa2).

### Build and run

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
           --network host \
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
export CLOUDCLI_API_SERVER=https://console.kamatera.com
docker exec -e CLOUDCLI_API_SERVER -e CLOUDCLI_PROVIDER=proxy \
            -it cloudcli-server-dev php artisan serve --host=0.0.0.0
``` 

Updating dependencies:

* `docker exec -it cloudcli-server-dev composer upgrade`

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
