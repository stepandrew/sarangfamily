<?php
session_start();
require_once 'Dao.php';
require_once 'KLogger.php';

$dao = new Dao();	
$rlogger = new KLogger("log.txt",KLogger::WARN );


//register
	 $firstname =$_POST["firstname"];
	 $lastname =$_POST["lastname"];
	 $email = $_POST["email"];
	 $password = $_POST["password"];
	 $password_match =($_POST["password_match"]);
     $birthday = filter_var($_POST["birthday"],FILTER_SANITIZE_STRING);
	 $valid = true;	

	 $errors = array();	
	 $_SESSION['setup']=array($_POST);

	 function valid_length($field, $min, $max){
		 $trimmed = trim ($field);
		 return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
	 }
 
	 if(strlen($firstname) <=0 || strlen($firstname)>40){ 
		 $errors['firstnameError'] = "first name is required. Must be less than 40 characters.";
		 echo $firstnameError;
		  $valid = false;
	}
	if(!preg_match("/^[a-zA-Z]*$/",$firstname)){
		$errors['firstname']="Please check your input. Only letter is required.";
		$valid = false;
	}
	if(!filter_var($firstname, FILTER_SANITIZE_STRING)) {
		$errors['firstnamenotvalid'] = "Must be valid first name.";
		$valid = false;
  }
	  if(strlen($lastname) <=0 || strlen($lastname)>40){ 
		  
		 $errors['lastnameError'] = "last name is required. Must be less than 40 characters.";
		  $valid = false;
	}
	if(!preg_match("/^[a-zA-Z]*$/",$lastname)){
		$errors['lastname']="Please check your input. Only letter is required.";
		$valid = false;
	}
	if(!filter_var($lastname, FILTER_SANITIZE_STRING)) {
		$errors['lastnameError'] = "Must be valid first name.";
		echo $lastnameErro;
		$valid = false;
  }
	if(strlen($email) <=0 || strlen($email)>40){ 
		 $errors['emaillengthError'] = "email is required. Must be less than 40 characters.";
    	  $valid = false;
		  
	}
	
	 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $errors['emailError'] = "Must be valid email address.";
		  $valid = false;
	}
	 if(!valid_length($password, 2, 128)){
		 $errors['passwordError'] ="Please enter a password.";
		  $valid = false;

	 }else if($password != $password_match){
		 $errors['passwordMatchError'] = "Passwords do not match.";
		 //echo $passwordMatchError;
		 $valid = false;
	 }
     
	 if($dao->checkEmailExists($email)){
		$errors['emailexist']="Email already exists.";
		}


$rlogger ->LogDebug("Clearing the session array");

if(empty($errors)){

	 if($valid == true){
	
		
			$_SESSION['register'] = true;
			$rlogger->LogInfo("User register successful [{$email}]");


    	
			$dao->addUser($email, $password);
			$dao->saveRegister($firstname, $lastname,$email,$password,$birthday);
		
			header('Location: welcome.php');
		
	
	 }else{

		$rlogger->LogWarn("User register failed [{$email}]");

		
     
         $messages =  " User register failed. ";
		$errors['messages']=$messages;
		$_SESSION['messages'] = $errors['messages'];

		$_SESSION['emailexist'] =$errors['emailexist'];

        $_SESSION['firstnameError'] =  $errors['firstnameError'];
		$_SESSION['firstname']=$errors['firstname'];
		$_SESSION['firstnamenotvalid']=$errors['firstnamenotvalid'];
		$_SESSION['lastnameError']=$errors['lastnameError'];
		$_SESSION['emaillengthError']=$errors['emaillengthError'];
		$_SESSION['emailError']=$errors['emailError'];
		$_SESSION['passwordError']=$errors['passwordError'];
		$_SESSION['passwordMatchError']=$errors['passwordMatchError'];

		$_SESSION['errors'] = $errors;
		header('Location: register.php');
	 }
}else {

		$_SESSION["errors"] = $errors;
		$_SESSION['presets'] = array('firstname' => htmlspecialchars($firstname), 'email' => htmlspecialchars($email),
		'password' => htmlspecialchars($password), 'password_match' => htmlspecialchars($password_match));
		header('Location: register.php');
	}

	?>