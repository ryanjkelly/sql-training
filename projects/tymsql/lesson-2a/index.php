<?php

require_once( '../config.php' );

$statement = "
  SELECT prod_name
  FROM Products;
";

$products = $db->rawQuery( $statement );

?>

<h1>Teach Yourself SQL (page 14)</h1>

<h2>INPUT:</h2>

<p>
  SELECT prod_name<br>
  FROM Products
</p>

<h2>OUTPUT:</h2>

<ul>

  <?php foreach ( $products as $product ): ?>

    <li><?php echo $product['prod_name']; ?></li>

  <?php endforeach; ?>

</ul>
