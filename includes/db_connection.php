<?php

	// // 1. create database connection
	// $dbhost = "mysql://bf0ae94641f785:ba23a7c1@us-cdbr-iron-east-01.cleardb.net/heroku_9407cf07a252f53?reconnect=true";
	// $dbuser = "bf0ae94641f785";
	// $dbpass = "ba23a7c1";
	// $dbname = "heroku_9407cf07a252f53";

	// // create new connection
 //  	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	// /*
	// 	Test if connection succeeded.
	// 	If connection failed, skip the rest of PHP code, and print an error
	// */
	// if(mysqli_connect_errno()) {
	// 	die("Database connection failed: " .
	// 		mysqli_connect_error() . 
	// 		" (" . mysqli_connect_errno() . ")"
	// );	
	// }
	$url=parse_url(getenv("mysql://b2885070675bd9:10368cb6@us-cdbr-iron-east-01.cleardb.net/heroku_d6bc2a97869642e?reconnect=true"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);

    mysqli_connect($server, $username, $password);

    mysqli_select_db($db);
?>

