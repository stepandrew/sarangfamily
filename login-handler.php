<?php
//session_start();
require_once 'form_helper.php';
require_once 'Dao.php';
require_once 'KLogger.php';
$logger = new KLogger("log.txt",KLogger::WARN );
$email =  $_POST['email'];
$password = $_POST['password'];
$valid = true;

$error=array();

$_SESSION["presets"] = array();

function valid_length($field, $min, $max) {
	$trimmed = trim($field);	
 	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
	
}
if(!valid_length($password, 3, 120)){
	$error['password'] ="Please enter a password greater then 2.";
	 $valid = false;
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$error['emailerror1'] = "Must be valid email address.";
	$valid = false;
}
if(!valid_length($email, 2, 100)){
	$error['emailerror2'] ="Please enter email greater then 2 and less than 40 counts.";
	 $valid = false;
}
// email match using regular expressions
if(!preg_match('/\w+@\w+\.[a-zA-Z]{2,4}/',$email)){
	$error['emailerror3']="Please check your input.";
	$valid = false;
}
$logger ->LogDebug("Clearing the session array");

if($valid){
	$_SESSION['logged_in'] = true;
	$logger->LogInfo("User login successful [{$email}]");
    
}else{
	$logger->LogWarn("User login failed [{$email}]");
	$_SESSION['invalid'] = "Invalid email or password";
}

$dao= new Dao();

try{
	$user = $dao->getUsers($email,$password);
	session_start();
	
	$_SESSION['username'] = $dao->userExists($email);

	ensure_logged_in();

	if($user){
		$_SESSION["access_granted"]= true;
		$_SESSION["sentiment"]= "good";		
		session_regenerate_id(true);

		//$_SESSION['username']=$_SESSION['name'];
	//	$_SESSION['userid']=$user['id']; 
		$_SESSION['emailerror1'] = null;
		$_SESSION['emailerror2'] = null;
		$_SESSION['emailerror3'] = null;
		$_SESSION['password'] = null;
		//$dao->redirect("home.php" , "Login successful! Welcome back. ");
		redirectSuccess("granted.php",NULL);
	}else{
		  
		$_SESSION['sentiment']="bad";
		$errors['message'] = "Invalid username or password";
		$_SESSION['error']=$error;
		$_SESSION['email'] = $email;
		// $_SESSION['emailerror1'] = $error['emailerror1'];
		// $_SESSION['emailerror2'] = $error['emailerror2'];
		// $_SESSION['emailerror3'] = $error['emailerror3'];
		$_SESSION['password'] = $password;
		redirectError("login.php?error=true",$error,$presets);
	 //  $dao->redirect("login.php" , "Login successful! Welcome back. ");
	 }


		
	
}catch(Exception $e){
echo print_r($e,1);

}
	
	