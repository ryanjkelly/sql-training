<?php

require_once( '../config.php' );

$type = isset( $_GET['type'] ) ? $_GET['type'] : null;

$statement = null;

if ( $type === 'user' ) {

  $statement = "
    CREATE TABLE Users (
      UserID int NOT NULL AUTO_INCREMENT,
      LastName varchar(255),
      FirstName varchar(255),
      Username varchar(255),
      City varchar(255),
      PRIMARY KEY (UserID)
    );
  ";

} else if ( $type === 'task' ) {

  $statement = "
    CREATE TABLE Tasks (
      TaskID int NOT NULL AUTO_INCREMENT,
      Title varchar(255),
      AuthorId varchar(255),
      AssigneeId varchar(255),
      PRIMARY KEY (TaskID)
    );
  ";

}

if ( $statement ) {

  $db->rawQuery( $statement );

  $api->output( $type . ' table created', true );

} else {

  $api->output( 'table not created', false );

}
