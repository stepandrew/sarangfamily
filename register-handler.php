<?php
session_start();
require_once 'Dao.php';

//register
	 $firstname =$_POST["firstname"];
	 $lastname =$_POST["lastname"];
	 $email = htmlspecialchars($_POST["email"], ENT_QUOTES);
	 $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
	 $password_match =filter_var($_POST["password_match"],FILTER_SANITIZE_STRING);
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

	 if($valid == true){
		try{
			$dao = new Dao();	 
			$dao->saveRegister($firstname, $lastname,$email,$password,$birthday);
		 //   header('Location:home.php');
		  
	  
			   }catch(Exception $e){
				  $error['status']="Error occured";
			   }
		 

	
	// }else{
	//	 header('location: register.php ? error=true');
	 }
	 