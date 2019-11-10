<?php
session_start();
if(!isset($_SESSION['access_granted']) ||$_SESSION['access_granted'] !== true ){
	header("location: login.php");
	exit();
  }
?>
  <div class="header-container">

          	<?php
            	  require_once('header.php');
          	?>
   </div>
<html>
	<body>
        <h2><span class="candleinfo"> Handmade cake candle   </span> <h2>
			<div>
				<ui><li><img id="candle" src="candle1.jpg" width="50%" height="40%" alt="candle1" /></li></ui>
				 I value your opinion ^^ but this part is still under construction. Sorry.<br/>
				<textarea name="comments" row="5" cols="30"></textarea><br />
				<input type="submit" />
				
			</div>
	
	</body>
	

</html>

  <div class="footer-container">

	<?php
 	   require_once('footer.php');
	?>
    </div>
