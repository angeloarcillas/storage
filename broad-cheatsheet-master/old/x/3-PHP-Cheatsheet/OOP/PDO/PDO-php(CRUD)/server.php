<?php
/**
 *
 */
class Users
{
	//connect database
	function __construct($DB_conn)
	{
		$this->db = $DB_conn;
	}

	//add user
	public function add($user_name,$user_email,$user_password)
	{
		//pdo
	 try {
		 //prepare sql insert
	 	$stmt = $this->db->prepare("INSERT INTO users(user_name,user_email,user_password) VALUES(:user_name,:user_email,:user_password)");
		//bind values => ?? of mysqli
		$stmt->bindparam(":user_name",$user_name);
		$stmt->bindparam(":user_email",$user_email);
		$stmt->bindparam(":user_password",$user_password);
		//execute $stmt
		if ($stmt->execute()) {
			echo "connected";
		}else {
			echo "error";
		}
	 } catch (PDOException $e) {
		 	echo $e->getMessage();
	 }

	}
	public function remove($user_id)
	{
		//pdo
		try {
					 //prepare sql delete
			$stmt = $this->db->prepare("DELETE FROM users WHERE user_id=:user_id");
					//bind values => ?? of mysqli
			$stmt->bindparam(":user_id",$user_id);
			//execute $stmt
			if ($stmt->execute()) {
				echo "connected";
			}else {
				echo "error";
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

	}
	public function update($user_id,$user_name,$user_email,$user_password)
	{
		try {
			//prepare sql update
			$stmt = $this->db->prepare("UPDATE users SET user_name=:user_name,user_email=:user_email,user_password=:user_password WHERE user_id=:user_id");
			//bind values => ?? of mysqli
			$stmt->bindparam(":user_id",$user_id);
			$stmt->bindparam(":user_name",$user_name);
			$stmt->bindparam(":user_email",$user_email);
			$stmt->bindparam(":user_password",$user_password);
			//execute stmt
			if ($stmt->execute()) {
				echo "connected";
			}else {
				echo "error";
			}

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function getUsers()
	{
		 try
		 {
			 //prepare sql select
				$stmt = $this->db->prepare("SELECT * FROM users order by user_name asc");
				//execute
				$stmt->execute();
				//fetch array
				$userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
				//count row and check if has row
				if($stmt->rowCount() > 0)
				{
					return $userRow;
				}else{
					return false;
				}

		 }
		 catch(PDOException $e)
		 {
				 echo $e->getMessage();
		 }
 }

}

 ?>
