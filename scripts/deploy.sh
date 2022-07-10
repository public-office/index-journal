#!/usr/bin/env sh
PROJECT=~/sites/index-journal

# Ask the user for a descripion of push
echo Hello, please enter short description of the push:
read varname

DESCRIPTION=$varname

cd $PROJECT
git pull
git add .
git commit -m "$DESCRIPTION"
git push

USER=root
HOST=149.28.168.105
WEBROOT=/var/www/index-journal

ssh -A $USER@$HOST /bin/bash <<EOF
  cd $WEBROOT
  git pull
  sudo chown -R www-data:www-data .
EOF



