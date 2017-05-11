include ${HTTP_TO_HTTPS_REDIRECT};

server {
    listen ${NGINX_LISTEN_PORT};
    root /srv;
    include ${SSL_CONFIG};
    client_max_body_size 10M;


    include directives/gzip.conf;
    include ${APIDOC_CONFIG};
    include locations/php_api.conf;
}