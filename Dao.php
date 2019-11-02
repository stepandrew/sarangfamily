<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Heroku Mysql connection</title>
</head>

<body>
	<?php
	
	class Dao{
		
		private $host = 'us-cdbr-iron-east-05.cleardb.net';
		private $db = 'heroku_f4584639f739b09';
		private $user = 'b1b2fd935ca956';
  		private $pass = '340e5b69';

		public function addUser($input){
			$conn = $this->getConnection();
			$saveinput = "insert into user (email) values (:input)";
			$q->bindParam(":input", $input);
			$q->execute();
			
		}
		/**
	 * Creates and returns a PDO connection using the database connection
	 * url specified in the CLEARDB_DATABASE_URL environment variable.
	 */
		private function getConnection()
	{
		try{
			$conn = new PDO("mysql:host={$this-> host};db={$this-> db}", 
						$this->user, $this->pass);
			
			//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){
			echo print_r($e, 1);
		}
		//$conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

		return $conn; 
	}
	/**
	 * Returns the database connection status string.
	 */
	public function getConnectionStatus()
	{
	
		$conn = $this->getConnection();
		return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}
	public function getUsers(){
		$conn=$this->getConnection();
		return $conn->query("SELECT * from register", PDO::FETCH_ASSOC);
	}
	public function userExists($email){
		$conn=$this->getConnection();
		$stmt=$conn->prepare("SELECT * from user where email = :email");
		$stmt ->bindParam(':email', $email);	
		$stmt ->execute();
		if($stmt->fetchAll()){
			return true;
			
		}else{
			return false;
		}
	}
	 public function getComments() {
		$conn = $this->getConnection();
		try {
		return $conn->query("select comment_id, comment, date_entered  from comment order by date_entered asc", PDO::FETCH_ASSOC);
		} catch(Exception $e) {
		  echo print_r($e,1);
		  exit;
		}
	  }
	 public function saveComment ($comment) {
		$conn = $this->getConnection();
		$saveQuery = "insert into comment (comment) values (:comment)";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":comment", $comment);
		$q->execute();
  }
  public function deleteComment ($id) {
		$conn = $this->getConnection();
		$deleteQuery = "delete from comment where comment_id = :id";
		$q = $conn->prepare($deleteQuery);
		$q->bindParam(":id", $id);
		$q->execute();
  }
}
?>
	
</body>
</html>