<?php

require_once( '../config.php' );

$success = null;

$html_sql_statement = "

DROP TABLE IF EXISTS Customers,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OrderItems,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orders,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Products,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendors;

";

$sql_statement = str_replace( '&nbsp;', ' ', $html_sql_statement );
$sql_statement = str_replace( '<br>', '', $sql_statement );

$db->rawQuery( $sql_statement );

$sql_statement = "
  SELECT
    TABLE_NAME,
    TABLE_ROWS
  FROM
    `information_schema` . `tables`
  WHERE
    `table_schema` = '{$db_name}';
";

$tables = $db->rawQuery( $sql_statement );

$success = count( $tables ) > 0 ? true : false;

$rowNum = 0;

$html_render = '<table class="table table-hover table-striped table-bordered table-dark">';
$html_render .= '<thead><tr>';
$html_render .= '<th scope="col">#</th>';
$html_render .= '<th scope="col">Tables</th>';
$html_render .= '<th scope="col">Rows</th>';
$html_render .= '</tr></thead>';
$html_render .= '<tbody>';

foreach ( $tables as $key => $value ) {

  $html_render .= '<tr>';
  $html_render .= '<th scope="row">' . ++$rowNum . "</li>";
  $html_render .= '<td>' . $value["TABLE_NAME"] . '</td>';
  $html_render .= '<td>' . $value["TABLE_ROWS"] . '</td>';
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
