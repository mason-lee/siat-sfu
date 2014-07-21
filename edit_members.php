<?php
	/*
		This is for members to edit their information
	*/
	session_start();
	include('includes/db_connection.php');
	ini_set('display_errors', 1);
?>

<?php
	$subject_id = $_SESSION["id"];
	$username = $_SESSION["member_username"];
	$firstname = $_SESSION["nickname"];
	$lastname = $_SESSION["member_lastname"];
	$email = $_SESSION["member_email"];
	$highschool = $_SESSION["writer_school"];
	$year = $_SESSION["member_year"];
	$description = $_SESSION["description"];
	$website = $_SESSION["website"];
	$flickr = $_SESSION["flickr"];
	$twitter = $_SESSION["twitter"];

	if(!$subject_id || !$username) {
		// header("Location: index.php");
	}
?>

<?php
	$usernamemsg = "";

	$new_username = $_POST['username'];
	$new_firstname = $_POST['firstname'];
	$new_lastname = $_POST['lastname'];
	$new_email = $_POST['email'];	
	$new_highschool = $_POST['highschool'];
	$new_year = $_POST['year'];
	$new_description = $_POST['description'];
	$new_website = $_POST['website'];
	$new_flickr = $_POST['flickr'];
	$new_twitter = $_POST['twitter'];
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . '/mideuml/upload/');
	define('DISPLAY_PATH', '/mideuml/upload/');
	define('MAX_FILE_SIZE', 2000000);
	
	$permitted = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif');

	if (isset($_POST['upload'])) {

		$fileName = $_FILES['userfile']['name'];
		$tmpName = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];

		// get the file extension 
		$ext = substr(strrchr($fileName, "."), 1);
		// generate the random file name
		$randName = md5(rand() * time());

		// image name with extension
		$myfile = $randName . '.' . $ext;
		// save image path
		$path = UPLOAD_PATH . $myfile;

		if (in_array($fileType, $permitted) && $fileSize > 0 && $fileSize <= MAX_FILE_SIZE) {
			//store image to the upload directory
			$tmpName_new = addslashes($tmpName);	
			$result = move_uploaded_file($tmpName_new, $path);
			
			if (!$result) {
				echo "Error uploading image file";
				exit;
			} 

			else {
				// $query_pic = "INSERT INTO members(name, size, type, file_path) VALUES(?,?,?,?)";
				$query_pic = "INSERT INTO members(name, size, type, file_path) VALUES '$tmpName_new', '$fileSize','$fileType', '$path' WHERE user_id='$subject_id'";
				$result2 = mysqli_query($connection, $query_pic);
				
				
				if (isset($result2)) {
					// echo 'Success!<br/>';
					echo '<img src="' . DISPLAY_PATH . $myfile . '"/>';
				}

				else {
					die("Error preparing Statement");
				}
			}
		} 

		else {
			echo 'error upload file';
		}
	}


	else {
		echo 'error';
	}

	
	$result_select = mysqli_query($connection, "SELECT * FROM members");

		while($row=mysqli_fetch_array($result_select)) {
			$id_db = $row["user_id"];
			if($id_db === $subject_id) {
				
				if(isset($description)&&isset($website)&&isset($flickr)&&isset($twitter)){
					$query = "UPDATE members 
	 					SET user_name = '$new_username',
	 						first_name = '$new_firstname',
	 						last_name = '$new_lastname',
	 						email = '$new_email',
	 						high_school = '$new_highschool',
	 						graduation_year = '$new_year',
	 						description = '$new_description',
	 						website = '$new_website',
	 						flickr_id = '$new_flickr',
	 						twitter_id = '$new_twitter'
	 					WHERE user_id = $subject_id";
				}
				else {
					$query = "INSERT INTO members 
	 					SET user_name = '$new_username',
	 						first_name = '$new_firstname',
	 						last_name = '$new_lastname',
	 						email = '$new_email',
	 						high_school = '$new_highschool',
	 						graduation_year = '$new_year',
	 						description = '$new_description',
	 						website = '$new_website',
	 						flickr_id = '$new_flickr',
	 						twitter_id = '$new_twitter'
	 						WHERE user_id = $subject_id";	
				}

				// $query = "UPDATE members 
	 		// 			SET user_name = '$new_username',
	 		// 				first_name = '$new_firstname',
	 		// 				last_name = '$new_lastname',
	 		// 				email = '$new_email',
	 		// 				high_school = '$new_highschool',
	 		// 				graduation_year = '$new_year',
	 		// 				description = '$new_description',
	 		// 				website = '$new_website',
	 		// 				flickr_id = '$new_flickr',
	 		// 				twitter_id = '$new_twitter'
	 		// 			WHERE user_id = $subject_id";

	 		$retval = mysqli_query($connection, $query);

	 			if(!$retval) 
				{
					die('Could not update data: ' . mysqli_error());
				}
				else 
				{
					/*
				 		Update Session values.
					*/
					$username = $new_username;
					$firstname = $new_firstname;
					$lastname = $new_lastname;	
					$email = $new_email;
	 				$highschool = $new_highschool;
	 				$year = $new_year;
	 				$description = $new_description;
	 				$website = $new_website;
	 				$flickr = $new_flickr;
	 				$twitter = $new_twitter;

	 				$usernamemsg = "<h3>Your information has been updated.</h3>";
	 			}
			}//End id_db === subject_id
		}//End while
	}//End if statement
?>


<?php
$title_name = "Edit Account";
	include('includes/header.php');
?>

<div class="form-container">
	<?php
		// var_dump($_SESSION);
	?>
	<div class="login-box">
		<h3>
			Edit Personal Information
		</h3>
		<?php echo $usernamemsg; ?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			<div class="form-row">
                <div class="form-row-body">
                    <label>Username</label>
                    <input type="text" name="username" size="50" value="<?php echo $username; ?>"; placeholder="username"/>
            
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-body">
                    <label>First name</label>
                    <input type="text" name="firstname" size="50" value="<?php echo $firstname; ?>"; placeholder="firstname"/>
            
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-body">
                    <label>Last name</label>
                    <input type="text" name="lastname" size="50" value="<?php echo $lastname; ?>"; placeholder="lastname"/>
            
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-body">
                    <label>Email</label>
                    <input type="text" name="email" size="50" value="<?php echo $email; ?>"; placeholder="Email"/>
            
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-body">
                    <label>High school</label>
                    <input type="text" name="highschool" size="50" value="<?php echo $highschool; ?>"; placeholder="highschool"/>
            
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-body">
                    <label>Graduation year</label>
                    <input type="text" name="year" size="50" value="<?php echo $year; ?>"; placeholder="Graduation year"/>
            
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-body">
                    <label>Description</label>
                    <input type="text" name="description" size="50" value="<?php echo $description; ?>"; placeholder="Description"/>
            
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-body">
                    <label>Website</label>
                    <input type="text" name="website" size="50" value="<?php echo $website; ?>"; placeholder="Website"/>
            
                </div>
            </div>
             <div class="form-row">
                <div class="form-row-body">
                    <label>Flickr ID</label>
                    <input type="text" name="flickr" size="50" value="<?php echo $flickr; ?>"; placeholder="Flickr ID"/>
            
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-body">
                    <label>Twitter ID</label>
                    <input type="text" name="twitter" size="50" value="<?php echo $twitter; ?>"; placeholder="Twitter ID"/>
                </div>
            </div>

            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input name="userfile" type="file" id="userfile"/>
            <input name="upload" type="submit" class="myc" id="upload" value="Upload"/>
            
            <div class="form-row">
                <div class="form-row-body">
                    <input type="submit" name="submit" size="50" value="Edit Information"/>
                    <!-- <span class="error">*<?php echo $nameErr; ?></span> -->
                </div>
            </div>
		</form>
	</div>
</div>

<?php 
	mysqli_close($connection);
?>
<?php include('includes/footer.php');?>