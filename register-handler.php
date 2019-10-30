<?php
session_start();
?>
//setcookie("Hi", "cookie");
//echo print_r($_COOKIE, 1);
/*require_once('dao.php');*/
<?php
	$localhost_cleardb_url="mysql://b1b2fd935ca956:340e5b69@us-cdbr-iron-east-05.cleardb.net/heroku_f4584639f739b09?reconnect=true";
	if(!getenv("CLEARDB_DATABASE_URL")){
		putenv("CLEARDB_DATABASE_URL=$localhost_cleardb_url");
	}
  $DB_host = 'us-cdbr-iron-east-05.cleardb.net';
  $DB_database = 'heroku_f4584639f739b09';
  $DB_username = 'b1b2fd935ca956';
  $DB_password = '340e5b69';

	
	

	 function valid_length($field, $min, $max){
		 $trimmed = trim ($field);
		 return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
	 }
	 	 

	
	 $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING); 
	
	 $lastName =filter_vartrim($_POST["lastName"], FILTER_SANITIZE_STRING); 
	 
	 $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	 
	 $password = filter_varm($_POST["password"],FILTER_SANITIZE_STRING);
	 
	 $password_match =filter_var($_POST["password_match"],FILTER_SANITIZE_STRING);
     $birthday = filter_var($_POST["birthday"],FILTER_SANITIZE_STRING);
	 $valid = true;
	 

//echo "here1";
	 if(strlen($firstName) <=0 || strlen($firstName)>40){ 
		 $firstNameError = "first name is required. Must be less than 50 characters.";
		  $valid = false;
	}
//echo "here2";
	  if(strlen($lastName) <=0 || strlen($lastName)>50){ 
		 $lastNameError = "last name is required. Must be less than 50 characters.";
		  $valid = false;
	}
//echo "here3";
	  if(strlen($email) <=0 || strlen($email)>50){ 
		 $emailError = "email is required. Must be less than 50 characters.";
		  $valid = false;
		  
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailError = "Must be valid email address.";
		  $valid = false;
	  }
	 if(!valid_length($password, 2, 128)){
		 $passwordError ="Please enter a password.";
		  $valid = false;
	 }else if($password != $password_match){
		 $passwordMatchError = "Passwords do not match.";
	 }



	 if($valid == true){
		 
		 $mysqli= new MySQLi( $DB_host,$DB_username,$DB_password,$DB_database);
		 //database name
		 $stmt= $mysqli->prepare("INSERT INTO register(FirstName, LastName, Email, password, Birthday) VALUE(?,?,?,?,?)");
		 $stmt -> bind_param('sssss',$firstName, $lastName,$email ,$password,$birthday );
		 if($stmt -> execute()){
			 echo hi;
		 }
		 else{
			 print $mysqli ->error;
		 }
		 
		 
		 
		 // TODO 
		 // save new user to the database
		 //require_once 'Dao.php';
		 // $dao = new Dao();
		 // $dao->saveUser($email, $password);
		// header('Location:home.php');
	 }else{
		 header('location: register.php ? error=true');
	 }
	 