<?php
session_start();
require_once('Dao.php');
//$email = $_GET['email'];

$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['error']=array();
//$dao->addUser($username);

$dao= new Dao();


//$users = $dao->getUsers($email,$password);
//echo $users;

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
if(empty($_SESSION['error'])) { 
/* To do : email match
	$matches = array();
	$string = 'my email is conradkennington@gmail.com';
	preg_match('/\w+@\w+\.[a-zA-Z]{2,4}/', $string, $matches);
	echo "<pre>" . print_r($matches,1) . "</pre>";
*/
	//if ($email == "annahan@gmail.com" && $password == "1111") {
	//	$valid = true;
$users = $dao->getUsers($email,$password);

     if($email>0) {
		echo "<table>";
		foreach ($email as $emails){
			echo "<tr>";
			echo "<td>" . $emails["emails"] . "</td>";
			echo "</tr>";
		}

	// 	//"https://damp-mountain-91968.herokuapp.com/granted.php"
	// 	//https://git.heroku.com/shrouded-sierra-40031.git
		 //header('Location: https://git.heroku.com/shrouded-sierra-40031.git/home.php');
		//header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
	//header("Location:granted.php");
        exit;
    }
    else{
	//	header ('Location: https://damp-mountain-91968.herokuapp.com/logfail.php');
		$errors['status'] = "Invalid Email or Password. Try again / Create an account.";
		echo $errors['status'];

    }
} else {
	$_SESSION["errors"] = $errors;
	$_SESSION['presets'] = array('email' => htmlspecialchars($email),'password' => htmlspecialchars($password));
	header('Location: logfail.php');
}

?>

	
