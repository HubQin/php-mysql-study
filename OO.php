<?php
  //declare a class
  class classname
  {
	private $attribute1;//visit private property outside class, __set and __get will called.
	public $attribute2;
	protected $attribute3;
	const constant = "constant value";//can not prefix with $
	
	/*function __construct($param)
	{
		echo "Constructor called with parameter ".$param."<br />";
	}*/
	function operation1()
	{

	}
	function operation2($param1, $param2)
	{

	}
	function __destruct()
	{
		echo "Destruct called ...Destroying ".$this->name." <br />";//should remove $ before 			'name',otherwise error:occues:Cannot access empty property.
	}

	function __get($name) // function names starting with __ are magic methods.
	{
		echo "function __get called...<vr />";
		return $this->$name; 
	}
	function __set($name, $value)
	{
		
		$this->$name = $value;
		echo "function __set called...<br />";
	}
	function showConstant()
	{
		echo self::constant;
	}
  }

  $a = new classname();
  //$b = new classname("Second");
  //$c = new classname("");
  $a->attribute1 = 5;
  echo " the value of attribute1 is ". $a->attribute1 ."<br />";
  echo  classname::constant."<br />";
  echo $a->showConstant()."<br />";

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
  if($I instanceof Displayable)  // return true,the book is wrong
  {
	echo "\$I is instance of Displayable.<br />";
  }
  else 
  {
	echo "\$I is not instance of Displyable.<br />";
  }
// ***use Trait***
  trait book
  {
	function canRead()
	{
		echo "book can read.<br />";
	}
  }
  trait story
  {
	function canHear()
	{
		echo "story is funny.<br />";
	}
  }

  class storybook
  {
	use book,story;
  }
  $book = new storybook;
  $book->canRead();
  $book->canHear();

// Iterator
class MyIterator implements IteratorAggregate
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function getIterator()
	{
		return new ArrayIterator($this->var);
	}
}

$values = array('a','b','c');
$it = new MyIterator($values);
echo "<pre>";
foreach ($it as $a => $b) {
    print "$a: $b\n";
}
echo "</pre>";
?>
