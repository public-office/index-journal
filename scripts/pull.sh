#!/usr/bin/env sh

HOST=root@128.199.108.233
WEBROOT=/var/www/index-journal.org

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./
