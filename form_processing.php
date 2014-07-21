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
	$website = $_POST['website'];
	$field = $_POST['field'];

	$error = array();

if(isset($_POST['submit_button']))
{
  // use trim() so empty spaces don't count
  // use === to avoid false positives
  // empty() would consider "0" to be empty

  $first_name = trim($firstname);
  if(!is_string($first_name) || empty($first_name)) {
    $error['firstname'] = "Your last name is required.";
  }

  $last_name = trim($lastname);
  if(!is_string($last_name) || empty($last_name)) {
    $error['lastname'] = "Your last name is required.";
  }

  $user_name = trim($username);
  if(!is_string($user_name) || empty($user_name)) {
    $error['username'] = "Your username is required.";
  }

  $pass_word = trim($password);
  $min = 6;
  if(!is_string($pass_word) || empty($pass_word) || strlen($pass_word) < $min) {
    $error['password'] = "Your password is required.";
  }
  $max = 20;
  if(!is_string($pass_word) || empty($pass_word) || strlen($pass_word) > $max) {
    $error['password'] = "Your password is required.";
  }

  $email_address = trim($email);
  if(!is_string($email_address) || empty($email_address)) {
    $error['email'] = "Your email address is required.";
  }

  print_r($error);
}
?>

<?php

	// 2. Perform database query
	$query = "INSERT INTO members (";
	$query .= "first_name, last_name, user_name, pass_word, email, high_school, graduation_year, description, website, field";
	$query .= ") VALUES (";
	$query .= "'$firstname', '$lastname', '$username', '$password', '$email', '$school', '$graduationyear', '$description', '$website', '$field'";
	$query .= ")";

	//resource object/set
	$result = mysqli_query($connection, $query);
	//Test if there was a query error
	if($result) {
		//Success
		header("Location: index.php");
		echo "Success!";
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

<?php
// $error = array();

// $firstname = $_POST['firstname'];
// $lastname = $_POST['lastname'];
// $username = $_POST['username'];
// $password = $_POST['password'];
// $email = $_POST['email'];
// $school = $_POST['school'];
// $graduationyear = $_POST['graduationyear'];
// $description = $_POST['description'];
// $website = $_POST['website'];


// if(isset($_POST['submit_button']))
// {
//   // use trim() so empty spaces don't count
//   // use === to avoid false positives
//   // empty() would consider "0" to be empty

//   $first_name = trim($firstname);
//   if(!is_string($first_name) || empty($first_name)) {
//     $error['firstname'] = "is it working?";
//   }

//   $last_name = trim($lastname);
//   if(!is_string($last_name) || empty($last_name)) {
//     $error['lastname'] = "Your last name is required.";
//   }

//   $user_name = trim($username);
//   if(!is_string($user_name) || empty($user_name)) {
//     $error['username'] = "Your username is required.";
//   }

//   $pass_word = trim($password);
//   if(!is_string($pass_word) || empty($pass_word)) {
//     $error['password'] = "Your password is required.";
//   }

//   $email_address = trim($email);
//   if(!is_string($email_address) || empty($email_address)) {
//     $error['email'] = "Your email address is required.";
//   }

//   print_r($error);
// }

?>



















