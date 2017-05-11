#!/usr/bin/env sh
set -ef

conf="/etc/nginx/conf.d"
ssl_cert="/certs/domain.crt"
vars='\$NGINX_LISTEN_PORT \$SSL_CONFIG \$HTTP_TO_HTTPS_REDIRECT \$APIDOC_CONFIG'

if [ -n "$EXPOSE_APIDOC" ]; then
    export APIDOC_CONFIG="locations/apidoc.conf"
else
    export APIDOC_CONFIG="empty.conf"
fi

if [ -f $ssl_cert ]; then
    NGINX_LISTEN_PORT="443 ssl"
    SSL_CONFIG="directives/https_config.conf"
    HTTP_TO_HTTPS_REDIRECT="http_to_https_redirect.conf"
fi

export NGINX_LISTEN_PORT=${NGINX_LISTEN_PORT:-80} \
       HTTP_TO_HTTPS_REDIRECT=${HTTP_TO_HTTPS_REDIRECT:-empty.conf} \
       SSL_CONFIG=${SSL_CONFIG:-empty.conf}

envsubst "$vars" < "$conf/default.tpl" > "$conf/default.conf"

nginx -g 'daemon off;'