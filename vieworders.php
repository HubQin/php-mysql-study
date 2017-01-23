<?php
  //create short variable name
  $DOCUMENT_ROOT = $_SERVER[ 'DOCUMENT_ROOT' ];
?>
<html>
<head>
<tittle>Bob's Auto Parts - Customer Orders</tittle>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Orders</h2>
<?php
  @$fp = fopen("$DOCUMENT_ROOT/orders/orders.txt",'rb');
  if (!$fp) {
	echo "<p><strong>No orders peding!</strong></p>";
	exit;
  }
  while (!feof($fp)) {
	$order = fgets($fp,999);
	echo $order."<br />";
  }
?>
</body>
</html>
