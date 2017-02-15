<?php
  class Test
  {
	private $property;

	function __destruct()
	{
		echo "Destroyin ".$this->property."<br />";
	}
	function __set($name,$value)
	{
		$this->$name = $value;
	}
  }
  $a = new Test();
  $a->$property = 5;
?>
