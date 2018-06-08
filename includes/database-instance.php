<?php

require_once( CREDENTIALS_PATH . '/sql.php' );

$db = new MysqliDb( [
  'host' => DB_HOST,
  'username' => DB_USER,
  'password' => DB_PASS,
  'db'=> DB_NAME,
  'port' => DB_PORT
] );
