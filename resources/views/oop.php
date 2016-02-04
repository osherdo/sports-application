
 <?php
 /*
class MyClass
{
  public $prop1 = "I'm a class property!";
  public function setProperty($newval)
    {
        $this->prop1 = $newval;
    }

    public function getProperty()
    {
        return $this->prop1 . "<br/>";
    }
  }
   $obj = new MyClass;// Class instantiation.
  //var_dump($obj);
  echo "1st drill:"."<br>";
  echo $obj->getProperty(); //echo prop1 string (// Get the property value).
  $obj->setProperty('I am a new property value'."<br><br>");
  echo $obj->getProperty(); // Read it out again to show the change.

//Second Drill
echo "second drill: "."<br>";
  class class2 {
    public $obj2="I am the first variable from the second drill.";
    public function setProperty2($newval2)
    {
      $this->obj2=$newval2;
    }

    public function getProperty2()
    {
      return $this->obj2."<br>";
    }
  }
  // Create new object.
$obj2 = new class2;

// Get the value of $prop1 from both objects
echo $obj->getProperty(); //taken from first drill.
echo $obj2->getProperty2($obj2);

// Set new values for both objects
$obj->setProperty("I'm a new property value!");
$obj2->setProperty2("I belong to the second instance!"."<br><br>");

// Output both objects' $prop1 value
echo $obj->getProperty();
echo $obj2->getProperty2();

//Third Drill.
echo "third drill:"."<br><br>";
class MyClass3
{
  public $prop1 = "I'm a class property!";

  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }
  public function __destruct()
    {
        echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }
    public function __toString()
  {
      echo "Using the toString method: ";
      return $this->getProperty();
  }

  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }

  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}

// Create a new object
$obj = new MyClass3;

// Get the value of $prop1
echo $obj->getProperty();

// echo $obj; // Output the object as a string.Will generate an error since you were not using __ToString
//That's To avoid an error if a script attempts to output MyClass as a string.
//After calling the magic method __ToString above you can:
echo $obj;

// Destroy the object
unset($obj);
// Output a message at the end of the file
echo "End of file.<br /><br>";

//Fourth Drill:
echo "Fourth drill:"."<br><br>";
class MyClass4
{
  public $prop1 = "I'm a class property!";

  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }

  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }

  public function __toString()
  {
      echo "Using the toString method: ";
      return $this->getProperty();
  }

  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }

  public function getProperty()
  {
      return $this->prop1 . "<br /><br>";
  }
}

class MyOtherClass extends MyClass4
{
  public function newMethod()
  {
      echo "From a new method in " . __CLASS__ . ".<br />";
  }
}

// Create a new object
$newobj = new MyOtherClass;

// Output the object as a string
echo $newobj->newMethod();

// Use a method from the parent class.
echo $newobj->getProperty();

//Fifth drill:
//Overwriting Inherited Properties and Methods.
echo "Fifth Drill:"."<br><br>";


class MyClass
{
  public $prop1 = "I'm a class property!";

  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }

  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }

  public function __toString()
  {
      echo "Using the toString method: ";
      return $this->getProperty();
  }

  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }

  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}

class MyOtherClass extends MyClass
{
  public function __construct()
  {
      echo "A new constructor in " . __CLASS__ . ".<br />";
  }
/* //destrut MyOtherClass.
  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }


  public function newMethod()
  {
      echo "From a new method in " . __CLASS__ . ".<br />";
  }
}

// Create a new object
$newobj = new MyOtherClass;

// Output the object as a string
echo $newobj->newMethod();

// Use a method from the parent class
echo $newobj->getProperty();

unset($newobj); //generate messsage on browser.


echo "<br><br>"."Sixth Drill"."<br><br>";
echo "Preserving Original Method Functionality While Overwriting Methods:"."<br><br>";
//Using scope resolution operator (::):
//The following won't interpret. look for the next exmaple that's going to work.
class MyClass
{
  public $prop1 = "I'm a class property!";

  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }

  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }

  public function __toString()
  {
      echo "Using the toString method: ";
      return $this->getProperty();
  }

  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }

  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}

class MyOtherClass extends MyClass
{
  public function __construct()
  {
      parent::__construct(); // Call the parent class's constructor
      echo "A new constructor in " . __CLASS__ . ".<br />";
  }

  public function newMethod()
  {
      echo "From a new method in " . __CLASS__ . ".<br />";
  }
}

// Create a new object
$newobj = new MyOtherClass;

// Output the object as a string
echo $newobj->newMethod();

// Use a method from the parent class
echo $newobj->getProperty();
$space="<br><br>";

unset($newobj); //generate messsage on browser.


echo "<br>"."this is a working drill for accessing protected method."."<br>";

class MyClass
{
  public $prop1 = "I'm a class property!";

  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }

  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }

  public function __toString()
  {
      echo "Using the toString method: ";
      return $this->getProperty();
  }

  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }

  protected function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}

class MyOtherClass extends MyClass
{
  public function __construct()
  {
      parent::__construct();
echo "A new constructor in " . __CLASS__ . ".<br />";
  }

  public function newMethod()
  {
      echo "From a new method in " . __CLASS__ . ".<br />";
  }

  public function callProtected()
  {
      return $this->getProperty();
  }
}

// Create a new object
$newobj = new MyOtherClass;

// Call the protected method from within a public method
echo $newobj->callProtected(); //This will allow access to protected method.
unset($newobj);

 echo "Seventh Drill"."<br><br>"."Private Properties and Methods:
";
echo "The code below will generate an error:"."<br><br>";

class MyClass
{
  public $prop1 = "I'm a class property!";

  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }

  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }

  public function __toString()
  {
      echo "Using the toString method: ";
      return $this->getProperty();
  }

  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }

  private function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}

class MyOtherClass extends MyClass
{
  public function __construct()
  {
      parent::__construct();
      echo "A new constructor in " . __CLASS__ . ".<br />";
  }

  public function newMethod()
  {
      echo "From a new method in " . __CLASS__ . ".<br />";
  }

  public function callProtected()
  {
      return $this->getProperty();
  }
}

// Create a new object
$newobj = new MyOtherClass;

// Use a method from the parent class
echo $newobj->callProtected();
unset ($newobj);
*/

echo "Static Properties and Methods"."<br><br>";
echo "Eighth Drill"."<br><br>";

class MyClass
{
  public $prop1 = "I'm a class property!";

  public static $count = 0;

  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }

  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }

  public function __toString()
  {
      echo "Using the toString method: ";
      return $this->getProperty();
  }

  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }

  private function getProperty()
  {
      return $this->prop1 . "<br />";
  }

  public static function plusOne()
  {
      return "The count is " . ++self::$count . ".<br />"; //self to refer to the current class.
      //use  $this->member for non-static members, use self::$member for static members.
  }
}

class MyOtherClass extends MyClass
{
  public function __construct()
  {
      parent::__construct();
      echo "A new constructor in " . __CLASS__ . ".<br />";
  }

  public function newMethod()
  {
      echo "From a new method in " . __CLASS__ . ".<br />";
  }

  public function callProtected()
  {
      return $this->getProperty();
  }
}

do
{
  // Call plusOne without instantiating MyClass
  echo MyClass::plusOne();
} while ( MyClass::$count < 10 );
/** Check out DocBlock to comment better in PHP (for future developers).
*/
?>
