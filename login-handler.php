<?php
session_start();
require_once 'Dao.php';
require_once 'KLogger.php';

$logger = new KLogger("log.txt",KLogger::WARN );

$email =  $_POST['email'];
$password = $_POST['password'];
$valid = true;
$error=array();

function valid_length($field, $min, $max) {
	$trimmed = trim($field);	
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
	
}

if(!valid_length($password, 2, 120)){
	$error['passwordError'] ="Please enter a password greater then 2.";
  // echo $passwordError;
	 $valid = false;
}


if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$error['emailError'] = "Must be valid email address.";
	//echo $emailError;
	$valid = false;
}

if(!valid_length($email, 2, 100)){
	$error['passwordError'] ="Please enter email greater then 2 and less than 40 counts.";
  // echo $passwordError;
	 $valid = false;
}
// email match using regular expressions
if(!preg_match('/\w+@\w+\.[a-zA-Z]{2,4}/',$email)){

	$errors['emailmatchfail']="Please check your input.";
	$valid = false;
}



$logger ->LogDebug("Clearing the session array");
$_SESSION = array();

if($valid){
	$_SESSION['logged_in'] = true;
	$logger->LogInfo("User login successful [{$email}]");
    
}else{
	$logger->LogWarn("User login failed [{$email}]");
	$_SESSION['message'] = "Invalid username or password";
}




if(!empty($error)) { 

	$_SESSION["error"] = $error;	
	$_SESSION["presets"] = array('email' => htmlspecialchars($email),'password' => htmlspecialchars($password));

 	//header('Location: logfail.php');
// 	header ('Location: https://damp-mountain-91968.herokuapp.com/logfail.php');
	$valid = false;
 }else{
	$email =  (isset($_POST['email'])) ? $_POST['email'] : "";
	$password = (isset($_POST['password'])) ? $_POST['password'] : "";

	 //  		header('Location:' . "granted.php");
	 //header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
	// exit;
	 
 }


//echo "here1";
$dao= new Dao();
//echo "here2";
try{
	$user = $dao->getUsers($email,$password);
	
	if($user){
		//echo "found user";
		header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
		//	header('Location:granted.php');
	}else{
		//echo "not fount";

		header ('Location: https://damp-mountain-91968.herokuapp.com/logfail.php');
	}


}catch(Exception $e){
echo print_r($e,1);
//	header ('Location: https://damp-mountain-91968.herokuapp.com/logfail.php');
}
	

	// "https://damp-mountain-91968.herokuapp.com/granted.php"
	//https://git.heroku.com/shrouded-sierra-40031.git
	//header('Location: https://git.heroku.com/shrouded-sierra-40031.git/home.php');
    //header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
	//header("Location:granted.php");