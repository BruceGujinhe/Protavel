#!/bin/bash

##
## config
echo 'file_uploads = On
upload_max_filesize = 200M
post_max_size = 200M
display_errors = On
error_reporting = E_ALL' > /usr/local/etc/php/conf.d/HeyCommunityCloud.ini


##
##
echo -e "\n\n\n\n"
echo "###################################"
echo "## Deploy"

if [ -n "$MYSQL_PORT_3306_TCP_PORT" ]; then

  export DB_HOST=$MYSQL_PORT_3306_TCP_ADDR
  export DB_PORT=$MYSQL_PORT_3306_TCP_PORT

  if [ -n "$MYSQL_INSTANCE_NAME" ]; then
    export DB_DATABASE=$MYSQL_INSTANCE_NAME
    export DB_USERNAME=$MYSQL_USERNAME
    export DB_PASSWORD=$MYSQL_PASSWORD
  else
    export DB_DATABASE=$MYSQL_ENV_MYSQL_DATABASE
    export DB_USERNAME=root
    export DB_PASSWORD=$MYSQL_ENV_MYSQL_ROOT_PASSWORD
  fi

  echo -e "\n\n" >> /root/.bashrc
  echo "export DB_HOST=$DB_HOST" >> /root/.bashrc
  echo "export DB_PORT=$DB_PORT" >> /root/.bashrc
  echo "export DB_DATABASE=$DB_DATABASE" >> /root/.bashrc
  echo "export DB_USERNAME=$DB_USERNAME" >> /root/.bashrc
  echo "export DB_PASSWORD=$DB_PASSWORD" >> /root/.bashrc
  source /root/.bashrc

  if [ $HC_ENV == 'product' ]; then
    migration='php artisan migrate'
  elif [ $HC_ENV == 'NewProduct' ]; then
    migration='php artisan migrate:refresh'
  elif [ $HC_ENV == 'test' ]; then
    migration='php artisan migrate:refresh --seed'
  elif [ $HC_ENV == 'dev' ]; then
    migration='php artisan migrate:refresh --seed'
  else
    migration='php artisan migrate'
  fi

  loopNum=0
  until eval $migration; do
    echo 'database migration retry ...'
    sleep 1.88;

    loopNum=`expr $loopNum + 1`
    if [ "$loopNum" == 10 ]; then
      echo 'The database migration was not successful'
      echo 'Exit: Service unavailable'

      ## debug
      echo 'check env'
      env

      exit 69
    fi
  done
  echo 'HeyCommunity env is' $HC_ENV
  echo 'With the database and perform the migration'
else
  echo 'There is no database'
fi


##
##
chown -R :www-data .
chmod g+wrx public/uploads


##
##
date
exec "$@"
