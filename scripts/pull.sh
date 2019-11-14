#!/usr/bin/env sh

HOST=root@public-office.info
WEBROOT=/var/www/index-journal.org

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./
