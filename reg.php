
<?php
preg_match_all("|<[^>]+>(.*)</[^>]+>|U", //u-Greedy mode,U-reverse
    "<b>example: </b><div align=left>this is a test</div>",
    $out, PREG_PATTERN_ORDER);

echo $out[0][0] . ", " . $out[0][1] . "\n";
echo $out[1][0] . ", " . $out[1][1] . "\n";
preg_match_all("/\(?(\d{3})?\)?(?(1)[\-\s])\d{3}-\d{4}/x",
                "Call 555-1212 or 1-800-555-1212", $phones);
echo "<pre>";
print_r($phones);
echo "</pre>";

$subject = array('1', 'a', '2', 'b', '3', 'A', 'B', '4'); 
$pattern = array('/\d/', '/[a-z]/', '/[1a]/');//1./\d/scan '1'-->A:1;/a-z/ scan it--> no match; /[1a]/ scan it-->A:C:1
$replace = array('A:$0', 'B:$0', 'C:$0'); //$0 means the matched result.
echo "<pre>";
echo "preg_filter returns\n";
print_r(preg_filter($pattern, $replace, $subject)); 

echo "preg_replace returns\n";
print_r(preg_replace($pattern, $replace, $subject)); 
echo "</pre>";

$array = array("23.32","22","12.009","23.43.43");
print_r(preg_grep("/^(\d+)?\.\d+\.\d+$/",$array));
echo "<pre>";
print_r(array_flip(get_defined_constants(true)['pcre'])[preg_last_error()]);
echo "</pre>";

?>

