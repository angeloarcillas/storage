<?php

class newClass{
  //var
  private $data = "property";

//function construct
//this process first
public function __construct(){
  echo "im first"."<br>";
}

//set new var($newData) to var($data)
  public function setProperty($newData){
  $this-> data = $newData;
  }

//get var data
  public function getProperty(){
    return $this -> data;
  }

//function destruct
//this process last
  public function __destruct(){
    echo "<br>"."im last";
  }
}
 ?>
