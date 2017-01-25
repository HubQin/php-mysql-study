<?php

//create short variable names
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$feedback = addslashes(trim($_POST['feedback'])); //test addslashes and stripslashes
$feedback = stripslashes(trim($_POST['feedback']));

//set up some static information
$toaddress = "feedback@example.com";

$subject = "Feedback from web site";

$mailcontent = "Customer name: ".$name."\n".
			   "Customer email: ".$email."\n".
               "Customer comments:\n".$feedback."\n";

$fromaddress = "From: webserver@example.com";

//invoke mail() function to send mail
mail($toaddress, $subject, $mailcontent, $fromaddress);

?>
<html>
<head>
<title>Bob's Auto Parts - Feedback Submitted</title>
</head>
<body>
<h1>Feedback submitted</h1>
<p>Your feedback (shown below) has been sent.</p>
<p><?php echo nl2br($mailcontent); ?> </p>
<p><?php 
	if (get_magic_quotes_gpc()) {
		echo "yes";
	}
	else { echo "no"; }
 ?> </p>

<p><?php 
	echo "<br /><strong>using strtok():</strong><br />";
	$string = "This is \tan example\nstring";
	$tok = strtok($string," \t\n"); // you should use " " rather than ' '
	while ($tok !== false ) {  // should use !== rather than !=
		echo "word = $tok<br />";
		$tok = strtok("\t\n");
	}
 ?> </p>

<p><?php 
	echo "<br />Using strcmp() and strnatcmp()<br />";
	$array_cmp1= $array_cmp2 = array("img12", "img10", "img2", "img1");
	echo "Standard string compare...<br />";
	usort($array_cmp1,"strcmp");
	echo "<pre>";
	print_r($array_cmp1);
	echo "</pre>";
	echo "Natural string compare...<br />";
	usort($array_cmp2,"strnatcmp");
	echo "<pre>";
	print_r($array_cmp2);
	echo "</pre>";
 ?> </p>

<p><?php 
  echo "<br />Using str_replace()<br />";
  $str = str_replace("ll", "", "good goll miss moll", $count);
  echo $count.'<br />';
  echo $str.'<br />';

 ?> </p>

<p>
<?php
// Outputs F because A is replaced with B, then B is replaced with C, and so on...
// Finally E is replaced with F, because of left to right replacements.
$search  = array('A', 'B', 'C', 'D', 'E');
$replace = array('B', 'C', 'D', 'E', 'F');
$subject = 'A';
echo str_replace($search, $replace, $subject);

// Outputs: apearpearle pear
// For the same reason mentioned above
$letters = array('a', 'p');
$fruit   = array('apple', 'pear');
$text    = 'a p';
$output  = str_replace($letters, $fruit, $text);
echo $output;
?>
</p>

<p>

<?php
$var = 'ABCDEFGH:/MNRPQR/';
echo "Original: $var<hr />\n";

/* These two examples replace all of $var with 'bob'. */
echo substr_replace($var, 'bob', 0) . "<br />\n";
echo substr_replace($var, 'bob', 0, strlen($var)) . "<br />\n";

/* Insert 'bob' right at the beginning of $var. */
echo substr_replace($var, 'bob', 0, 0) . "<br />\n";

/* These next two replace 'MNRPQR' in $var with 'bob'. */
echo substr_replace($var, 'bob', 10, -1) . "<br />\n";
echo substr_replace($var, 'bob', -7, -1) . "<br />\n";

/* Delete 'MNRPQR' from $var. */
echo substr_replace($var, '', 10, -1) . "<br />\n";
?>

Example #2 Using substr_replace() to replace multiple strings at once
<?php
$input = array('A: XXX', 'B: XXX', 'C: XXX');

// A simple case: replace XXX in each string with YYY.
echo implode('; ', substr_replace($input, 'YYY', 3, 3))."\n";

// A more complicated case where each replacement is different.
$replace = array('AAA', 'BBB', 'CCC');
echo implode('; ', substr_replace($input, $replace, 3, 3))."\n";

// Replace a different number of characters each time.
$length = array(1, 2, 3);
echo implode('; ', substr_replace($input, $replace, 3, $length))."\n";
?>

</p>

</body>
</html>
