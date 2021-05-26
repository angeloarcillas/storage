<?php
/**
 *
 */
require_once 'Dbh.php';
class Course extends Connection
{
    private $conn;
    public function __construct()
    {
        $this->conn = self::connect();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
    protected function getCourse()
    {
        $html='';
        // SELECT ALL COURSE + ACTIVE STATUS
        $result = $this->conn->prepare('SELECT `name` FROM courses WHERE `status` = "Active"');
        if ($result->execute() && $result->rowCount() > 0) {
            while ($row = $result->fetch()) {
              $html.='<option value="'.$row['0'].'">' . $row['0'] .'</option>
              ';
            }
        } else {
            $html="<option value=''> There are no Available Course</option>";
        }
        return $html;
    }
}
