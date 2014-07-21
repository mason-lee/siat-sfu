<?php
// if($_SERVER["HTTPS"] != "on") {
// 	header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
// 	exit;
// }
session_start();
//let's see how we got here
// echo "<p>callback_URL is: "; 
// if (isset($_SESSION['callback_URL'])) echo $_SESSION['callback_URL'];
// echo "</p>";
include('includes/db_connection.php');
?>

<?php
// Grab User submitted information
$username = $_POST["username"];
$password = $_POST["password"];

/*
	Get the first name of the user
*/


/*
	select columns from visitor table and make login working. 
	And go to follow.php to make following working.

*/	
$result = mysqli_query($connection, "SELECT visitor_username, visitor_password, visitor_firstname, visitor_id FROM visitors WHERE visitor_username = '{$username}' && visitor_password = '{$password}'");
$row = mysqli_fetch_array($result);

print_r($result);
print_r($row);

// if (!isset($_SESSION['valid_user'])) {
	if(!empty($username) && !empty($password)) {
		if($row["visitor_username"] == $username && $row["visitor_password"] == $password) {
	
			$_SESSION['is_login'] = true;
			$_SESSION['visitor_is_login'] = true;
	        $_SESSION['nickname'] = $row["visitor_firstname"];
	        $_SESSION['id'] = $row["visitor_id"];
	        header("Location: ./index.php");
			exit;
		}
		else {
			header("Location: ./visitor_login.php");
			unset($_SESSION['is_login']);			
			die("Database query failed.");
			exit;
		}
	} else {
		echo "please enter username and password";
	}
?>

<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>