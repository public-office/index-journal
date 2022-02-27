#!/usr/bin/env sh

USER=root
HOST=139.180.170.241
WEBROOT=/var/www/index-journal

ssh -A $USER@$HOST /bin/bash <<EOF
  cd $WEBROOT
  git pull

  sudo chown -R www-data:www-data .

EOF
