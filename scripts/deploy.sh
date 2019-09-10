#!/usr/bin/env sh

USER=root
HOST=public-office.info
WEBROOT=/var/www/index-journal.org

ssh $USER@$HOST /bin/bash <<EOF
  cd $WEBROOT
  git fetch
  git reset --hard origin/master
  yarn install
  yarn run build

  sudo chown -R www-data:www-data .

EOF
