<?php
	
	class DataBase {
		private $username = 'ag653';
		private $password = 'hXWvvL2xj';
		private $hostname = 'sql2.njit.edu';
		private $dsn ='mysql:host=$hostname;dbname=$username';

		public static function database($dsn,$username,$password) 
		{
			try{
				$db = new PDO($dsn,$username,$password);
				return $db;
				echo "Connected Successfully<br>";
			} catch(PDOException $error){
				echo '<h3> Error </h3>';
				echo $error->getMessage();
				exit();
			} catch(Exception $error){
				echo '<h3>Generic</h3>';
				echo $error->getMessage();
				exit();
			}
				
		}
	}
	class User {
		private $id,$email,$fname,$lname,$phone,$birthday,$gender,$password;
		public function__construct($id,$email,$fname,$lname,$phone,$birthday,$gender,$password){
			$this->id = $id;
			$this->email = $email;
			$this->fname = $fname;
			$this->lname = $lname;
			$this->phone = $phone;
			$this->birthday = $birthday;
			$this->gender = $gender;
			$this->password = $password;
		}
		public function getID(){
			return $this->id;
		}
		public function setID($value){
			$this->id = $value;
		}
		///////////////////////////////
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($value){
			$this->email = $value;
		}
		///////////////////////////////
		public function getFname(){
			return $this->fname;
		}
		public function setFname($value){
			$this->fname = $value;
		}
		///////////////////////////////
		public function getLname(){
			return $this->lname;
		}
		public function setLname($value){
			$this->lname = $value;
		}
		//////////////////////////////
		public function getPhone(){
			return $this->phone;
		}
		public function setPhone($value){
			$this->phone = $value;
		}
		//////////////////////////////
		public function getBirthday(){
			return $this->birthday;
		}
		public function setbirthday($value){
			$this->birthday = $value;
		}
		/////////////////////////////
		public function getGender(){
			return $this->gender;
		}
		public function setGender($value){
			$this->gender = $value;
		}
		/////////////////////////////
		public function getPassword(){
			return $this->password;
		}
		public function setPassword($value){
			$this->password = $value;
		}
		/////////////////////////////
		public function stringHTML(){
			return '<table style="width:100%">
					<tr>
						<th> ID </th>
						<th> Email </th>
						<th> First Name </th>
						<th> Last Name </th>
						<th> Phone </th>
						<th> Birthday </th>
						<th> Gender </th>
						<th> Password </th>
					</tr>
					<?php foreach ($todos as $todo):?>
					<tr>
						<td align ="center">

							<?php echo $todo['id'];?>
							
						</td>
						<td align ="center">
							<?php echo $todo['email'];?>
							
						</td>
						<td align ="center">
							<?php echo $todo['fname'];?>
							
						</td>
						<td align ="center">
							<?php echo $todo['lname'];?>
							
						</td>
						<td align ="center">
							<?php echo $todo['phone'];?>
							
						</td>
						<td align ="center">
							<?php echo $todo['birthday'];?>
							
						</td>
						<td align ="center">
							<?php echo $todo['gender'];?>
							
						</td>
						<td align ="center">
							<?php echo $todo['password'];?>
							
						</td>
					</tr>
					
					<?php endforeach;?>

				</table>';
		} 
	}

	class UserDB {
		public static function getAllUsers($query){
		
			$statement = $db->prepare($query);
			$statement->bindValue(':id',6);
			$statement->execute();
			$todos = $statement->fetchAll();
			$statement->closeCursor();
			return $todos;
		}
		public static function insertNewUser($query1){
			$statement = $db->prepare($query1);
			$statement->bindValue(':id',6);
			$statement->execute();
			$todos = $statement->fetchAll();
			$statement->closeCursor();	
		}
		public static function updatePassword($query2){
			$statement = $db->prepare($query2);
			$statement->bindValue(':id',6);
			$statement->execute();
			$todos = $statement->fetchAll();
			$statement->closeCursor();
		}	
		public static function deleteUser($query3){
			$statement = $db->prepare($query3);
			$statement->bindValue(':id',6);
			$statement->execute();
			$todos = $statement->fetchAll();
			$statement->closeCursor();
		}
		
	}
	
	
	$query = 'SELECT * FROM accounts';
	$query1 = 'INSERT INTO accounts (id,email,fname,lname,phone,birthday,gender,password) 
	VALUES (23,'Ashaar','Gautam','8483332322','2/11/96','male','password')';
	$query2 = 'UPDATE accounts
				SET password = 'rubbish'
				WHERE id = 23';
	$query3 = 'DELETE FROM accounts
				WHERE id =23';

	$UDB = new UserDB($query);
	print_r($UDB->getAllUsers());
		
?>

