<?php

define( 'ROOT_PATH', dirname( dirname( dirname( __FILE__ ) ) ) );

define( 'ABS_PATH', dirname( dirname( __FILE__ ) ) );

define( 'CREDENTIALS_PATH', ROOT_PATH . '/credentials' );

define( 'API_PATH', ABS_PATH . '/api' );

require_once( CREDENTIALS_PATH . '/sql.php' );

require_once( ABS_PATH . '/vendor/autoload.php' );

$db = new MysqliDb( [
    'host' => DB_HOST,
    'username' => DB_USER,
    'password' => DB_PASS,
    'db'=> DB_NAME,
    'port' => DB_PORT
  ] );