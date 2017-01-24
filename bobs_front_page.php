<?php
$pictures = array('images/01.JPG', 'images/02.JPG', 'images/03.JPG','images/04.JPG', 'images/05.JPG','images/06.JPG'); //notice that filename is case sensetive,use xxx.jpg would fail,it should be xxx.JPG just as the original file name
shuffle($pictures);
?>
<html>
<head>
<title>Bob's Auto Parts</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<div align="center">
<table width = 100%>
<tr>
<?php
for ($i = 0; $i < 3; $i++) {
echo "<td align=\"center\"><img src=\"/";
echo $pictures[$i];
echo "\"/></td>";
}
?>
</tr>
</table>
</div>
</body>
</html>
