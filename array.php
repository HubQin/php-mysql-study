<?php
  //create an array,initialze,access
  $products = array( 'Tires', 'Oil', 'Spark Plugs');
  sort($products); //sort(),asort(),ksort(),all sort by ascending order
  foreach ($products as $current) {
	echo $current."<br /> ";
  }
  echo "<br />";

  //Non-numeric indeces
  $prices = array('Tires'=>100, 'Oil'=>4, 'Spark Plugs'=>1);
  //asort($prices);// sort by value,it should be 1,4,100
  //ksort($prices); // sort by key,it should be O,S,T
  krsort($prices);// T,S,O
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
////using usort for multidimesion array,notice that,sort by second column,index is 1
  function compare($x,$y) {
	if ($x[1]==$y[1]) { return 0;}
	else if ($x[1]<$y[1]) { return -1; } 
	else { return 1;}
  }
  usort($products_2,'compare'); //the result should be O,S,T
  for ($row = 0; $row < 3; $row++) {
	for ($column = 0; $column < 3; $column++) {
		echo '|'.$products_2[$row][$column];
	}
	echo "<br />";
  }

  //using array_walk()
  echo "<br /><strong>using array_walk():</strong><br />";
  function my_multiple(&$value2,$key,$factor) {  // ampersand before the variable
	$value2 *= $factor;
  }
  function test_print($value3,$key) {
	echo "$key -- $value3 <br />";
  }
  $number_array = range(1,10,1);

  echo "<br />Before multiple...<br />";
  array_walk($number_array,'test_print');

  echo "After multiple...<br />";
  array_walk($number_array, 'my_multiple', 3); //no & before array,the book should be wrong
  array_walk($number_array,'test_print');

  //using array_count_values()
  echo "<br /><strong>using array_count_values():</strong><br />";
  $ac = array(1, "hello", 1, "world", "hello");
  echo "<pre>";
  print_r(array_count_values($ac));
  echo "</pre>";

  //using extract()
  echo "<br /><strong>using extract():extract data into symbol table</strong><br />";
  $size = "large";
  $var_array = array("color" => "blue", "size" => "medium", "shape" => "sphere");
  extract($var_array,EXTR_PREFIX_SAME,'WSS');
  echo "$color, $WSS_size, $shape";
  
  
  
?>
