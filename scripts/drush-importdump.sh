#!/bin/bash

cd "$(dirname "$0")"

if [ ! -f "../dumps/init.sql.gz" ]; then
  echo "Dump file not found."
  exit 0
fi

read -p "Are you sure you want to import database? This will remove all you current changes! " -n 1 -r
if [[ $REPLY =~ ^[Yy]$ ]]
then
  cd .. &&
  ./vendor/bin/drush sql-drop -y &&
  echo "Importing init dump..." &&
  zcat ./dumps/init.sql.gz | ./vendor/bin/drush sqlc
fi
