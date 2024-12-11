#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS testing;
    GRANT ALL PRIVILEGES ON \`testing%\`.* TO '$MYSQL_USER'@'%';

    CREATE DATABASE IF NOT EXISTS motosapp_db;
    GRANT ALL PRIVILEGES ON motosapp_db.* TO '$MYSQL_USER'@'%';
    FLUSH PRIVILEGES;
EOSQL

