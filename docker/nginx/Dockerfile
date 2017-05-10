FROM nginx:1.11-alpine

COPY config /etc/nginx/
COPY entrypoint/entrypoint.sh /usr/local/bin/entrypoint.sh

CMD ["sh", "/usr/local/bin/entrypoint.sh"]
