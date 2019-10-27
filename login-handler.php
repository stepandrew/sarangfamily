<?php
session_start();
require_once 'KLogger.php';
$logger=new  KLogger ( "log.txt" , KLogger::WARN );

$username = $_POST['email'];
$password = $_POST['password'];
//$users = $dao->getUsers();
 //echo $dao->getConnectionStatus();
$valid = false;
if ($username == "annahan1803@gmail.com" && $password == "1234") {
  $valid = true;
}

$logger->LogDebug("Clearing the session array");
$_SESSION = array();
if ($valid) {
   $_SESSION['logged_in'] = true;
   $logger->LogInfo("User login successful [{$username}]");
   header("Location: granted.php");
   exit;
} else {
   $logger->LogWarn("User login failed [{$username}]");
   $_SESSION['message'] = "Invalid username or password";
   header("Location: login.php");
   exit;
}



	?>

	
