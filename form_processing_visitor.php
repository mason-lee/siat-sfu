<?php
	require_once("includes/db_connection.php");
?>
<?php
	// Read values from $_POST
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$school = $_POST['school'];
	$graduationyear = $_POST['graduationyear'];
	$description = $_POST['description'];
?>

<?php

	// 2. Perform database query
	$query = "INSERT INTO visitors (";
	$query .= "visitor_firstname, visitor_lastname, visitor_username, visitor_password, visitor_email, visitor_highschool, visitor_graduationyear, visitor_description";
	$query .= ") VALUES (";
	$query .= "'$firstname', '$lastname', '$username', '$password', '$email', '$school', '$graduationyear', '$description'";
	$query .= ")";

	//resource object/set
	$result = mysqli_query($connection, $query);
	//Test if there was a query error
	if($result) {
		//Success
		header("Location: index.php");		
	} else {
		//Failure
		// $message = "user account creation failed.";
		die("Database query failed. " . mysqli_error($connection));
	}
?>

<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>

