<?php
/**
 *
 */
class Course
{

  private $conn;
  // create connection
  function __construct($db_conn)
  {
    $this->conn = $db_conn;
  }

  public function GetCourse()
  {
    // query course
    $result = $this->conn->prepare('SELECT * FROM course_form');
    // execute query
    $result->execute();
    // if result has value
if ($result == true) {
  // fetch array result
  while ($row = $result->fetch(PDO::FETCH_ASSOC))
  {
    // output array
    // $html.='<option value='.$row['course_name'].'>' . $row['course_name'] .'</option>'
    echo '<option value="',$row['course_name'],'">' , $row['course_name'] ,'</option>';
  }
}else {
  // if no course
  echo '<option>There are no course available</option>';
}
  }

}

 ?>
