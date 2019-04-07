#!/usr/bin/env bash

if [ "${API_KEY}" == "" ]; then
    export API_KEY="$(head /dev/urandom | tr -dc A-Za-z0-9 | head -c 32 ; echo '')"
    echo "Generated random API_KEY: ${API_KEY}"
fi

if which apache2-foreground >/dev/null 2>&1; then
    exec apache2-foreground
else
    if [ "$*" == "" ]; then
        php -S 0.0.0.0:8000 -t public
    else
        exec "$@"
    fi
fi
