<?php
  //create an array,initialze,access
  $products = array( 'Tires', 'Oil', 'Spark Plugs');
  foreach ($products as $current) {
	echo $current."<br /> ";
  }
  echo "<br />";

  //Non-numeric indeces
  $prices = array('Tires'=>100, 'Oil'=>4, 'Spark Plugs'=>1);
  foreach ($prices as $key => $value) {
	echo $key."-".$value."<br />";
  }
  echo "<br />";
  
//using each() and list()
  echo "<strong>using each() and list() :</strong><br /><br />";
  reset($prices);
  while ($element = each($prices)) {
	echo $element[ 'key' ];
	echo " - ";
	echo $element[ 'value' ];
	echo "<br />";
  }
  echo "<br />";
  reset($prices);
  while (list($product,$price) = each($prices)) {
	echo $product. " - " .$price."<br />";
  }

  //Multidimesion arrays
  echo "<br />";
  echo "<strong>using Multidimesion arrays</strong><br />";
  echo "<br />";
  $products_2 = array(array('TIR','Tires',100),
		      array('OIL','Oil',4),
		      array('SPK','Spark Plugs',1));
  for ($row = 0; $row < 3; $row++) {
	for ($column = 0; $column < 3; $column++) {
		echo '|'.$products_2[$row][$column];
	}
	echo "<br />";
  }

  
  
?>
