<?php
/**
 *
 */
class Delete
{
  private $register_id;

  function __construct($db_conn)
  {
    $this->conn = $db_conn;
  }

////////////////////////////DELETE USER/////////////////////////////
  public function Delete(&$register_id)
  {
    try {
      $stmt=$this->conn->prepare('DELETE FROM register_form WHERE register_ID=:reg_id');
      $stmt->bindparam(':reg_id',$register_id);
      $stmt->execute();

      if ($stmt == true) {
        echo "success";
        header('location:../admin/index.php');
      }else {
        echo "error";
      }

  } catch (Exception $e) {
echo $e->getMessage();
  }
  }

  ////////////////GET REGISTERED USER TO DELETE///////////////
  public function GetRegUsers()
  {
    // query registered applicants
    $result = $this->conn->prepare('SELECT * FROM register_form');
    // execute query
    $result->execute();
    // if result has value
if ($result == true) {
  // fetch array result
  while ($row = $result->fetch(PDO::FETCH_ASSOC))
  {
    // set id as options to delete
    echo '<option value="',$row['register_ID'],'">',$row['register_ID'],'</option>';
  }
}else {
  // if no registered applicants
  echo 'There are no registered applicants';
}
  }
}

 ?>
