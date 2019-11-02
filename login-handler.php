<?php
session_start();

require_once('Dao.php');
$dao= new Dao();


$username = $_POST['email'];
$password = $_POST['password'];
$users = $dao->getUsers();
echo $users;
$dao->addUser("andrew@gmail.com");
//echo $dao->getConnectionStatus();


	?>

	
