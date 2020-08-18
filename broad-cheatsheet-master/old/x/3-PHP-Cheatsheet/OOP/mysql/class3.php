<?php

/**
 *show data from database using php OOP
 */
class viewUsers extends user
{
//show function
public function showUsers(){

  //pass getUsers function datas to var($datas)
  $datas = $this -> getUsers();

  //array $datas value to $name
  foreach ($datas as $name) {
    
//show database values
  echo $name['first']." ". $name['last']. "<br>";
    }
  }
}
 ?>
