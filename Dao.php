
	<?php
	
	class Dao{
		
		private $host = 'us-cdbr-iron-east-05.cleardb.net';
		
//damp-mountain-91968		
		private $db = 'heroku_f4584639f739b09';
//shrouded-sierra-40031 
//private $db = 'heroku_58c5f9d8f127161';
		private $user = 'b1b2fd935ca956';
  		private $pass = '340e5b69';

/**
 * Creates and returns a PDO connection using the database connection
 * url specified in the CLEARDB_DATABASE_URL environment variable.
 */
		private function getConnection()
	{
		try{
			$conn = new PDO("mysql:host={$this->host};dbname={$this->db}", 
						$this->user, $this->pass);			
		}catch(Exception $e){
			echo print_r($e, 1);
		}
		return $conn; 
	}
/*		public function addUser($input){
			$conn = $this->getConnection();
			$saveInput = "insert into user (email) values (:input)";
			$q=$conn->prepare($saveInput);
			$q->bindParam(":input", $input);
			$q->execute();
			
		}
*/
		// public function getRegiser(){
		// 	$conn = $this->getConnection();
		// 	return $conn ->query("select id from register")
		// }
		// public function getRegiser($id){
		// 	$conn = $this->getConnection();
		// 	$getQuery="Select id, firstname, lastname, email, password, birthday from register where id=:id";
		// 	$q=$conn->prepare($getQuery);
		// 	$q->bindParm(":id", $id);
		// 	$q->execute();
		// 	return reset($q-> fetchAll());
		// }
		public function saveRegister($firstname, $lastname,$email,$password,$birthday){
			$conn = $this->getConnection();
			$saveInput = "insert into register (firstname, lastname, email, password, birthday) values (:firstname, :lastname,:email,:password,:birthday)";
			$q=$conn->prepare($saveInput);
			$q->bindParam(":firstname", $firstname);
			$q->bindParam(":lastname", $lastname);
			$q->bindParam(":email", $email);
			$q->bindParam(":password", $password);
			$q->bindParam(":birthday", $birthday);
			$q->execute();
			
		}
	/**
	 * Returns the database connection status string.
	 */
	public function getConnectionStatus()
	{
		$conn = $this->getConnection();
		return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}
	public function getUsers($email, $password){
		$conn=$this->getConnection();
		$getuser= "select * from user where email= :email and password=:password";
		$getq=$conn->prepare($getuser);
		$getq->bindParam(":email", $email);
		$getq->bindParam(":password", $password);
		$getq->execute();
	
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
	
