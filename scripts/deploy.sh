#!/usr/bin/env sh

USER=root
HOST=45.77.238.91
WEBROOT=/var/www/index-journal

ssh $USER@$HOST /bin/bash <<EOF
  cd $WEBROOT
  git fetch
  git reset --hard origin/master
  yarn install
  yarn run build

  sudo chown -R www-data:www-data .

EOF
