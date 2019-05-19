#!/usr/bin/env bash

DOCKER_IMAGE=cloudwm/cloudcli-server

CLOUDCLI_VERSION=v0.1.1

if [ "${1}" == "script" ]; then
    docker pull ${DOCKER_IMAGE}:latest
    ! docker build --cache-from ${DOCKER_IMAGE}:latest -t ${DOCKER_IMAGE}:latest -t ${DOCKER_IMAGE}:${TRAVIS_COMMIT} . && exit 1
    echo "Running cloudcli tests"
    docker run -d --sig-proxy=false -e CLOUDCLI_PROVIDER=proxy -e CLOUDCLI_API_SERVER=$TEST_API_SERVER -p 8080:80 ${DOCKER_IMAGE}:${TRAVIS_COMMIT}
    sleep 5
    git clone https://github.com/cloudwm/cloudcli.git -b $CLOUDCLI_VERSION
    cd cloudcli
    wget https://github.com/cloudwm/cloudcli/releases/download/$CLOUDCLI_VERSION/cloudcli-linux-amd64 -O cloudcli
    sudo chown $USER ./cloudcli && sudo chmod +x ./cloudcli
    export PATH="`pwd`:${PATH}"
    export DEBUG_OUTPUT_FILE=/dev/null
    export TEST_API_SERVER=http://localhost:8080
    ! bash tests/test_all.sh && exit 1
    exit 0
elif [ "${1}" == "deploy" ]; then
    docker push ${DOCKER_IMAGE}:latest && docker push ${DOCKER_IMAGE}:${TRAVIS_COMMIT} && exit 0
fi; exit 1
