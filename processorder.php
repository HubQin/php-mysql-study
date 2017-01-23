<html>
<head>
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
<?php
  // create short variable names
  $tireqty = $_POST[ 'tireqty' ];
  $oilqty = $_POST[ 'oilqty' ];
  $sparkqty = $_POST[ 'sparkqty' ];
  $address = $_POST[ 'address' ];
  $DOCUMENT_ROOT = $_SERVER[ 'DOCUMENT_ROOT' ];
  $date = date('H:i, jS F Y');

  echo '<p>Order processed at ';
  echo date('H:i, jS F');
  echo '</p>';
  echo '<p>Your order is as follows: </p>';
  echo $tireqty.' tires<br />';
  echo $oilqty.' bottles of oil<br />';
  echo $sparkqty.' spark plugs<br />';

  $totalqty = 0;
  $totalqty = $tireqty + $oilqty + $sparkqty;
  if($totalqty == 0){
	echo "You did not order anything on the previous page!<br />";
	//exit;
}
  echo 'Items ordered: '.$totalqty.'<br />';

  $totalamount = 0.00;

  define('TIREPRICE', 100);
  define('OILPRICE', 10);
  define('SPARKPRICE', 4);

  $totalamount = $tireqty * TIREPRICE
               + $oilqty * OILPRICE
               + $sparkqty * SPARKPRICE;


  echo 'Subtotal: $'.number_format($totalamount,2).'<br />';

  $taxrate = 0.10;  // local sales tax is 10%
  $totalamount = $totalamount * (1 + $taxrate);
  echo 'Total including tax: $'.number_format($totalamount,2).'<br />';

  $find = $_POST[ 'find' ];
  $a = $_POST[ 'a' ];
  $b = $_POST[ 'b' ];
  $c = $_POST[ 'c' ];
  $d = $_POST[ 'd' ];
  switch($find) {
  case "a" :
	echo "<p>Regular customer.<p/>";
	break;
  case "b" :
	echo "<p>Customer referred by TV advert.<p/>";
	break;
  case "c" :
	echo "<p>Customer referred by phone directory.<p/>";
	break;
  case "d" :
	echo "<p>Customer reffered by word of mouth.<p/>";
	break;
  default :
	echo "<p>We do not know how this customer found us.<p/>";
	break;
  }
  
  echo "<p>Address to ship to is $address.<p/>";
  $outputstring = $date."\t ".$tireqty." tires \t".$oilqty." oil \t".$sparkqty." spark plugs \t\$"
                   .$totalamount."\t".$address."\n";

  echo $DOCUMENT_ROOT;
  @ $fp = fopen("$DOCUMENT_ROOT/orders/orders.txt",'ab');
  flock($fp,LOCK_EX);
  if (!$fp) {
	echo "<p><strong> Your order could not be processed at this time. Please try again later.</strong></p>";
	exit;
  }
  fwrite($fp,$outputstring,strlen($outputstring));
  flock($fp,LOCK_UN);
  fclose($fp);
  echo "<p>Order written.</p>";

?>
</body>
</html>

