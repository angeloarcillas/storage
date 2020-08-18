<?php

class users{
public $first  ;
public $last ;
public  $hairColor;
public  $eyeColor;

public function __construct($first,$last,$hairColor,$eyeColor){
  //$first/$last -> this are the var of function not the class
  //iniialize new value
  $this -> first = $first;
  $this -> last = $last;
  $this -> hairColor = $hairColor;
  $this -> eyeColor = $eyeColor;
}
  public function fullName(){
    return $this -> first . " " . $this -> last . " has ths hair color of ". $this -> hairColor;
  }

}

?>
