<?php
	session_start();
	ini_set('display_errors', 1);
	include('includes/db_connection.php');
	$title_name = "Sign Up";
	$section = "signup";
	include('includes/header.php');  
?>

<?php
if(isset($_POST['submit'])) {
	// $firstname = $_POST['firstname'];
	// $lastname = $_POST['lastname'];
	// $username = $_POST['username'];
	// $password = $_POST['password'];
	// $email = $_POST['email'];
	// $school = $_POST['school'];
	// $graduationyear = $_POST['graduationyear'];
	// $description = $_POST['description'];
}
	$firstnameErr = "";
	$lastnameErr = "";
	$usernameErr = "";
	$passwordErr = "";
	$emailErr = "";
	$schoolErr = "";
	$yearErr = "";
	$descriptionErr = "";
	// $websiteErr = "";



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

	// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// $errormsg = "you are ready!";
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$school = $_POST['school'];
		$graduationyear = $_POST['graduationyear'];
		$description = $_POST['description'];

		if(!is_string($firstname) || empty($firstname)) {
			$firstnameErr = "First name is required.";
		}
		else 
	    {
	        $fisrstnametest = test_input($firstname);
	        //Check if name only contains lettere and whitespace
	        if(!preg_match("/^[a-zA-Z ]*$/", $fisrstnametest))
	        {
	            $firstnameErr = "Only letters and white space allowed.";
	        }
    	}

    	if(!is_string($lastname) || empty($lastname)) {
			$lastnameErr = "Last name is required.";
		}
		else 
	    {
	        $lastnametest = test_input($lastname);
	        //Check if name only contains lettere and whitespace
	        if(!preg_match("/^[a-zA-Z ]*$/", $lastnametest))
	        {
	            $lastnameErr = "Only letters and white space allowed.";
	        }
    	}

    	if(empty($username)) {
	        $usernameErr = "Username is required.";
	    }

	    $username_query = "SELECT visitor_username FROM visitors";
		$username_result = mysqli_query($connection, $username_query);
		$username_exist = false;

		// $username_rows = [];
		while($username_row = mysqli_fetch_array($username_result))
		{
		    // $username_rows[] = $username_row;
		    // print_r($username_row);
		    // echo "<br>";
		    // var_dump($username_exist);
		    // echo "<br>";

		    // $username = "omgusername";
		    if (in_array($username, $username_row)) {
		    	$usernameErr = "This username already exists. Please pick different name.";
		    	$username_exist = true;

		    }
		}

	    $min = 6;
	    if(empty($password) || strlen($password < $min)) {
	        $passwordErr = "Password is required and should be longer than 6 characters.";
	    }

	    $newpassword = md5($password);
	    
	    if(empty($email)) {
	    	$emailErr = "Email is required.";
	    }
	    else
	    {
	    	$email_test = test_input($email);
		    // check if e-mail address syntax is valid
		    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email_test))
		    {
		    	$emailErr = "Invalid email format"; 
		    }
	    } 

	    if(empty($school)) {
	    	$schoolErr = "Your high school information is required.";
	    }

	    if(empty($graduationyear)) {
	    	$yearErr = "When did you graduate or expecting to?";
	    }

	    if(!empty($username) && !empty($newpassword) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($school) && !empty($graduationyear))
	    {
	    	if(!$username_exist) {
	    	
	    	// 2. Perform database query
			$query = "INSERT INTO visitors (";
			$query .= "visitor_firstname, visitor_lastname, visitor_username, visitor_password, visitor_email, visitor_highschool, visitor_graduationyear, visitor_description";
			$query .= ") VALUES (";
			// $query .= "'$firstname', '$lastname', '$username', '$newpassword', '$email', '$school', '$graduationyear', '$description'";
			$query .= "'$firstname', '$lastname', '$username', '$newpassword', '$email', '$school', '$graduationyear', '$description'";
			$query .= ")";

			//resource object/set
			$result = mysqli_query($connection, $query);

			//Test if there was a query error
			if($result) {
				//Success
				header("Location: thankyou.php");

			} else {
				//Failure
				$errormsg ="<br>Please try again.";
				die("Database query failed. " . mysqli_error($connection));
			}
		}
	    }	
	}//End Post
?>

<div class="form-container">
		<div class="login-box">
			<h3>
				Thank you for your interest in School of Interactive Art and Technology in Simon Fraser University! Please sign up and stay connected with people in our program!
			</h3>
		
		<div class="login-box-form">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 		
				<!-- <div class="form-row">
					<div class="form-row-body">
						<input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" size="50" placeholder="first name">
						<span class="error">*<?php echo $firstnameErr; ?></span>
					</div>
				</div> -->
				<div class="form-row">
					<div class="form-row-body">
						<input type="text" name="firstname" size="50" placeholder="first name">
						<span class="error">*<?php echo $firstnameErr; ?></span>
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<input type="text" name="lastname" size="50" placeholder="last name">
						<span class="error">*<?php echo $lastnameErr; ?></span>
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<input type="text" name="username" size="50" placeholder="username">
						<span class="error">*<?php echo $usernameErr; ?></span>
					</div>
				</div>

				<div class="form-row">
					<div class="form-row-body">
						<input type="password" name="password" size="50" placeholder="password">
						<span class="error">*<?php echo $passwordErr; ?></span>
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<input type="email" name="email" size="50" placeholder="Your email address">
						<span class="error">*<?php echo $emailErr; ?></span>
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<input type="text" name="school" size="50" placeholder="Secondary school you attended">
						<span class="error">*<?php echo $schoolErr; ?></span>
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<input type="text" name="graduationyear" size="50" placeholder="Year you graduated">
						<span class="error">*<?php echo $yearErr; ?></span>
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<input type="text" name="description" size="50" placeholder="Anything you want to talk about yourself?">
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<input type="submit" name="submit_button" value="Sign Up">
					</div>
				</div>
			</form>
		</div>
		</div>
	</div>

<?php include('includes/footer.php') ?>



























