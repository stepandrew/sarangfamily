

	<?php
	  require_once("Dao.php");
	$dao=new Dao();
	$users = $dao->getUsers();
    echo $dao->getConnectionStatus();

	?>

	
