<?php
/**
 *
 */
class View
{

  private $conn;
  // create connection
  function __construct($db_conn)
  {
    $this->conn = $db_conn;
  }

  public function GetRegUsers()
  {
    // query registered applicants
    $result = $this->conn->prepare('SELECT * FROM register_form');
    $result->execute();
    // if result has value
if ($result == true) {
  // fetch array result
  while ($row = $result->fetch(PDO::FETCH_ASSOC))
  {
    // output array
    echo '<tr>
          <td>',$row['register_firstName'],
            ' ',$row['register_lastName'],'</td>',
         '<td>',$row['register_email'],'</td>',
         '<td>',$row['register_age'],'</td>',
         '<td>',$row['register_address'],'</td>',
         '<td>',$row['register_course'],'</td>',
         '<td>',$row['register_status'],'</td>
         </tr>';
  }
}else {
  // if no registered applicants
  echo 'There are no registered applicants';
}
  }

}

 ?>
