#!/usr/bin/env sh

<<<<<<< Updated upstream
=======
LOCAL=~/Sites/index-journal

cd $LOCAL
>>>>>>> Stashed changes
HOST=root@149.28.168.105
WEBROOT=/var/www/index-journal

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./
