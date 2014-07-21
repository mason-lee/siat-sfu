<?php
	/*
		This is for visitors to edit their information
	*/
	session_start();
	include('includes/db_connection.php');
?>

<?php
	$subject_id = $_SESSION["visitor_id"];
	$username = $_SESSION['visitor_username'];
	$firstname = $_SESSION['nickname'];
	$lastname = $_SESSION['visitor_lastname'];
	$highschool = $_SESSION['visitor_highschool'];
	$email = $_SESSION['visitor_email'];
	$year = $_SESSION['visitor_graduationyear'];
	$description = $_SESSION['visitor_description'];

	// print_r($_SESSION);
	if(!$subject_id || !$username) {
		//subject ID was missing or invalid
		//subject couldn't be found on database
		// header("Location: index.php");
	}
?>

<?php
	$msg = "";
	$usernamemsg = "";
	$firstnamemsg = "";

	$new_username = $_POST['username'];
	$new_firstname = $_POST['firstname'];
	$new_lastname = $_POST['lastname'];
	$new_email = $_POST['email'];
	$new_highschool = $_POST['highschool'];
	$new_graduationyear = $_POST['year'];
	$new_description = $_POST['description'];
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// echo "test";
		// $usernamemsg = $new_username;
		// $firstnamemsg = $new_firstname;

		// $result_select = mysqli_query($connection, "SELECT visitor_id FROM visitors WHERE visitor_id = $subject_id");
		$result_select = mysqli_query($connection, "SELECT visitor_id, visitor_username, visitor_firstname, visitor_lastname, visitor_highschool, visitor_graduationyear, visitor_description FROM visitors");
		
		while($row=mysqli_fetch_array($result_select)) {
			$id_db = $row["visitor_id"];

			if($id_db === $subject_id) {

				$query = "UPDATE visitors 
						SET visitor_username = '$new_username',
							visitor_firstname = '$new_firstname',
							visitor_lastname = '$new_lastname',
							visitor_email = '$new_email',
							visitor_highschool = '$new_highschool',
							visitor_graduationyear = '$new_graduationyear',
							visitor_description = '$new_description'
						WHERE visitor_id = $subject_id";

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
					$year = $new_graduationyear;
					$description = $new_description;
					$usernamemsg = "<h3 class='underline'>Your information has been updated.</h3>";
				}
			}//End if condition to see if two values are same.
		
			else 
			{
				// echo "doesn't match";
			}
		}//End while loop
	}//End Submitted post button
	mysqli_close($connection);
?>

<?php
	include('includes/header.php');
?>

<div class="form-container">
	<div class="login-box">
		<h2>
			Edit Personal Information
		</h2>
		<?php
			echo $usernamemsg;
		?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
                    <input type="text" name="email" size="50" value="<?php echo $email; ?>"; placeholder="email"/>
            
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
                    <input type="submit" name="submit" size="50" value="Edit Information"/>
                    <!-- <span class="error">*<?php echo $nameErr; ?></span> -->
                </div>
            </div>
		</form>
	</div>
</div>


<?php 
// mysqli_close($connection);
?>
<?php include('includes/footer.php');?>