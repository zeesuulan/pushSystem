<?php 
	
    include_once 'gcm/db_functions.php';
    include_once 'gcm/GCM.php';

	
	$gcm = new GCM();
	$db = new DB_Functions();

	$rs_user = $db->getAllUsers();


	print_r($gcm);
	print_r(mysql_fetch_array($rs_user));
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Push System</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
 </head>
 <body>
 	
 </body>
 <script src="bootstrap.min.js"></script>
 </html>