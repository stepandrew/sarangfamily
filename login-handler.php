<?php
session_start();
require_once('Dao.php');
$email = $_POST['email'];
 
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);;


//$dao->addUser($username);
//echo $dao->getConnectionStatus();
$dao= new Dao();

echo "here1";
$users = $dao->getUsers($email,$password);
echo $users;

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$emailError = "Must be valid email address.";
	echo $emailError;
	$valid = false;
}

/*
$error = isset( $_GET['error']) ? $_GET['error'] : false;
if($error == true){
	?>
<span> OH NO, Your input was incorrect! </span>
<?php } ?>
*/
if(empty($errors)) { 
/* To do : email match
	$matches = array();
	$string = 'my email is conradkennington@gmail.com';
	preg_match('/\w+@\w+\.[a-zA-Z]{2,4}/', $string, $matches);
	echo "<pre>" . print_r($matches,1) . "</pre>";
*/
	//if ($email == "annahan@gmail.com" && $password == "1111") {
	//	$valid = true;
	  
	  
     if(mysqli_num_rows($users) > 0){
	// 	//"https://damp-mountain-91968.herokuapp.com/granted.php"
	// 	//https://git.heroku.com/shrouded-sierra-40031.git
		 //header('Location: https://git.heroku.com/shrouded-sierra-40031.git/home.php');
		 header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
	//header("Location:home.php");
        exit;
    }
    else{
	//	header ('Location: https://damp-mountain-91968.herokuapp.com/logfail.php');
		$errors['status'] = "Invalid Email or Password. Try again / Create an account.";
		echo $errors['status'];

    }
} else {
	$_SESSION["errors"] = $errors;
	$_SESSION['presets'] = array('email' => htmlspecialchars($email),'pw' => htmlspecialchars($pw));
	header('Location: logfail.php');
}

?>

	
