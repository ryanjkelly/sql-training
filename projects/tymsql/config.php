<?php

if ( isset( $_GET['err'] ) &&
     $_GET['err'] === '1' ) {

  ini_set( 'display_errors', 1 );
  ini_set( 'display_startup_errors', 1 );
  error_reporting( E_ALL );

}

define( 'ROOT_PATH', realpath( __DIR__ . '/../../..' ) );

define( 'ABS_PATH', realpath( __DIR__ . '/../..' ) );

define( 'CREDENTIALS_PATH', ROOT_PATH . '/credentials' );

require_once( ABS_PATH . '/vendor/autoload.php' );

require_once( CREDENTIALS_PATH . '/sql.php' );

$db = new MysqliDb( [
  'host' => DB_HOST,
  'username' => DB_USER,
  'password' => DB_PASS,
  'db'=> 'tysql',
  'port' => DB_PORT
] );
