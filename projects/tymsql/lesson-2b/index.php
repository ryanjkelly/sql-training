<?php

require_once( '../config.php' );

$html_sql_statement = "
SELECT&nbsp;prod_id,&nbsp;prod_name,&nbsp;prod_price<br>
FROM&nbsp;Products;
";

$sql_statement = str_replace( '&nbsp;', ' ', $html_sql_statement );
$sql_statement = str_replace( '<br>', '', $sql_statement );

$products = $db->rawQuery( $sql_statement );

$success = count( $products ) > 0 ? true : false;

$rowNum = 0;

$html_render = '<table class="table table-hover table-striped table-bordered table-dark">';
$html_render .= '<thead><tr>';
$html_render .= '<th scope="col">#</th>';
$html_render .= '<th scope="col">Product ID</th>';
$html_render .= '<th scope="col">Product Name</th>';
$html_render .= '<th scope="col">Product Price</th>';
$html_render .= '</tr></thead>';
$html_render .= '<tbody>';

foreach ( $products as $product ) {

  $html_render .= '<tr>';
  $html_render .= '<th scope="row">' . ++$rowNum . "</li>";
  $html_render .= '<td>' . $product['prod_id'] . '</td>';
  $html_render .= '<td>' . $product['prod_name'] . '</td>';
  $html_render .= '<td>' . $product['prod_price'] . '</td>';
  $html_render .= '</tr>';

}

$html_render .= '</tbody>';
$html_render .= '</table>';

$output = [
  'status' => $success ? 'success' : 'failed',
  'code' => $success ? 200 : 400,
  'data' => [
    'input' => $html_sql_statement,
    'output' => $html_render
  ]
];

header( 'Content-Type: application/json' );

http_response_code( $output['code'] );

echo json_encode( $output );
