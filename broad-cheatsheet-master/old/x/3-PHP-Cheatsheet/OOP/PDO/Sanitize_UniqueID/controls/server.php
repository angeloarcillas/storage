<?php
session_start();
/**
 *
 */
class Accounts
{
  private $account_name='';
  private $conn;

  function __construct($db_conn)
  {
    $this->conn = $db_conn;
  }

  public function setName($data){
      $this->account_name = static::clean_values($data);
      echo $this->account_name;
      $_SESSION['account_name'] = $this->account_name;
    }


/////////////////////////UNIQUE iD ////////////////////////////////
  public function generateAccountID(){
    //sql to get max id
      $stmt = 'SELECT user_id FROM users
              WHERE LENGTH(user_id) = (SELECT MAX(LENGTH(user_id)) FROM users)
              ORDER BY user_id DESC LIMIT 1';
    //query sql
      $result = $this->conn->query($stmt);
      //if result = 1
      if($result->rowCount() == 1){
        //fetch results
          while($row = $result->fetch()){
            //explode after - -> ACC-
              $hold = explode('-',$row['user_id']);
              //hold array index 1 value+1
              $id = $hold[1]+1;
              return 'Acc-'.$id;
          }
      }
      else {
        //if no id
        return 'Acc-10000';
      }
  }
  /////////////SANITATION///////////////////////////////////
  private function clean_values(&$data){
    //remove special characters (!@#$%^&*()_+{}|:"<>?[]\';/.,")
      $return_value = preg_replace('/[^a-zA-Z0-9]/', "", strip_tags($data));
      return $return_value;
  }
}


 ?>
