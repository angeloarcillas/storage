<?php
/**
 *
 */
class Update
{
    private $register_id;
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
    public function __construct($db_conn)
    {
        $this->conn = $db_conn;
    }

    ////////////////GET REGISTERED USERS////////////////////////
    public function GetRegUsers()
    {
        // query registered applicants
        $result = $this->conn->prepare('SELECT * FROM register_form');
        $result->execute();
        // if result has value
        if ($result == true) {
            // fetch array result
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // output array
                echo '<tr>
          <td>',$row['register_ID'],
          '<td>',$row['register_firstName'],
            ' ',$row['register_lastName'],'</td>',
         '<td>',$row['register_email'],'</td>',
         '<td>',$row['register_age'],'</td>',
         '<td>',$row['register_address'],'</td>',
         '<td>',$row['register_course'],'</td>',
         '<td>',$row['register_status'],'</td>
         <td><a href="../router/update-router.php?edit=',$row['register_ID'],'">Update</a></td>
         <td><a href="../router/delete-router.php?del=',$row['register_ID'],'">Delete</a></td>
         </tr>';
            }
        } else {
            // if no registered applicants
            echo 'There are no registered applicants';
        }
    }

    //////////////////////////UPDATE//////////////////////////////////////
    public function Update(&$register_id, &$register_firstName, &$register_lastName, &$register_email, &$register_age, &$register_bday, &$register_address, &$register_contact, &$register_course, &$register_employment, &$register_status)
    {
        try {
            $stmt = $this->conn->prepare('UPDATE register_form
                                SET register_firstName=:reg_fName,
                                register_lastName=:reg_lName,
                                register_email=:reg_email,
                                register_age=:reg_age,
                                register_bday=:reg_bday,
                                register_address=:reg_address,
                                register_contact=:reg_contact,
                                register_course=:reg_course,
                                register_employment=:reg_employment,
                                register_status=:reg_status
                                WHERE register_ID=:reg_id');

            // bind value
            $stmt->bindparam(":reg_id", $register_id);
            $stmt->bindparam(":reg_fName", $register_firstName);
            $stmt->bindparam(":reg_lName", $register_lastName);
            $stmt->bindparam(":reg_email", $register_email);
            $stmt->bindparam(":reg_age", $register_age);
            $stmt->bindparam(":reg_bday", $register_bday);
            $stmt->bindparam(":reg_address", $register_address);
            $stmt->bindparam(":reg_contact", $register_contact);
            $stmt->bindparam(":reg_course", $register_course);
            $stmt->bindparam(":reg_employment", $register_employment);
            $stmt->bindparam(":reg_status", $register_status);

            // execute stmt
            $stmt->execute();

            if ($stmt == true) {
                echo "success";
            } else {
                echo "error";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    ////////////////////GET USER INFO TO UPDATE/////////////////////////
    public function GetToUpdate($reg_id)
    {
        try {
            $stmt = $this->conn->prepare('SELECT * FROM register_form WHERE register_ID=:reg_id');
            $stmt->bindparam(":reg_id", $reg_id);
            $stmt->execute();

            if ($stmt == true) {
                while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $update_course = $row['register_course'];

                    $html.= '<div class="form">
          <form class="" action="../router/update-router.php" method="post">
            <input type="hidden" name="register_id" value="'.$row['register_ID'].'">
            <label>First Name:</label>
            <input class="reg-input" type="text" name="register_firstName" value="'.$row['register_firstName'].'">
            <label>Last Name:</label>
            <input class="reg-input" type="text" name="register_lastName" value="'.$row['register_lastName'].'">
            <label>Email:</label>
            <input class="reg-input" type="email" name="register_email" value="'.$row['register_email'].'">
            <label>Age:</label>
            <input class="reg-input" type="text" name="register_age" value="'.$row['register_age'].'" >
            <label>Date of Birth:</label>
            <input type="text" name="register_bday" value="'.$row['register_bday'].'">
            <label>Address:</label>
            <input class="reg-input" type="text" name="register_address" value="'.$row['register_address'].'">
            <label>Contact:</label>
            <input class="reg-input" type="text" name="register_contact" value="'.$row['register_contact'].'">
            <label>Course:</label>
            <select>';
                    // get user selected course
                    $html.=$this->GetCourse($update_course);
                    $html.='
            </select>
            <label>Employment:</label>
            <select class="reg-sel" name="register_employment">
              <option value="Employed">Employed</option>
              <option value="Self-Employed">Self-Employed</option>
              <option value="Unemployed">Unemployed</option>
            </select>
            <label>Status</label>
            <select class="" name="">
              <option value="">Pending</option>
              <option value="">Active</option>
              <option value="">Suspended</option>
            </select>
            <button type="submit" name="update">Register</button>
          </form>';

                    echo $html;
                }
            } else {
                echo "error";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //////////////GET USER COURSE SELECTED//////////////
    public function GetCourse($update_course)
    {
        // query course
        $query = $this->conn->prepare('SELECT * FROM course_form');
        // execute query
        $query->execute();
        // if result has value
        if ($query == true) {
            // fetch array result
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $html.='<option value="'.$row['course_name'].'" ';

                // check if user course == course_name then echo selected
                if ($update_course == $row['course_name']) {
                    $html.='selected="selected"';
                }
                $html.= '>' . $row['course_name'] .'</option>';
            }
        } else {
            // if no course
            $html.= '<option>There are no course available</option>';
        }
    }
}
