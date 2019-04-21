#!/usr/bin/env bash

DOCKER_IMAGE=cloudwm/cloudcli-server

if [ "${1}" == "script" ]; then
    docker build -t ${DOCKER_IMAGE}:latest -t ${DOCKER_IMAGE}:${TRAVIS_COMMIT} . && exit 0
elif [ "${1}" == "deploy" ]; then
    docker push ${DOCKER_IMAGE}:latest && docker push ${DOCKER_IMAGE}:${TRAVIS_COMMIT} && exit 0
fi; exit 1
