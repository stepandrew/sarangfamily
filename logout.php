 <?php
 session_start();
 session_destroy();
 
 ?>
 <html>
<head>
	<header><title>logout</title></header>
	<link href="style" type="text/css" rel="stylesheet">
</head>
<body>
 

       <div class = "logout">
           <h2>Please visit  Saranfamily homepage again<h2>
          	<td> <a href = "login.php">Go To login page</a></td>
       </div>

	<p1> Good by </p1>  
<div class="footer-container">

	<?php
 	   require_once('footer.php');
	?>
    </div>
	</html>