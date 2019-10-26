<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$localhost_cleardb_url="mysql://b1b2fd935ca956:340e5b69@us-cdbr-iron-east-05.cleardb.net/heroku_f4584639f739b09?reconnect=true";
	if(!getenv("CLEARDB_DATABASE_URL")){
		putenv("CLEARDB_DATABASE_URL=$localhost_cleardb_url");
	}
  $DB_host = 'us-cdbr-iron-east-05.cleardb.net';
  $DB_database = 'heroku_f4584639f739b09';
  $DB_username = 'b1b2fd935ca956';
  $DB_password = '340e5b69';

	?>
	
	
</body>
</html>