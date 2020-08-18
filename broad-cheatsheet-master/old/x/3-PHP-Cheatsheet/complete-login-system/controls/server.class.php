<?php 

/**
 *
 */
class Account
{
	// f-> first l-> last u-> user
	private $acct_fName;
	private $acct_lName;
	private $acct_uName;
	private $acct_email;
	private $acct_password;
	private $conn;

	function __construct($db_conn)
	{
		$this->conn = $db_conn;

	}

	/////////////SETTERS/////////////////
  public function setFirstName($data){
    $this->acct_fName = static::cleanValues($data);
  }
  public function setLastName($data){
    $this->acct_lName = static::cleanValues($data);
  }
  public function setUserName($data){
    $this->acct_uName = static::cleanValues($data);
  }
  public function setEmail($data){
    $this->acct_email = static::cleanValues($data);
  }
  public function setPassword($data){
    $this->acct_password = static::cleanValues($data);

  }

	public function regAcct()
	{

		try {

			$stmt = $this->conn->prepare('INSERT INTO users (user_id, user_firstName, user_lastName, user_name, user_email, user_password,user_token,user_status) VALUES (:user_id,:user_fName,:user_lName,:user_uName,:user_email,:user_pwd,:user_token,:user_status)');

			$acct_uid = $this->generateID();
			// hash password for security
			$acct_pwd = password_hash($this->acct_password, PASSWORD_DEFAULT);
			// token for account validation
			$acct_token = md5(uniqid(mt_rand(), true));
			$acct_status = 'verify';

			$stmt->bindparam(':user_id',$acct_uid);
			$stmt->bindparam(':user_fName',$this->acct_fName);
			$stmt->bindparam(':user_lName',$this->acct_lName);
			$stmt->bindparam(':user_uName',$this->acct_uName);
			$stmt->bindparam(':user_email',$this->acct_email);
			$stmt->bindparam(':user_pwd',$acct_pwd);
			$stmt->bindparam('user_token',$acct_token);
			$stmt->bindparam('user_status',$acct_status);
			$stmt->execute();

			if ($stmt) {
				// mail the token to verify
				$subject = 'Brand-Name | Verify Account';
				$message = '
				=======================
				Username: '.$this->acct_uName.
				'Password: '.$this->acct_pwd.
				'
				=======================
				Verify Account:https://www.url/?email='.$this->acct_email.'&token='.$acct_token.
				'
				===============================

				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				illum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				';
				mail($this->acct_email, $subject, $message);

				header('location:../index.php?success go verify your account');
			}else {
				header('location:../index.php?error');
			}

		} catch (Exception $e) {
			    echo  $e->getMessage();
		}
	}


////////////////////VERIFY TOKEN/////////////////////////
	public function verifyToken($userToken,$userEmail)
	{
		// verify if email and token match
		$stmt = $this->conn->prepare('SELECT * FROM users WHERE user_email = :user_uEmail AND user_token = :user_token');
		$stmt->bindparam('user_uEmail',$userEmail);
		$stmt->bindparam('user_token',$userToken);
		$stmt->execute();

		if ($stmt) {

			// update status
			$stmt2 = $this->conn->prepare('UPDATE users SET user_status = "Verified" WHERE user_email = :user_uEmail AND user_token = :user_token');

			$stmt2->bindparam('user_uEmail',$userEmail);
			$stmt2->bindparam('user_token',$userToken);
			$stmt2->execute();

			if ($stmt) {
				echo "success";
			}else{
				echo "invalid email or token 2";
			}

		}else {
			echo "invalid email or token";
		}
	}



/////////////////////////UNIQUE iD ////////////////////////////////
	  public function generateID(){
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
private function cleanValues($data){
  //remove special characters (!@#$%^&*()_+{}|:"<>?[]\';/.,")
    $return_value = preg_replace('/[^-a-zA-Z0-9@ ]/', "", strip_tags($data));
    return $return_value;
}


/////////////////////LOGIN FORM////////////////////////////
public function login($userName,$userPassword)
{
	$checkPwd = $this->verifyPwd($userName,$userPassword);
	if ($checkPwd) {
		echo "success";
		//goto other page
	}else {
		echo "error";
		//return
	}
}

public function verifyPwd($userName,$userPassword)
{
	$stmt = $this->conn->prepare('SELECT * FROM users WHERE user_name = :user_uName ');
	$stmt->bindparam('user_uName',$userName);
	$stmt->execute();

	if ($stmt->rowCount() == 1) {
		while ($row = $stmt->fetch()) {
			// verify if input password and database password match
			// password_verify() works with password_hash()
		$result = password_verify($userPassword, $row['user_password']);
		return $result;

			// if (!$result) {
			// 	echo "error";
			// }elseif ($result) {
			// 	echo "success";
			// }else {
			// 	echo "error";
			// }
		}

	}else {
		return false;
	}
}

// public function delete($id)
// {
// 	$delID = $id;
// 	$stmt = $this->conn->prepare('DELETE FROM users WHERE user_id = :id ');
// 	$stmt->bindparam('id',$delID);
// 	$stmt->execute();
// }



///////////////////FORGOT FORM//////////////////////
public function checkEmail($userEmail)
{
	$stmt = $this->conn->prepare('SELECT * FROM users WHERE user_email = :user_uEmail ');
	$stmt->bindparam('user_uEmail',$userEmail);
	$stmt->execute();

	if ($stmt->rowCount() == 1) {

		// give user/password/reset or a password reset only
		$subject = '';
		$message= '
		===============================
		username: *******
		password: *******
		===============================
		Reset Password: https://www.url/?email=******&token=******
		===============================

		if you didnt use our reset system we advise you to change your credentials or you could just ignore this
		';

		echo "match please check you email";
	}
		// mail($userEmail, $subject, $message);
		else {
			echo "error email not in database";
		}
}






}

 ?>
