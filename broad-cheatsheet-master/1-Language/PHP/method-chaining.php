<?php
/**
 * Method Chaining
 * 
 * A common syntax for invoking multiple method calls
 * in object-oriented programming languages.
 * Each method returns an object,
 * allowing the calls to be chained together
 * in a single statement without requiring variables
 * to store the intermediate results
 */
class A
{
  public $name;
  public $age;

  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }
  public function setAge($age)
  {
    $this->age = $age;
    return $this;
  }
  public function result()
  {
    echo "Name: {$this->name} \n Age: {$this->age}";
  }
}

$obj = new A();
$obj->setName("Foo")->setAge(3)->result(); // Name: Foo Age: 3


class B
{
  public static $name;
  public static $age;

  public static function setName($name)
  {
    self::$name = $name;
    return new static;
  }
  public static function setAge($age)
  {
    self::$age = $age;
    return new static;
  }
  public static function result()
  {
    echo "Name:". self::$name ."\n Age:". self::$age;
  }
}

B::setName("Bar")->setAge(5)->result(); // Name: Foo Age: 3