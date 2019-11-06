<?php
session_start();
require_once 'Dao.php';
require_once 'KLogger.php';

$rlogger = new KLogger("log.txt",KLogger::WARN );


//register
	 $firstname =$_POST["firstname"];
	 $lastname =$_POST["lastname"];
	 $email = $_POST["email"];
	 $password = $_POST["password"];
	 $password_match =($_POST["password_match"]);
     $birthday = filter_var($_POST["birthday"],FILTER_SANITIZE_STRING);
	 $valid = true;	
	 $error = array();	

	 function valid_length($field, $min, $max){
		 $trimmed = trim ($field);
		 return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
	 }
 
	 if(strlen($firstname) <=0 || strlen($firstname)>40){ 
		 $firstnameError = "first name is required. Must be less than 40 characters.";
		 echo $firstnameError;
		  $valid = false;
	}
	if(!preg_match("/^[a-zA-Z]*$/",$firstname)){
		$errors['firstname']="Please check your input. Only letter is required";
	}
	if(!filter_var($firstname, FILTER_SANITIZE_STRING)) {
		$firstnameError = "Must be valid first name.";
		echo $firstnameError;
		$valid = false;
  }
	  if(strlen($lastname) <=0 || strlen($lastname)>40){ 
		  
		 $lastnameError = "last name is required. Must be less than 40 characters.";
		 echo $lastnameError;
		  $valid = false;
	}
	if(!preg_match("/^[a-zA-Z]*$/",$lastname)){
		$errors['lastname']="Please check your input. Only letter is required";
	}
	if(!filter_var($lastname, FILTER_SANITIZE_STRING)) {
		$lastnameError = "Must be valid first name.";
		echo $lastnameErro;
		$valid = false;
  }
	if(strlen($email) <=0 || strlen($email)>40){ 
		 $emailError = "email is required. Must be less than 40 characters.";
		 echo $emailErro;
		  $valid = false;
		  
	}
	
	 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailError = "Must be valid email address.";
		  echo $emailErro;
		  $valid = false;
	}
	 if(!valid_length($password, 2, 128)){
		 $passwordError ="Please enter a password.";
		echo $passwordError;
		  $valid = false;
	 }else if($password != $password_match){
		 $error['passwordMatchError'] = "Passwords do not match.";
		 //echo $passwordMatchError;
		 $valid = false;
	 }


$rlogger ->LogDebug("Clearing the session array");
//$_SESSION = array();

if($valid){
	$_SESSION['register'] = true;
	$rlogger->LogInfo("User register successful [{$email}]");
}else{
	$logger->LogWarn("User register failed [{$email}]");
	$_SESSION['message'] = "Invalid email or password";
}
if(!empty($error)){

	$_SESSION["error"] = $error;
	$_SESSION['presets'] = array('firstname' => htmlspecialchars($firstame), 'email' => htmlspecialchars($email),
	'password' => htmlspecialchars($password), 'password_match' => htmlspecialchars($password_match));
}

 

	 if($valid == true){
		try{
			$dao = new Dao();	 
			$dao->saveRegister($firstname, $lastname,$email,$password,$birthday);
		   header('Location:granted.php');
		// header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
	  
			   }catch(Exception $e){
				  $error['status']="Error occured";
			   }	
	 }else{
		 header('location: register.php ? error=true');
		//header('Location: https://damp-mountain-91968.herokuapp.com/register.php');
	 }
	 