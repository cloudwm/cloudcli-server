#!/usr/bin/env bash

if [ "${API_KEY}" == "" ]; then
    export API_KEY="$(head /dev/urandom | tr -dc A-Za-z0-9 | head -c 32 ; echo '')"
    echo "Generated random API_KEY: ${API_KEY}"
fi

if [ "$*" == "" ]; then
    php -S 0.0.0.0:8000 -t public
else
    exec "$@"
fi
