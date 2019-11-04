<?php
session_start();
require_once('Dao.php');
//$email = $_GET['email'];

$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['error']=array();
//$dao->addUser($username);

$dao= new Dao();
//$conn = $dao->getConnection();
$users = $dao->getUsers($email,$password);
//$ userexists =$dao -> userExists($email);
header('Location:' . "granted.php"); 
// $my_query = ""; 
// $my_query = "SELECT * FROM user WHERE email = '$email' AND pw = '$pw'";
// $users = mysqli_query($conn, $my_query);
/*
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

echo "here1";
if(empty($_SESSION['error'])) { 
	echo "here2";
/* To do : email match
	$matches = array();
	$string = 'my email is conradkennington@gmail.com';
	preg_match('/\w+@\w+\.[a-zA-Z]{2,4}/', $string, $matches);
	echo "<pre>" . print_r($matches,1) . "</pre>";
*/
	//if ($email == "annahan@gmail.com" && $password == "1111") {
	//	$valid = true;

    //  if(empty($_SESSION['error'])){
	// 	 if(mysql_num_rows($users)>0){
	// 		header('Location:' . "granted.php"); 
	// 		 exit;
	// 	 } else{
	// //	header ('Location: https://damp-mountain-91968.herokuapp.com/logfail.php');
    //   $_SESSION['error'] = "Invalid Email or Password. Try again / Create an account.";
	

    // }


	//	$users = $dao->getUsers($email,$password);


	// 	//"https://damp-mountain-91968.herokuapp.com/granted.php"
	// 	//https://git.heroku.com/shrouded-sierra-40031.git
		 //header('Location: https://git.heroku.com/shrouded-sierra-40031.git/home.php');
		//header('Location: https://damp-mountain-91968.herokuapp.com/granted.php');
	//header("Location:granted.php");
      
    
   
// } else {
// 	$_SESSION["error"] = $error;
// 	$_SESSION['presets'] = array('email' => htmlspecialchars($email),'password' => htmlspecialchars($password));
// 	header('Location: logfail.php');
// }

?>

	
