<?php

	// 1. create database connection
	$dbhost = "localhost";
	$dbuser = "mideuml";
	$dbpass = "mideuml";
	$dbname = "mideuml";

	// create new connection
  	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	/*
		Test if connection succeeded.
		If connection failed, skip the rest of PHP code, and print an error
	*/
	if(mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() . 
			" (" . mysqli_connect_errno() . ")"
	);	
	}
?>