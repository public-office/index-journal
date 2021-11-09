#!/usr/bin/env sh

HOST=root@45.77.238.91
WEBROOT=/var/www/index-journal

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./
