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
$result = mysqli_query($connection, "SELECT user_name, pass_word, first_name, user_id FROM members WHERE user_name = '{$username}' && pass_word = '{$password}'");
$row = mysqli_fetch_array($result);

// if (!isset($_SESSION['valid_user'])) {
	if(!empty($username) && !empty($password)) {
		if($row["user_name"] == $username && $row["pass_word"] == $password) {
	
			$_SESSION['is_login'] = true;
	        $_SESSION['nickname'] = $row["first_name"];
	        $_SESSION['id'] = $row["user_id"];
	        // print_r(headers_list());
         //    print_r(headers_sent());
            header("Location: index.php");
            // header("Location:" . $_SERVER['REQUEST_URI']);
	       	// $_SESSION['valid_user'] = $row["first_name"];
			exit;
		}
		else {
			header("Location: ./login.php");
			unset($_SESSION['is_login']);			
			die("Database query failed.");
			exit;
		}
	} else {
		echo "please enter username and password";
	}
// }

// if(isset($_SESSION['valid_user'])) {
// 	//authenticated correctly
// 	if(isset($_SESSION['callback_URL'])) {
// 		echo "success";
// 		//go back to where you came from
// 		$callback_URL = $_SESSION['callback_URL'];
// 		unset($_SESSION['callback_URL']);
// 		echo $callback_URL;
// 		header('Location: user_logged_in.php');
// 		exit();
// 	} else {
// 		echo "<h1>You are not logged in.</h1>"
// 	}
// }
?>

<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>