<?php

class newClass{
  //public $error = "this is the class called new class";
  //__CLASS__ -> current classname
    public $error = "this is the class called " . __CLASS__ ."!";
    public static  $static = 0;

    //echo string
  public function  __toString(){
    echo "toString method:";
    return $this -> error;
  }

  public static function staticMethod(){
    //$static -> needed because its static
    //static uses "self" instead of this
    return self::$static + 2;
  }
}

 ?>
