<?php
  try {
	throw new Exception("Fatal error occurs",55);
	}
  catch (Exception $e) {
	echo "Exception ".$e->getCode().": ".$e->getMessage()." in ".$e->getFile()." on line ".
	$e->getLine().".<br />";
	echo $e."<br />";
  }

  class myException extends Exception
  {
	function __toString()
	{
		return "<table border=\"1\">
		<tr>
		<td><strong>Exception ".$this->getCode()."</strong>: ".$this->getMessage().
	"<br />"." in ".$this->getFile()." on line ".$this->getLine()."</td>
		</tr>
		</table><br />";
	}
  }  
  try {
	throw new myException("Fatal error occurs",56);
  }
  catch (myException $m) {
	echo $m;
  }
?>
