<?php
session_start();
require_once('Dao.php');
$email = $_POST['email'];
 
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);;


//$dao->addUser($username);
//echo $dao->getConnectionStatus();
$dao= new Dao();
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
    if(mysqli_num_rows($users) > 0){
		//"https://damp-mountain-91968.herokuapp.com/granted.php"
        header('Location: ' . "granted.php");
        exit;
    }
    else{
        $errors['status'] = "Invalid Email or Password. Try again / Create an account.";
    }
} else {
	$_SESSION["errors"] = $errors;
	$_SESSION['presets'] = array('email' => htmlspecialchars($email),'pw' => htmlspecialchars($pw));
	header('Location: login.php');
}

?>

	
