<html>
<head>

    	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>


</head>
<body>

  <div class="header-container">

	<?php
  	  require_once('header.php');
	?>
 </div>

    <h2>Welcome to SarangFamily</h2>
<div class ="buttonmargine">
         <a href="lifeInformation.php">
         	<button class="body-button" id="life-button">Life Information</button>
         </a>
          <a href="gallery.php">
           <button class="body-button" id="gallery-button">Gallery</button>
          </a>
           <a href="family.php">
            <button class="body-button" id="family-button">Family</button>
            </a>
             <a href="healthBeauty.php">
            <button class="body-button" id="health-button">Health & Beauty</button>
         </a>
</div>



    <div class="footer-container">

	<?php
 	   require_once('footer.php');
	?>
    </div>




</body>

</html>