<?php
session_start();
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
  // echo $error;
	 $valid = false;
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$error['email'] = "Must be valid email address.";
	//echo $error;
	$valid = false;
}
if(!valid_length($email, 2, 100)){
	$error['email'] ="Please enter email greater then 2 and less than 40 counts.";
  // echo $error;
	 $valid = false;
}
// email match using regular expressions
if(!preg_match('/\w+@\w+\.[a-zA-Z]{2,4}/',$email)){
	$error['email']="Please check your input.";
	$valid = false;
}
$logger ->LogDebug("Clearing the session array");
//$_SESSION = array();
if($valid){
	$_SESSION['logged_in'] = true;
	$logger->LogInfo("User login successful [{$email}]");
    
}else{
	$logger->LogWarn("User login failed [{$email}]");
	$_SESSION['invalid'] = "Invalid username or password";
}
// if(empty($error)) { 	
//    // $email =  (isset($_POST['email'])) ? $_POST['email'] : "";
// 	//$password = (isset($_POST['password'])) ? $_POST['password'] : "";
//  		header('Location: home.php');
// 	 //header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
// 	// exit;
 
//  }else{
// 	$_SESSION["error"] = $error;	
// 	$_SESSION["presets"] = array('email' => htmlspecialchars($email),'password' => htmlspecialchars($password));
	 
// 	 	//header('Location: login.php');
// // 	header ('Location: https://damp-mountain-91968.herokuapp.com/logfail.php');
// 	$valid = false;
//  }
//echo "here1";
$dao= new Dao();
//echo "here2";
try{
	$user = $dao->getUsers($email,$password);
	$_SESSION['name'] = $dao->getNameAndStatus($email);
	
	if($user){
		$_SESSION["access_granted"]= true;
		$_SESSION["sentiment"]= "good";		
		session_regenerate_id(true);

		$_SESSION['username']=$_SESSION['name'];
		$_SESSION['userid']=$user['id']; 
		$_SESSION['email'] = null;
		$_SESSION['password'] = null;
		redirectSuccess("granted.php",NULL);
	}else{
		  
		$_SESSION['sentiment']="bad";
		$error['message'] = "Invalid username or password";
		$_SESSION['error']=$error;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		redirectError("login.php?error=true",$error,$presets);
	 }


		//header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
		//	header('Location:granted.php');

		//echo "not fount";
		//header('Location:login.php');
		//header ('Location: https://damp-mountain-91968.herokuapp.com/logfail.php');
	//	header ('Location: https://damp-mountain-91968.herokuapp.com/login.php');
	
}catch(Exception $e){
echo print_r($e,1);
//	header ('Location: https://damp-mountain-91968.herokuapp.com/logfail.php');
}
	
	// "https://damp-mountain-91968.herokuapp.com/granted.php"
	//https://git.heroku.com/shrouded-sierra-40031.git
	//header('Location: https://git.heroku.com/shrouded-sierra-40031.git/home.php');
    //header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
	//header("Location:granted.php");