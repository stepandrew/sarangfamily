<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Heroku Mysql connection</title>
</head>

<body>
	<?php
	require_once("config.php");
	
	class Dao{
		
		private $host = 'us-cdbr-iron-east-05.cleardb.net';
		private $db = 'heroku_f4584639f739b09';
		private $user = 'b1b2fd935ca956';
  		private $pass = '340e5b69';

		
		/**
	 * Creates and returns a PDO connection using the database connection
	 * url specified in the CLEARDB_DATABASE_URL environment variable.
	 */
		private function getConnection()
	{
		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

		$host = $url["host"];
		$db   = substr($url["path"], 1);
		$user = $url["user"];
		$pass = $url["pass"];

		$conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

		// Turn on exceptions for debugging. Comment this out for
		// production or make sure to use try-catch statements.
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
		return $conn->query("SELECT * from user");
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
}
?>
	
</body>
</html>