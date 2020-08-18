<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['acct_type']=='pos1' || $_SESSION['acct_type']=='pos2' || $_SESSION['acct_type']=='pos3') {
} else {
  header('location:/el/view/status/404.php');
  exit;
}

/**
 *
 */
require_once 'Dbh.php';

class CRUD extends Connection
{
    private $conn;

    // public $course;
    public function __construct()
    {
        $this->conn = self::connect();
        // $this->course = (new Course())->test();
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    /*****************************
    STORE
     *****************************/
    protected function createApplicant($datas)
    {
        try {
            $stmt = $this->conn->prepare('INSERT INTO applicants (id,firstName,lastName,email,age,birthdate,address,contact,course,employment,status)
                                          VALUES (?,?,?,?,?,?,?,?,?,?,"Pending")');

            $id = $this->GenerateID();
            $birthDate = $datas['month'] . '-' . $datas['day'] . '-' . $datas['year'];

            $stmt->bindparam(1, $id);
            $stmt->bindparam(2, $datas['firstName']);
            $stmt->bindparam(3, $datas['lastName']);
            $stmt->bindparam(4, $datas['email']);
            $stmt->bindparam(5, $datas['age']);
            $stmt->bindparam(6, $birthDate);
            $stmt->bindparam(7, $datas['address']);
            $stmt->bindparam(8, $datas['contact']);
            $stmt->bindparam(9, $datas['course']);
            $stmt->bindparam(10, $datas['employment']);

            if ($stmt->execute()) {
                $_SESSION['msg'] = ['success' => 'Account has beed Created'];
                return true;
            } else {
                $_SESSION['msg'] = ['error' => 'Oops something went wrong'];
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*****************************
    INDEX
     *****************************/
    protected function applicants($datas)
    {
        $html = '';
        try {
            // SETTER
            $q = $datas['q'] == 'undefined' ? null : $datas['q'];
            $q2 = "%$q";

            // PAGINATION
            $stmt = $this->conn->prepare('SELECT `firstName`,`lastName` FROM `applicants` WHERE `firstName`
                                        LIKE CONCAT(:query, "%") OR `lastName`LIKE CONCAT(:query, "%")');
            $stmt->bindParam(':query', $q2);

            if ($stmt->execute()) {
                // PAGINATION SETTER
                $total = $stmt->rowCount();
                $limit_result = $datas['limit_result'];
                $datas['page_numbers'] = ceil($total / $limit_result);
                $current_page = ($datas['page'] - 1) * $limit_result;

                // applicant order
                switch ($datas['order']) {
                    case 1:
                        $order = 'email';
                        break;
                    case 2:
                        $order = 'course';
                        break;
                    case 3:
                        $order = 'status';
                        break;
                    default:
                        $order = 'LastName';
                        break;
                }

                // SORT APPLICANT
                $sort = isset($datas['sort']) ? ($datas['sort'] == 'ASC' ? 'ASC' : 'DESC') : '';

                // QUERY APPLICANTS
                $stmt_2 = $this->conn->prepare("SELECT * FROM applicants
                                    WHERE firstName LIKE CONCAT(:query, '%')
                                    OR lastName LIKE CONCAT(:query, '%')
                                    ORDER BY $order $sort
                                    LIMIT $current_page,$limit_result");
                $stmt_2->bindParam(':query', $q2);

                if ($stmt_2->execute()) {
                    if ($stmt_2->rowCount() > 0) {

                        // OPTIONS HTML
                        $html = '<div class="options d-flex justify-content-between mb-2">
                        <div class="show-entries d-flex align-items-center">
                        <span>Show</span>
                        <select class="custom-select mx-2" name="">
                        <option value="10"';

                        $html .= ($limit_result == 10) ? " selected " : '';
                        $html .= ' onclick="paginate(10,' . $datas['order'] . ',1,\'' . $q . '\')">10</option>
                        <option value="25" ';
                        $html .= ($limit_result == 25) ? ' selected ' : '';
                        $html .= 'onclick="paginate(25,' . $datas['order'] . ',1,\'' . $q . '\')">25</option>
                        <option value="50" ';
                        $html .= ($limit_result == 50) ? ' selected ' : '';
                        $html .= 'onclick="paginate(50,' . $datas['order'] . ',1,\'' . $q . '\')">50</option>
                        <option value="100" ';
                        $html .= ($limit_result == 100) ? ' selected ' : '';
                        $html .= 'onclick="paginate(100,' . $datas['order'] . ',1,\'' . $q . '\')">100</option>
                        </select>
                        <span>Entries</span>
                        </div>
                        <a href="index.php" class="blue">Refresh</a>
                        </div>';

                        // TABLE HTML
                        $html .= '<div class="show-table row table-responsive">
                        <table class="col-12 mb-5 table table-hover">
                        <thead class="text-center"><tr>
                          <th scope="col"><a href="#a" onclick="order(0,' . $limit_result . ',\'' . $q . '\',\'' . $sort . '\')">Name</a></th>
                          <th scope="col"><a href="#a" onclick="order(1,' . $limit_result . ',\'' . $q . '\',\'' . $sort . '\')">Email</a></th>
                          <th scope="col"><a href="#a" onclick="order(2,' . $limit_result . ',\'' . $q . '\',\'' . $sort . '\')">Course</a></th>
                          <th scope="col"><a href="#a" onclick="order(3,' . $limit_result . ',\'' . $q . '\',\'' . $sort . '\')">Status</a></th>
                          <th scope="col" class="border-left">Controls</th>
                        </tr></thead><tbody>'; // table header

                        // FETCH APPLICANTS
                        while ($row = $stmt_2->fetch()) {
                            $hold = explode('-', $row[0]);
                            $html .= '<tr><th scope="row">' . $row[2] . ', ' . $row[1] . '</th>
                        <td>' . $row[3] . '</td>
                        <td>' . $row[8] . '</td>
                        <td>' . $row[10] . '</td>
                        <td class="col-md-3 border-left text-center">';
                            $_SESSION['acct']['type'] = 'pos3';
                            if ($_SESSION['acct']['type'] == 'pos1' || $_SESSION['acct']['type'] == 'pos2' || $_SESSION['acct']['type'] == 'pos3') {
                                $html .= '<a href="#a" onclick="toggleModal(' . $hold[1] . ')" class="btn btn-primary mr-1">Read</a>';
                            }
                            if ($_SESSION['acct']['type'] == 'pos2' || $_SESSION['acct']['type'] == 'pos3') {
                                $html .= '<a href="/el/route.php?submitType=edit&id=' . $hold[1] . '" class="btn btn-secondary">Edit</a>';
                            }
                            if ($_SESSION['acct']['type'] == "pos3") {
                                $html .= '<form action="/el/route.php" method="POST" class="d-inline" id="del" onsubmit="confirm(\'are you sure?\')? this.submit:event.preventDefault();">
                            <input type="hidden" name="id" value="' . $hold[1] . '">
                            <button type="submit" name="submitType" value="del" class="btn btn-danger">Delete</button>
                            </form>';
                            }
                        }
                        $html .= '</td></tr></tbody></table></div>';

                        // PAGINATION
                        if ($total < 1) {
                            $showingFrom = 0;
                            $showingTo = 0;
                        } else {
                            $showingFrom = $current_page + 1; // showing from
                            $showingTo = ($showingFrom - 1) + $limit_result; // showing to
                        }
                        if ($datas['page_numbers'] == $datas['page']) {
                            $showingTo = $total;
                        }

                        // SHOWING HTML
                        $html .= '<div class="d-flex justify-content-between">
                         <p>showing ' . $showingFrom . ' to ' . $showingTo . ' of ' . $total . ' entries</p>
                         <nav>
                         <ul class="pagination">';

                        // FIRST/PREV
                        if ($datas['page'] > 1) {
                            $prev = $datas['page'] - 1;
                            $html .= '<li class="page-item"><a class="page-link" href="#" onclick="paginate(' . $limit_result . ',' . $datas['order'] . ',1,\'' . $q . '\')">first</a></li>
                        <li class="page-item"><a href="#" class="page-link"
                        onclick="paginate(' . $limit_result . ',' . $datas['order'] . ',' . $prev . ',\'' . $q . '\')">&laquo;</a> </li>';
                        }

                        // PAGE NUMBERS
                        for ($links = 1; $links <= $datas['page_numbers']; $links++) {
                            $html .= '<li class="page-item ';
                            $html .= ($datas['page'] == $links) ? 'active' : '';
                            $html .= '"><a href="#" class="page-link" onclick="paginate(' . $limit_result . ',' . $datas['order'] . ',' . $links . ',\'' . $q . '\')">' . $links . '</a></li>';
                        }

                        // NEXT/LAST
                        if ($datas['page'] < $datas['page_numbers']) {
                            $next = $datas['page'] + 1;
                            $html .= ' <li class="page-item"><a class="page-link" href="#" onclick="paginate(' . $limit_result . ',' . $datas['order'] . ',' . $next . ',\'' . $q . '\')">&raquo; </a></li>';
                            $html .= ' <li class="page-item"><a class="page-link" href="#" onclick="paginate(' . $limit_result . ',' . $datas['order'] . ',' . $datas['page_numbers'] . ',\'' . $q . '\')"> Last</a></li>';
                        }

                        $html .= '</ul></nav></div>';

                    } else {
                        $html = '<h2 class="text-center">There are no applicants</h2>';
                    }

                } else {
                    $html = 'Oops! something went wrong please refresh and try again';
                }
            } else {
                $html = 'Oops! something went wrong please refresh and try again2';
            }
            return $html;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /*****************************
    SHOW
     *****************************/
    protected function showApplicant($id)
    {
        try {
            $stmt = $this->conn->prepare('SELECT * FROM applicants WHERE id=? LIMIT 1');
            $realId = "Acc-" . $id;
            $stmt->bindparam(1, $realId);

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $fakeId = explode('-', $row[0]);

                $html = '
                <div class="row">
                    <div class="col-md-2">
                    <div class="img-container border p-5 mb-2"></div>
                    <p><b>Status: </b><span>' . $row[10] . '</span> </p>
                    </div>
                    <div class="col">
                    <p><b>First name: </b> <span>' . $row[1] . '</span> <b>Last name: </b><span>' . $row[2] . '</span></p>
                    <p><b>Email: </b> <span>' . $row[3] . '</span> </p>
                    <p><b>Contact Number: </b><span>' . $row[7] . '</span> </p>
                    <p><b>Address: </b><span>' . $row[6] . '</span> </p>
                    <p><b>Age: </b><span>' . $row[4] . '</span> <b>Date of Bith: </b><span>' . $row[5] . '</span> </p>
                    <p><b>Course: </b><span>' . $row[8] . '</span> <b>Employment: </b><span>' . $row[9] . '</span> </p>
                    </div>
                </div>';

            } else {
                $html = 'Oops! something went wrong please refresh and try again';
            }

            return $html;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /*****************************
    EDIT
     *****************************/
    protected function editApplicant($id)
    {
        try {
            $id = 'Acc-' . $id;
            $stmt = $this->conn->prepare('SELECT * FROM applicants WHERE id=? LIMIT 1');
            $stmt->bindparam(1, $id);
            
            if ($stmt->execute() && $stmt->rowCount() === 1) {
                $applicant = $stmt->fetch();
                $fakeId = explode('-', $applicant[0]);
                $dob = explode('-', $applicant[5]);
                $applicant[0] = $fakeId[1];
                unset($applicant[11], $applicant[5]);
                // array_push($applicant,$dob);
                $stmt2 = $this->conn->query('SELECT `name` FROM courses WHERE `status` = "Active"');
                $courses = $stmt2->fetchAll();
                
                return compact("applicant", "courses", "dob");

            } else {
                return false;
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /*****************************
    UPDATE
     *****************************/
    protected function updateApplicant($datas)
    {
        
        try {
            $id = 'Acc-' . $datas['id'];
            $dob = $datas['month'] . '-' . $datas['day'] . '-' . $datas['year'];

            $stmt = $this->conn->prepare('UPDATE applicants SET firstName=?, lastName=?, email=?, age=?, birthdate=?, address=?, contact=?, course=?, employment=?, status=? WHERE id=?');
            $stmt->bindparam(1, $datas['firstName']);
            $stmt->bindparam(2, $datas['lastName']);
            $stmt->bindparam(3, $datas['email']);
            $stmt->bindparam(4, $datas['age']);
            $stmt->bindparam(5, $dob);
            $stmt->bindparam(6, $datas['address']);
            $stmt->bindparam(7, $datas['contact']);
            $stmt->bindparam(8, $datas['course']);
            $stmt->bindparam(9, $datas['employment']);
            $stmt->bindparam(10, $datas['status']);
            $stmt->bindparam(11, $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /*****************************
    DELETE
     *****************************/
    protected function deleteApplicant($id)
    {
        try {
            $realId = 'Acc-' . $id;

            $stmt = $this->conn->prepare('DELETE FROM applicants WHERE id=?');
            $stmt->bindparam(1, $realId);
            $stmt->execute();

            if ($stmt->execute() && $stmt->rowCount() == 1) {
                $_SESSION['msg'] = ['success' => 'Account has beed Deleted'];
                return true;
            } else {
                $_SESSION['msg'] = ['error' => 'Oops something went wrong'];
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /*****************************
    UNIQUE ID
     *****************************/
    private function GenerateID()
    {
        try {
            //sql to get max id
            $sql = 'SELECT id FROM applicants ORDER BY id DESC LIMIT 1';
            //query sql
            $result = $this->conn->query($sql);
            //if result = 1
            if ($result->rowCount() == 1) {
                //fetch results
                $row = $result->fetch();
                //explode after - -> ACC-
                $hold = explode('-', $row[0]);
                //hold array index 1 value+1
                $id = $hold[1] + 1;
                return 'Acc-' . $id;
            } else {
                return 'Acc-10000';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

// try {
// } catch (Exception $e) {
//     echo $e->getMessage();
// }
