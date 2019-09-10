#!/usr/bin/env sh

HOST=root@178.128.122.112
WEBROOT=/var/www/nextwave

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./
