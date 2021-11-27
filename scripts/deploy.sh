#!/usr/bin/env sh

USER=root
HOST=139.180.178.163
WEBROOT=/var/www/index-journal

ssh -A $USER@$HOST /bin/bash <<EOF
  cd $WEBROOT
  git fetch
  git reset --hard origin/master
  yarn install
  yarn run build

  sudo chown -R www-data:www-data .

EOF
