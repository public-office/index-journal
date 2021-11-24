#!/usr/bin/env sh

HOST=root@139.180.178.163
WEBROOT=/var/www/index-journal

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./
