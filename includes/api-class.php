<?php

namespace Training;

class Api {

  private function get_output( $payload = '', $success = true ) {

    $output = [
      'status' => $success ? 'success' : 'failed',
      'code' => $success ? 200 : 400,
      'result' => is_string( $payload ) || is_array( $payload ) ? $payload : null
    ];

    return $output;

  }

  public function output( $payload = '', $success = true ) {

    $output = $this->get_output( $payload, $success );

    header( 'Content-Type: application/json' );

    http_response_code( $output['code'] );

    echo json_encode( $output );

    exit();

    return;

  }

}
