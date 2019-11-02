<?php
session_start();

//register
     $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
	 $lastName =filter_vartrim($_POST["lastName"], FILTER_SANITIZE_STRING);
	 $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	 $password = filter_varm($_POST["password"],FILTER_SANITIZE_STRING);
	 $password_match =filter_var($_POST["password_match"],FILTER_SANITIZE_STRING);
     $birthday = filter_var($_POST["birthday"],FILTER_SANITIZE_STRING);
	 $valid = true;





	 function valid_length($field, $min, $max){
		 $trimmed = trim ($field);
		 return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
	 }

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



	// if($valid == true){
	 /*
	 $connection = mysqli_connect($DB_host, $DB_username, $DB_password, $DB_database);
     $my_query = "";
     $my_query = "SELECT * FROM users WHERE email = '$email' AND pw = '$pw'";
     $result = mysqli_query($connection, $my_query);

		*/
		 
		 
		 // TODO 
		 // save new user to the database
//		 require_once 'Dao.php';
//		 $error = array();
//		 try{
	//  $dao = new Dao();
	//  $dao ->getConnection();
			 //$dao ->getConnectionStatus();
	//	  $dao->saveUser($email, $password);

//		 }catch(Exception $e){
//	$error['status']="Error occured";
//}


		// header('Location:home.php');
	// }else{
	//	 header('location: register.php ? error=true');
	// }
	 