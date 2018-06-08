<?php

if ( isset( $_GET['err'] ) &&
     $_GET['err'] === '1' ) {

  ini_set( 'display_errors', 1 );
  ini_set( 'display_startup_errors', 1 );
  error_reporting( E_ALL );

}

define( 'ROOT_PATH', dirname( dirname( dirname( __FILE__ ) ) ) );

define( 'ABS_PATH', dirname( dirname( __FILE__ ) ) );

define( 'CREDENTIALS_PATH', ROOT_PATH . '/credentials' );

define( 'INCLUDES_PATH', ABS_PATH . '/includes' );

define( 'API_PATH', ABS_PATH . '/api' );

require_once( ABS_PATH . '/vendor/autoload.php' );

require_once(  INCLUDES_PATH . '/database-instance.php' );

require_once(  INCLUDES_PATH . '/api-class.php' );

$api = new Training\Api();
