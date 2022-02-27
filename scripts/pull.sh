#!/usr/bin/env sh

HOST=root@139.180.170.241
WEBROOT=/var/www/memoreview

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./
