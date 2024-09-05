#!/usr/bin/env sh

# PROJECT=${PWD##*/}  # get project directory name
HOST=ubuntu@45.32.247.37
WEBROOT=/etc/easypanel/projects/memo/index-journal/volumes

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./

