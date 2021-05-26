<?php
// check session
if(!isset($_SESSION))
  {
      session_start();
  }
/**
 *
 */
class Register
{

  // data protection
  private $register_firstName;
  private $register_lastName;
  private $register_email;
  private $register_age;
  private $register_bday;
  private $register_address;
  private $register_contact;
  private $register_course;
  private $register_employment;
  private $register_status;
  private $conn;

  // create connection
  function __construct($db_conn)
  {
    $this->conn = $db_conn;
  }

  /////////////SETTERS/////////////////
  public function SetFirstName(&$data){
    $this->register_firstName = static::CleanValues($data);
  }
  public function SetLastName(&$data){
    $this->register_lastName = static::CleanValues($data);
  }
  public function SetEmail(&$data){
    $this->register_email = static::CleanValues($data);
  }
  public function SetAge(&$data){
    $this->register_age = static::CleanValues($data);
  }
  public function SetBday(&$data){
    $this->register_bday = static::CleanValues($data);
  }
  public function SetAddress(&$data){
    $this->register_address = static::CleanValues($data);
  }
  public function SetContact(&$data){
    $this->register_contact = static::CleanValues($data);
  }
  public function SetCourse(&$data){
    $this->register_course = static::CleanValues($data);
  }
  public function SetEmployment(&$data){
    $this->register_employment = static::CleanValues($data);
  }

////////////////////REGISTER USER///////////////////////////////////
public function RegisterUser() {
  try{
    //query
  $stmt = $this->conn->prepare('INSERT INTO register_form (register_ID,register_firstName,register_lastName,register_email,register_age,register_bday,register_address,register_contact,register_course,register_employment,register_status)
           VALUES (:reg_id,:reg_fName,:reg_lName,:reg_email,:reg_age,:reg_bday,:reg_address,:reg_contact,:reg_course,:reg_employment,:reg_status)');
           // create unique id -> prevent sql injection
          $reg_id = $this->GenerateID();
          $reg_status = 'Pending';

          // bind value
          $stmt->bindparam(":reg_id", $reg_id);
          $stmt->bindparam(":reg_fName", $this->register_firstName);
          $stmt->bindparam(":reg_lName", $this->register_lastName);
          $stmt->bindparam(":reg_email", $this->register_email);
          $stmt->bindparam(":reg_age", $this->register_age);
          $stmt->bindparam(":reg_bday", $this->register_bday);
          $stmt->bindparam(":reg_address", $this->register_address);
          $stmt->bindparam(":reg_contact", $this->register_contact);
          $stmt->bindparam(":reg_course", $this->register_course);
          $stmt->bindparam(":reg_employment", $this->register_employment);
          $stmt->bindparam(":reg_status", $reg_status);
          // execute stmt
          $stmt->execute();
          //check if execute success
          if ($stmt == true) {
            $_SESSION['message'] = 'successful ty for registering';
            header('location:../admin/index.php?success');
      		}else {
            //if execute error return
            $_SESSION['message'] = 'Error, please contact us to verify this';
            header('location:index.php?error');
      		}
      }
      //if there are error
  catch(PDOException $e){

      // echo $e->getMessage();
      $_SESSION['message'] = 'Error, please contact us to verify this';
      header('location:index.php?error');
  }
}

/////////////SANITATION///////////////////////////////////
private function CleanValues(&$data){
  //remove special characters (!@#$%^&*()_+{}|:"<>?[]\';/.,")
    $return_value = preg_replace('/[^-a-zA-Z0-9@ ]/', "", strip_tags($data));
    return $return_value;
}


/////////////////////////UNIQUE iD ////////////////////////////////
  public function GenerateID(){
    //sql to get max id
      $stmt = 'SELECT register_ID FROM register_form
              WHERE LENGTH(register_ID) = (SELECT MAX(LENGTH(register_ID)) FROM register_form)
              ORDER BY register_ID DESC LIMIT 1';
    //query sql
      $result = $this->conn->query($stmt);
      //if result = 1
      if($result->rowCount() == 1){
        //fetch results
          while($row = $result->fetch()){
            //explode after - -> ACC-
              $hold = explode('-',$row['register_ID']);
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

  //////////////////// REGISTER YEAR //////////////////
  public function GetRegYear()
  {
    // php data() get max year
    $max_year = date('Y');
    //show year options
    for ($i=1960; $i <= $max_year; $i++) {
      echo '<option value=',$i,'>', $i ,'</option>';
    }
  }

}
 ?>
