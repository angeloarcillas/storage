<?php

/**
 *fetch data from db using OOP
 */
class user extends connection
{
  //function to get users data
  protected function getUsers(){

    //query value from db
    $sql = "SELECT * FROM users";
    $result = $this->connect()->query($sql);

    //check if there are values
    $numRows = $result->num_rows;
    if ($numRows > 0) {

      //pass values
      while ($row = $result -> fetch_assoc()) {
        $data[] = $row;
      }

      //return value
      return $data;
    }
  }
}
 ?>
