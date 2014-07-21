<?php
	session_start();
	include('includes/db_connection.php');
?>

<?php 
$title_name = "Sign up";
$section = "register";
include('includes/new_header.php');  
?>

<?php
$firstnameErr = "";
$lastnameErr = "";
$usernameErr = "";
$passwordErr = "";
$emailErr = "";
$schoolErr = "";
$yearErr = "";
$descriptionErr = "";
$websiteErr = "";

// $errormsg = "you are ready!";
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$school = $_POST['school'];
$graduationyear = $_POST['graduationyear'];
$description = $_POST['description'];
$website = $_POST['website'];
$flickr_id=$_POST['flickr'];
$twitter_id = $_POST['twitter'];
// $profile_pic = $_POST['image'];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $username_query = "SELECT user_name FROM members";
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

    // $new_password = crypt($password);
    $new_password = md5($password);
?>

<?php
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

    /*
		Upload images
    */
	// //Temporary file name
	// $name = $_FILES['image']['name'];
	// $type = $_FILES['image']['type'];
	// $size = $_FILES['image']['size'];
	// $temp = $_FILES['image']['tmp_name'];
	// //Read the file
	// $fp = fopen($tempName, 'r');
	// $data = fread($fp, filesize($tempName));
	// $data = addslashes($data);
	// fclose($fp);

	// Get image data
	// $binary = file_get_contents($_FILES['image']['tmp_name']);
	// // Get mime type
	// $finfo = new finto(FILEINFO_MIME);
	// $type = $finto->file($_FILES['image']['tmp_name']);
	// $mime = substr($type, 0, strpos($type, ';'));

    if(empty($school)) {
    	$schoolErr = "Your high school information is required.";
    }

    if(empty($graduationyear)) {
    	$yearErr = "When did you graduate or expecting to?";
    }

    // if(!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($school) && !empty($graduationyear))
    if(!empty($username) && !empty($new_password) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($school) && !empty($graduationyear))
    {
    	if (!$username_exist) {

    	// 2. Perform database query
		$query = "INSERT INTO members (";
		$query .= "first_name, last_name, user_name, pass_word, email, high_school, graduation_year, description, website, flickr_id, twitter_id";
		$query .= ") VALUES (";
		$query .= "'$firstname', '$lastname', '$username', '$new_password', '$email', '$school', '$graduationyear', '$description', '$website', '$flickr_id', '$twitter_id'";
		// $query .= "'$firstname', '$lastname', '$username', '$password', '$email', '$school', '$graduationyear', '$description', '$website', '$field'";
		$query .= ")";

		//resource object/set
		$result = mysqli_query($connection, $query);
		// $row = mysqli_fetch_array($result);
		// $username_exist = $row["user_name"];
		//Test if there was a query error
		if(isset($result)) {

			// $query_signup = "SELECT "
			// //Success
			// $_SESSION['is_login'] = true;
   //          $_SESSION['nickname'] = $row["first_name"];
   //          $_SESSION['id'] = $row["user_id"];

   //          $_SESSION['writer_school'] = $row["high_school"];
   //          $_SESSION['member_lastname'] = $row["last_name"];
   //          $_SESSION['member_username'] = $row["user_name"];
   //          $_SESSION['member_email'] = $row["email"];
   //          $_SESSION['member_year'] = $row["graduation_year"];
   //          $_SESSION['description'] = $row["description"];
   //          $_SESSION['website'] = $row["website"];
   //          $_SESSION['flickr'] = $row["flickr_id"];
   //          $_SESSION['twitter'] = $row["twitter_id"];

			// header("Location: members_page_detail.php?id=9.php");
			header("Location: thankyou.php");


		} else {
			//Failure
			// $errormsg ="<br>Please try again.";
			die("Database query failed. " . mysqli_error($connection));
		}
   	}

    }	
}//End Post
?>

<div class="form-container">
		<div class="login-box">
			<h3>
				SIAT wants to provide better information to 
				potential students and their parents.<br>
				Please be an ambassador for SIAT program!
			</h3>
			<?php 
				// echo $errormsg; 
			?>
		<div class="login-box-form">
			<form method="POST" id="uploadform" class="group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"> 		
				<div class="form-row">
					<div class="form-row-body">
						<input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" size="50" placeholder="first name">
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
			<!-- 	<div class="form-row">
					<div class="form-row-body">
						<input type="file" name="image" size="50">
					</div>
				</div> -->
				<div class="form-row">
					<div class="form-row-body">
						<input type="text" name="description" size="50" placeholder="Anything you want to talk about yourself?">
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<input type="text" name="website" size="50" placeholder="Your Website">
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<label for="flickr">Do you want to share your flickr photos with us?</label>
						<input type="text" name="flickr" size="50" placeholder="flickr username">
						<!-- <span class="error">*<?php echo $yearErr; ?></span> -->
					</div>
				</div>
				<div class="form-row">
					<div class="form-row-body">
						<label for="twitter">Do you want to share your twitter timeline with us?</label>
						<input type="text" name="twitter" size="50" placeholder="twitter username">
						<!-- <span class="error">*<?php echo $yearErr; ?></span> -->
					</div>
				</div>

				<div class="form-row">
					<div class="form-row-body">
						<input type="submit" name="submit_button" value="register">
					</div>
				</div>
			</form>
		</div>

		<?php
			// $max_file_size = 1048576;   // expressed in bytes
	  //                           //     10240 =  10 KB
	  //                           //    102400 = 100 KB
	  //                           //   1048576 =   1 MB
	  //                           //  10485760 =  10 MB
			// $message = "";
			// if(isset($_POST['submit'])) {
			// 	$photo = new Photograph();
			// 	$photo->caption = $_POST['caption'];
			// 	$photo->attach_file($_FILES['file_upload']);
			// 	if($photo->save()) {
			// 		// Success
		 //      		$message = "Photograph uploaded successfully.";
			// 	} else {
			// 		// Failure
		 //      		$message = join("<br />", $photo->errors);
			// 	}
			// }
		?>

<!-- 		<form action="photo_upload.php" enctype="multipart/form-data" method="POST"> -->
<?php			
// function output_message($message="") {
// 	if (!empty($message)) { 
// 	return "<p class=\"message\">{$message}</p>";
// 	} else {
// 	return "";
// 	}
// }
?>
			<?php
			 // echo output_message($message); 
			 ?>

			<!-- <div class="form-row">
				<div class="form-row-body">
					<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
					<input name="file_upload" type="file" />
					<p>Caption: <input type="text" name="caption" value="" /></p>
					<input type ="submit" name="submit" value="upload" />
				</div>
			</div>
		</form> -->



		</div>
	</div>
<script src="js/jquery.js"></script>
<script>
	$(document).ready(function() {
		$('#showuploads').load('showuploads.php').hide().fadeIn(500);
	});
</script>
<?php  // 5. Close database connection  
    mysqli_close($connection);
?>

<?php include('includes/footer.php') ?>



























