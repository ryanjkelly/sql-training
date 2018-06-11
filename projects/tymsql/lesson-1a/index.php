<?php

require_once( '../config.php' );

$success = null;

$html_sql_statement = "

--&nbsp;-----------------------------------------<br>
--&nbsp;Sams&nbsp;Teach&nbsp;Yourself&nbsp;SQL&nbsp;in&nbsp;10&nbsp;Minutes<br>
--&nbsp;http://forta.com/books/0672336073/<br>
--&nbsp;Example&nbsp;table&nbsp;creation&nbsp;scripts&nbsp;for&nbsp;MySQL.<br>
--&nbsp;-----------------------------------------<br>
<br>
--&nbsp;----------------------<br>
--&nbsp;Create&nbsp;Customers&nbsp;table<br>
--&nbsp;----------------------<br>
CREATE&nbsp;TABLE&nbsp;Customers<br>
(<br>
&nbsp;&nbsp;cust_id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;char(10)&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;cust_name&nbsp;&nbsp;&nbsp;&nbsp;char(50)&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;cust_address&nbsp;char(50)&nbsp;&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;cust_city&nbsp;&nbsp;&nbsp;&nbsp;char(50)&nbsp;&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;cust_state&nbsp;&nbsp;&nbsp;char(5)&nbsp;&nbsp;&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;cust_zip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;char(10)&nbsp;&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;cust_country&nbsp;char(50)&nbsp;&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;cust_contact&nbsp;char(50)&nbsp;&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;cust_email&nbsp;&nbsp;&nbsp;char(255)&nbsp;NULL<br>
);<br>
<br>
--&nbsp;-----------------------<br>
--&nbsp;Create&nbsp;OrderItems&nbsp;table<br>
--&nbsp;-----------------------<br>
CREATE&nbsp;TABLE&nbsp;OrderItems<br>
(<br>
&nbsp;&nbsp;order_num&nbsp;&nbsp;int&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;order_item&nbsp;int&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;prod_id&nbsp;&nbsp;&nbsp;&nbsp;char(10)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;quantity&nbsp;&nbsp;&nbsp;int&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;item_price&nbsp;decimal(8,2)&nbsp;NOT&nbsp;NULL<br>
);<br>
<br>
--&nbsp;-------------------<br>
--&nbsp;Create&nbsp;Orders&nbsp;table<br>
--&nbsp;-------------------<br>
CREATE&nbsp;TABLE&nbsp;Orders<br>
(<br>
&nbsp;&nbsp;order_num&nbsp;&nbsp;int&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;order_date&nbsp;datetime&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;cust_id&nbsp;&nbsp;&nbsp;&nbsp;char(10)&nbsp;NOT&nbsp;NULL<br>
);<br>
<br>
--&nbsp;---------------------<br>
--&nbsp;Create&nbsp;Products&nbsp;table<br>
--&nbsp;---------------------<br>
CREATE&nbsp;TABLE&nbsp;Products<br>
(<br>
&nbsp;&nbsp;prod_id&nbsp;&nbsp;&nbsp;&nbsp;char(10)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;vend_id&nbsp;&nbsp;&nbsp;&nbsp;char(10)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;prod_name&nbsp;&nbsp;char(255)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;prod_price&nbsp;decimal(8,2)&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;prod_desc&nbsp;&nbsp;text&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NULL<br>
);<br>
<br>
--&nbsp;--------------------<br>
--&nbsp;Create&nbsp;Vendors&nbsp;table<br>
--&nbsp;--------------------<br>
CREATE&nbsp;TABLE&nbsp;Vendors<br>
(<br>
&nbsp;&nbsp;vend_id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;char(10)&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;vend_name&nbsp;&nbsp;&nbsp;&nbsp;char(50)&nbsp;NOT&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;vend_address&nbsp;char(50)&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;vend_city&nbsp;&nbsp;&nbsp;&nbsp;char(50)&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;vend_state&nbsp;&nbsp;&nbsp;char(5)&nbsp;&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;vend_zip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;char(10)&nbsp;NULL&nbsp;,<br>
&nbsp;&nbsp;vend_country&nbsp;char(50)&nbsp;NULL<br>
);<br>
<br>
--&nbsp;-------------------<br>
--&nbsp;Define&nbsp;primary&nbsp;keys<br>
--&nbsp;-------------------<br>
ALTER&nbsp;TABLE&nbsp;Customers&nbsp;ADD&nbsp;PRIMARY&nbsp;KEY&nbsp;(cust_id);<br>
ALTER&nbsp;TABLE&nbsp;OrderItems&nbsp;ADD&nbsp;PRIMARY&nbsp;KEY&nbsp;(order_num,&nbsp;order_item);<br>
ALTER&nbsp;TABLE&nbsp;Orders&nbsp;ADD&nbsp;PRIMARY&nbsp;KEY&nbsp;(order_num);<br>
ALTER&nbsp;TABLE&nbsp;Products&nbsp;ADD&nbsp;PRIMARY&nbsp;KEY&nbsp;(prod_id);<br>
ALTER&nbsp;TABLE&nbsp;Vendors&nbsp;ADD&nbsp;PRIMARY&nbsp;KEY&nbsp;(vend_id);<br>
<br>
--&nbsp;-------------------<br>
--&nbsp;Define&nbsp;foreign&nbsp;keys<br>
--&nbsp;-------------------<br>
ALTER&nbsp;TABLE&nbsp;OrderItems&nbsp;ADD&nbsp;CONSTRAINT&nbsp;FK_OrderItems_Orders&nbsp;FOREIGN&nbsp;KEY&nbsp;(order_num)&nbsp;REFERENCES&nbsp;Orders&nbsp;(order_num);<br>
ALTER&nbsp;TABLE&nbsp;OrderItems&nbsp;ADD&nbsp;CONSTRAINT&nbsp;FK_OrderItems_Products&nbsp;FOREIGN&nbsp;KEY&nbsp;(prod_id)&nbsp;REFERENCES&nbsp;Products&nbsp;(prod_id);<br>
ALTER&nbsp;TABLE&nbsp;Orders&nbsp;ADD&nbsp;CONSTRAINT&nbsp;FK_Orders_Customers&nbsp;FOREIGN&nbsp;KEY&nbsp;(cust_id)&nbsp;REFERENCES&nbsp;Customers&nbsp;(cust_id);<br>
ALTER&nbsp;TABLE&nbsp;Products&nbsp;ADD&nbsp;CONSTRAINT&nbsp;FK_Products_Vendors&nbsp;FOREIGN&nbsp;KEY&nbsp;(vend_id)&nbsp;REFERENCES&nbsp;Vendors&nbsp;(vend_id);

";

$sql_statement = str_replace( '&nbsp;', ' ', $html_sql_statement );
$sql_statement = str_replace( '<br>', '', $sql_statement );
$sql_statements = explode( ';', $sql_statement );

foreach ( $sql_statements as $statement ) {

  if ( strlen( trim( $statement ) ) > 0 ) {

    $db->rawQuery( $statement );

  }

}

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
