<?php

require_once( '../config.php' );

$success = null;

$html_sql_statement = "

--&nbsp;-------------------------------------------<br>
--&nbsp;Sams&nbsp;Teach&nbsp;Yourself&nbsp;SQL&nbsp;in&nbsp;10&nbsp;Minutes<br>
--&nbsp;http://forta.com/books/0672336073/<br>
--&nbsp;Example&nbsp;table&nbsp;population&nbsp;scripts&nbsp;for&nbsp;MySQL.<br>
--&nbsp;-------------------------------------------<br>
<br>
<br>
--&nbsp;------------------------<br>
--&nbsp;Populate&nbsp;Customers&nbsp;table<br>
--&nbsp;------------------------<br>
INSERT&nbsp;INTO&nbsp;Customers(cust_id,&nbsp;cust_name,&nbsp;cust_address,&nbsp;cust_city,&nbsp;cust_state,&nbsp;cust_zip,&nbsp;cust_country,&nbsp;cust_contact,&nbsp;cust_email)<br>
VALUES('1000000001',&nbsp;'Village&nbsp;Toys',&nbsp;'200&nbsp;Maple&nbsp;Lane',&nbsp;'Detroit',&nbsp;'MI',&nbsp;'44444',&nbsp;'USA',&nbsp;'John&nbsp;Smith',&nbsp;'sales@villagetoys.com');<br>
INSERT&nbsp;INTO&nbsp;Customers(cust_id,&nbsp;cust_name,&nbsp;cust_address,&nbsp;cust_city,&nbsp;cust_state,&nbsp;cust_zip,&nbsp;cust_country,&nbsp;cust_contact)<br>
VALUES('1000000002',&nbsp;'Kids&nbsp;Place',&nbsp;'333&nbsp;South&nbsp;Lake&nbsp;Drive',&nbsp;'Columbus',&nbsp;'OH',&nbsp;'43333',&nbsp;'USA',&nbsp;'Michelle&nbsp;Green');<br>
INSERT&nbsp;INTO&nbsp;Customers(cust_id,&nbsp;cust_name,&nbsp;cust_address,&nbsp;cust_city,&nbsp;cust_state,&nbsp;cust_zip,&nbsp;cust_country,&nbsp;cust_contact,&nbsp;cust_email)<br>
VALUES('1000000003',&nbsp;'Fun4All',&nbsp;'1&nbsp;Sunny&nbsp;Place',&nbsp;'Muncie',&nbsp;'IN',&nbsp;'42222',&nbsp;'USA',&nbsp;'Jim&nbsp;Jones',&nbsp;'jjones@fun4all.com');<br>
INSERT&nbsp;INTO&nbsp;Customers(cust_id,&nbsp;cust_name,&nbsp;cust_address,&nbsp;cust_city,&nbsp;cust_state,&nbsp;cust_zip,&nbsp;cust_country,&nbsp;cust_contact,&nbsp;cust_email)<br>
VALUES('1000000004',&nbsp;'Fun4All',&nbsp;'829&nbsp;Riverside&nbsp;Drive',&nbsp;'Phoenix',&nbsp;'AZ',&nbsp;'88888',&nbsp;'USA',&nbsp;'Denise&nbsp;L.&nbsp;Stephens',&nbsp;'dstephens@fun4all.com');<br>
INSERT&nbsp;INTO&nbsp;Customers(cust_id,&nbsp;cust_name,&nbsp;cust_address,&nbsp;cust_city,&nbsp;cust_state,&nbsp;cust_zip,&nbsp;cust_country,&nbsp;cust_contact)<br>
VALUES('1000000005',&nbsp;'The&nbsp;Toy&nbsp;Store',&nbsp;'4545&nbsp;53rd&nbsp;Street',&nbsp;'Chicago',&nbsp;'IL',&nbsp;'54545',&nbsp;'USA',&nbsp;'Kim&nbsp;Howard');<br>
<br>
--&nbsp;----------------------<br>
--&nbsp;Populate&nbsp;Vendors&nbsp;table<br>
--&nbsp;----------------------<br>
INSERT&nbsp;INTO&nbsp;Vendors(vend_id,&nbsp;vend_name,&nbsp;vend_address,&nbsp;vend_city,&nbsp;vend_state,&nbsp;vend_zip,&nbsp;vend_country)<br>
VALUES('BRS01','Bears&nbsp;R&nbsp;Us','123&nbsp;Main&nbsp;Street','Bear&nbsp;Town','MI','44444',&nbsp;'USA');<br>
INSERT&nbsp;INTO&nbsp;Vendors(vend_id,&nbsp;vend_name,&nbsp;vend_address,&nbsp;vend_city,&nbsp;vend_state,&nbsp;vend_zip,&nbsp;vend_country)<br>
VALUES('BRE02','Bear&nbsp;Emporium','500&nbsp;Park&nbsp;Street','Anytown','OH','44333',&nbsp;'USA');<br>
INSERT&nbsp;INTO&nbsp;Vendors(vend_id,&nbsp;vend_name,&nbsp;vend_address,&nbsp;vend_city,&nbsp;vend_state,&nbsp;vend_zip,&nbsp;vend_country)<br>
VALUES('DLL01','Doll&nbsp;House&nbsp;Inc.','555&nbsp;High&nbsp;Street','Dollsville','CA','99999',&nbsp;'USA');<br>
INSERT&nbsp;INTO&nbsp;Vendors(vend_id,&nbsp;vend_name,&nbsp;vend_address,&nbsp;vend_city,&nbsp;vend_state,&nbsp;vend_zip,&nbsp;vend_country)<br>
VALUES('FRB01','Furball&nbsp;Inc.','1000&nbsp;5th&nbsp;Avenue','New&nbsp;York','NY','11111',&nbsp;'USA');<br>
INSERT&nbsp;INTO&nbsp;Vendors(vend_id,&nbsp;vend_name,&nbsp;vend_address,&nbsp;vend_city,&nbsp;vend_state,&nbsp;vend_zip,&nbsp;vend_country)<br>
VALUES('FNG01','Fun&nbsp;and&nbsp;Games','42&nbsp;Galaxy&nbsp;Road','London',&nbsp;NULL,'N16&nbsp;6PS',&nbsp;'England');<br>
INSERT&nbsp;INTO&nbsp;Vendors(vend_id,&nbsp;vend_name,&nbsp;vend_address,&nbsp;vend_city,&nbsp;vend_state,&nbsp;vend_zip,&nbsp;vend_country)<br>
VALUES('JTS01','Jouets&nbsp;et&nbsp;ours','1&nbsp;Rue&nbsp;Amusement','Paris',&nbsp;NULL,'45678',&nbsp;'France');<br>
<br>
--&nbsp;-----------------------<br>
--&nbsp;Populate&nbsp;Products&nbsp;table<br>
--&nbsp;-----------------------<br>
INSERT&nbsp;INTO&nbsp;Products(prod_id,&nbsp;vend_id,&nbsp;prod_name,&nbsp;prod_price,&nbsp;prod_desc)<br>
VALUES('BR01',&nbsp;'BRS01',&nbsp;'8&nbsp;inch&nbsp;teddy&nbsp;bear',&nbsp;5.99,&nbsp;'8&nbsp;inch&nbsp;teddy&nbsp;bear,&nbsp;comes&nbsp;with&nbsp;cap&nbsp;and&nbsp;jacket');<br>
INSERT&nbsp;INTO&nbsp;Products(prod_id,&nbsp;vend_id,&nbsp;prod_name,&nbsp;prod_price,&nbsp;prod_desc)<br>
VALUES('BR02',&nbsp;'BRS01',&nbsp;'12&nbsp;inch&nbsp;teddy&nbsp;bear',&nbsp;8.99,&nbsp;'12&nbsp;inch&nbsp;teddy&nbsp;bear,&nbsp;comes&nbsp;with&nbsp;cap&nbsp;and&nbsp;jacket');<br>
INSERT&nbsp;INTO&nbsp;Products(prod_id,&nbsp;vend_id,&nbsp;prod_name,&nbsp;prod_price,&nbsp;prod_desc)<br>
VALUES('BR03',&nbsp;'BRS01',&nbsp;'18&nbsp;inch&nbsp;teddy&nbsp;bear',&nbsp;11.99,&nbsp;'18&nbsp;inch&nbsp;teddy&nbsp;bear,&nbsp;comes&nbsp;with&nbsp;cap&nbsp;and&nbsp;jacket');<br>
INSERT&nbsp;INTO&nbsp;Products(prod_id,&nbsp;vend_id,&nbsp;prod_name,&nbsp;prod_price,&nbsp;prod_desc)<br>
VALUES('BNBG01',&nbsp;'DLL01',&nbsp;'Fish&nbsp;bean&nbsp;bag&nbsp;toy',&nbsp;3.49,&nbsp;'Fish&nbsp;bean&nbsp;bag&nbsp;toy,&nbsp;complete&nbsp;with&nbsp;bean&nbsp;bag&nbsp;worms&nbsp;with&nbsp;which&nbsp;to&nbsp;feed&nbsp;it');<br>
INSERT&nbsp;INTO&nbsp;Products(prod_id,&nbsp;vend_id,&nbsp;prod_name,&nbsp;prod_price,&nbsp;prod_desc)<br>
VALUES('BNBG02',&nbsp;'DLL01',&nbsp;'Bird&nbsp;bean&nbsp;bag&nbsp;toy',&nbsp;3.49,&nbsp;'Bird&nbsp;bean&nbsp;bag&nbsp;toy,&nbsp;eggs&nbsp;are&nbsp;not&nbsp;included');<br>
INSERT&nbsp;INTO&nbsp;Products(prod_id,&nbsp;vend_id,&nbsp;prod_name,&nbsp;prod_price,&nbsp;prod_desc)<br>
VALUES('BNBG03',&nbsp;'DLL01',&nbsp;'Rabbit&nbsp;bean&nbsp;bag&nbsp;toy',&nbsp;3.49,&nbsp;'Rabbit&nbsp;bean&nbsp;bag&nbsp;toy,&nbsp;comes&nbsp;with&nbsp;bean&nbsp;bag&nbsp;carrots');<br>
INSERT&nbsp;INTO&nbsp;Products(prod_id,&nbsp;vend_id,&nbsp;prod_name,&nbsp;prod_price,&nbsp;prod_desc)<br>
VALUES('RGAN01',&nbsp;'DLL01',&nbsp;'Raggedy&nbsp;Ann',&nbsp;4.99,&nbsp;'18&nbsp;inch&nbsp;Raggedy&nbsp;Ann&nbsp;doll');<br>
INSERT&nbsp;INTO&nbsp;Products(prod_id,&nbsp;vend_id,&nbsp;prod_name,&nbsp;prod_price,&nbsp;prod_desc)<br>
VALUES('RYL01',&nbsp;'FNG01',&nbsp;'King&nbsp;doll',&nbsp;9.49,&nbsp;'12&nbsp;inch&nbsp;king&nbsp;doll&nbsp;with&nbsp;royal&nbsp;garments&nbsp;and&nbsp;crown');<br>
INSERT&nbsp;INTO&nbsp;Products(prod_id,&nbsp;vend_id,&nbsp;prod_name,&nbsp;prod_price,&nbsp;prod_desc)<br>
VALUES('RYL02',&nbsp;'FNG01',&nbsp;'Queen&nbsp;doll',&nbsp;9.49,&nbsp;'12&nbsp;inch&nbsp;queen&nbsp;doll&nbsp;with&nbsp;royal&nbsp;garments&nbsp;and&nbsp;crown');<br>
<br>
--&nbsp;---------------------<br>
--&nbsp;Populate&nbsp;Orders&nbsp;table<br>
--&nbsp;---------------------<br>
INSERT&nbsp;INTO&nbsp;Orders(order_num,&nbsp;order_date,&nbsp;cust_id)<br>
VALUES(20005,&nbsp;'2012-05-01',&nbsp;'1000000001');<br>
INSERT&nbsp;INTO&nbsp;Orders(order_num,&nbsp;order_date,&nbsp;cust_id)<br>
VALUES(20006,&nbsp;'2012-01-12',&nbsp;'1000000003');<br>
INSERT&nbsp;INTO&nbsp;Orders(order_num,&nbsp;order_date,&nbsp;cust_id)<br>
VALUES(20007,&nbsp;'2012-01-30',&nbsp;'1000000004');<br>
INSERT&nbsp;INTO&nbsp;Orders(order_num,&nbsp;order_date,&nbsp;cust_id)<br>
VALUES(20008,&nbsp;'2012-02-03',&nbsp;'1000000005');<br>
INSERT&nbsp;INTO&nbsp;Orders(order_num,&nbsp;order_date,&nbsp;cust_id)<br>
VALUES(20009,&nbsp;'2012-02-08',&nbsp;'1000000001');<br>
<br>
--&nbsp;-------------------------<br>
--&nbsp;Populate&nbsp;OrderItems&nbsp;table<br>
--&nbsp;-------------------------<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20005,&nbsp;1,&nbsp;'BR01',&nbsp;100,&nbsp;5.49);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20005,&nbsp;2,&nbsp;'BR03',&nbsp;100,&nbsp;10.99);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20006,&nbsp;1,&nbsp;'BR01',&nbsp;20,&nbsp;5.99);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20006,&nbsp;2,&nbsp;'BR02',&nbsp;10,&nbsp;8.99);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20006,&nbsp;3,&nbsp;'BR03',&nbsp;10,&nbsp;11.99);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20007,&nbsp;1,&nbsp;'BR03',&nbsp;50,&nbsp;11.49);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20007,&nbsp;2,&nbsp;'BNBG01',&nbsp;100,&nbsp;2.99);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20007,&nbsp;3,&nbsp;'BNBG02',&nbsp;100,&nbsp;2.99);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20007,&nbsp;4,&nbsp;'BNBG03',&nbsp;100,&nbsp;2.99);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20007,&nbsp;5,&nbsp;'RGAN01',&nbsp;50,&nbsp;4.49);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20008,&nbsp;1,&nbsp;'RGAN01',&nbsp;5,&nbsp;4.99);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20008,&nbsp;2,&nbsp;'BR03',&nbsp;5,&nbsp;11.99);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20008,&nbsp;3,&nbsp;'BNBG01',&nbsp;10,&nbsp;3.49);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20008,&nbsp;4,&nbsp;'BNBG02',&nbsp;10,&nbsp;3.49);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20008,&nbsp;5,&nbsp;'BNBG03',&nbsp;10,&nbsp;3.49);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20009,&nbsp;1,&nbsp;'BNBG01',&nbsp;250,&nbsp;2.49);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20009,&nbsp;2,&nbsp;'BNBG02',&nbsp;250,&nbsp;2.49);<br>
INSERT&nbsp;INTO&nbsp;OrderItems(order_num,&nbsp;order_item,&nbsp;prod_id,&nbsp;quantity,&nbsp;item_price)<br>
VALUES(20009,&nbsp;3,&nbsp;'BNBG03',&nbsp;250,&nbsp;2.49);<br>

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
