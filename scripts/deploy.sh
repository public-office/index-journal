#!/usr/bin/env sh

USER=root
HOST=178.128.122.112
WEBROOT=/var/www/nextwave

ssh $USER@$HOST /bin/bash <<EOF
  cd $WEBROOT
  git fetch
  git reset --hard origin/master
  yarn install
  yarn run build

  sudo chown -R www-data:www-data .

EOF
