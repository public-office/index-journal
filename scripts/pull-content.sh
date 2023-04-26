#!/usr/bin/env sh

# PROJECT=${PWD##*/}  # get project directory name
HOST=ubuntu@67.219.98.22
WEBROOT=/etc/easypanel/projects/memo/index-journal/volumes

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./

