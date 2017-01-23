<?php
  //create short variable name
  $DOCUMENT_ROOT = $_SERVER[ 'DOCUMENT_ROOT' ];
?>
<html>
<head>
<title>Bob's Auto Parts - Customer Orders</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Orders</h2>
<?php
  // check if the file exits
  if (file_exists("$DOCUMENT_ROOT/orders/orders.txt")) {
	echo "There are orders waiting to be processed.<br />";
  } else {
	echo "There are currently on orders.<br />";
  }
  @$fp = fopen("$DOCUMENT_ROOT/orders/orders.txt",'rb');
  flock($fp,LOCK_SH);//lock file for reading
  //using fgets()
  /*if (!$fp) {
	echo "<p><strong>No orders peding!</strong></p>";
	exit;
  }
  while (!feof($fp)) {
	$order = fgets($fp,999);
	echo $order."<br />";
  } */
  //***end of using fgets()***
  //readfile("$DOCUMENT_ROOT/orders/orders.txt");//using readfile
  //fpassthru($fp);//using fpassthru,need to uncomment line "@$fp = fopen..."
  //echo nl2br(file_get_contents("$DOCUMENT_ROOT/orders/orders.txt"));//using file_get_contents()
  //using fgetc()
 /* while (!feof($fp)) {
	$char = fgetc($fp);
	//echo nl2br($char);//the same as the if below 
    //if (!feof($fp)) { 
	  echo ($char == "\n" ? "<br />" : $char);
    //}
  } */
  //***end of using fgetc()***
  //using fread,filesize
  echo nl2br(fread($fp,filesize("$DOCUMENT_ROOT/orders/orders.txt")));
  //test rewind,ftell
  echo 'The final position of the file pointer is ' .(ftell($fp)).'.<br />';
  rewind($fp);
  echo 'After rewind,the position is '. (ftell($fp)).'.<br />';
  flock($fp,LOCK_UN); //release read lock
  fclose($fp);

?>
</body>
</html>
