<?php
/**
 * visibility
 */
public // global scope
protected // inheritance scope
private // class scope

/**
 * Scope resolution (::)                                                                                                                                                                                                                                                             operator
 */
static::foo();
self::foo();
parent::foo();
Foo::foo();


// anonymous class
$object = new class() {
  public function helloWorld()
  {
      echo "Hello Word!";
  }
};


class_exist() - if class defined
interface_exist() - if interface defined
method_exist() - if method defined
get_class() - return class name of object
get_parent_class() - return parent class name of object
is_subclass() - if object has parent
get_declared_classes() - return list of declared class
get_class_methods() - return class name of methods
get_class_vars() - return default properties of class

/**
 * Magic methods
 */
public function __construct()
public function __destruct()
public function __get()
public function __set()
public function __call()
public function __callStatic()
public function __invoke()
public function __clone()
public function __isset()
public function __unset()
public function __toString()
public function __serialize()
public function __unserialize()
public function __sleep()
public function __wakeup()
public static function __set_state()
public function __debugInfo()

/**
 * Final keyword
 *  
 * Prevent overriding
 */ 
final class Foo {} // cannot extend
final public function foo() {} // cannot override

/**
 * ABSTRACT
 * 
 * cannot create object
 */
abstract class Foo
{
  public $prop;

  public function __construct() {
    $this->prop = 'string';
  }

  abstract function functionName(); // abstract function - non-defined method
}

class Bar extends Foo
{
  public function functionName() // overide abstract function
  {
    echo "Abstract string";
  }
}

$object = new Bar();
$object->functionName();
echo $object->prop; // from abstract constructor

/**
 * INTERFACE
 * 
 * Not a class
 * can declare only constant variable
 */
interface FooInterface
{
  const X = 'string';
  function functionX();
}
interface BarInterface
{
  const Y = 'string';
  function functionY();
}
interface FooBarInterface
{
  const Z = 'string';
  const X = 'string';
  const Y = 'string';
  function functionZ();
}



class Foobar implements FooInterface, BarInterface, FooBarInterface
{
  function functionX(){
  }
  function functionY(){
  }
  function functionZ(){
  }
}

$object = new Foobar();
echo Foobar::X; // echo const X var
echo Foobar::Y;
echo Foobar::Z;

/**
 * TRAIT
 * 
 * Not a class
 * Contract between itself and class that impletements interface
 * similar to include() function
 */
trait FooTrait
{
  public $x = 'string';
  function functionName()
  {
    return $this->x;
  }
}

class Foo implements FooInterface
{
  use FooTrait;
}

$object = new Foo();
echo $object->functionName();