<?php
  //declare a class
  class classname
  {
	public $attribute1;
	public $attribute2;
	
	function __construct($param)
	{
		echo "Constructor called with parameter ".$param."<br />";
	}
	function operation1()
	{

	}
	function operation2($param1, $param2)
	{

	}
	function __destruct()
	{
		echo "Destruct called ...Destroying ".$this->name." <br />";
	}

	function __get($name) // function names starting with __ are magic methods.
	{
		return $this->name; //should remove $ before 'name',otherwise error:occues:Cannot access empty property.($this->property,self::$property(static))
	}
	function __set($name, $value)
	{
		$this->name = $value;
	}
  }

  $a = new classname("First");
  $b = new classname("Second");
  $c = new classname("");
  $a->$attribute1 = 5;

  // ******test overloading,subclass******
  class A
  {
	public $attribute = "default value";
	
	function operation()  //you can add 'final' in front to prevent overriding
	{
		echo "Something<br />";
		echo "The value of \$attribute is ". $this->attribute."<br />";
	}
  }
  // notice:multiple inheritance is invalid in php(ex:c inherit from a and b)
  class B extends A
  {
	public $attribute = "different value";
	
	function operation()
	{
		echo "Something else<br />";
		echo "The value of \$attribute is ". $this->attribute."<br />";
	}
  }
  $x = new A();
  $x->operation();
  $y = new B();
  $y->operation();

//**test interface**
  interface Displayable
  {
	function display();
  }
  class webPage implements Displayable
  {
	function display()
	{
		echo "Implements of display.<br />";
	}
  }
  $I = new webPage();
  $I->display();
?>
