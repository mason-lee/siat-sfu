<?php
	session_start();
	require_once("includes/db_connection.php");
	ini_set('display_errors', 1);
?>
<?php
	
	// Read values from $_POST
	$blogtitle = $_POST['blogtitle'];
	$blogpost = $_POST['blogcontent'];
	$writer = $_POST['writer'];
	$writername = $_POST['writername'];
	$writerschool = $_POST['writer_school'];
?>

<?php
	// 2. Perform database query
	$query = "INSERT INTO blog_content (";
	$query .= "blog_post_title, blog_post_content, blog_post_writer, members_user_id, writer_school";
	$query .= ") VALUES (";
	$query .= "'{$blogtitle}', '{$blogpost}', '{$writername}', '{$writer}', '{$writerschool}'";
	$query .= ")";

	$result = mysqli_query($connection, $query);



	//Test if there was a query error
	if(isset($result)) {
		$writer_id = $_SESSION['id'];
		$sql = "SELECT * FROM visitors INNER JOIN visitor_to_member WHERE visitor_to_member.members_user_id = '{$writer_id}'";
		$result_email = mysqli_query($connection, $sql);

		echo mysqli_num_rows($result_email);
		
		if(isset($result_email)){
			while($email_row = mysqli_fetch_assoc($result_email)) {
				
				$email = $email_row['visitor_email'];
				print_r($email);
				echo "test";
				$to = $email;
				$subject = "New blog posts for you";
				$message = "
							<html>
								<head>
									<title>HTML email</title>
								</head>
								<body>
									<p>This email contains HTML Tags!</p>
									<table>
										<tr>
											<th>Firstname</th>
											<th>Lastname</th>
										</tr>
										<tr>
											<td>John</td>
											<td>Doe</td>
										</tr>
									</table>
								</body>
							</html>
						";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <maizur89@gmail.com>' . "\r\n";
				$headers .= 'Cc: this.is@masonlee.me' . "\r\n";

				mail($to,$subject,$message,$headers);
			}
		}

		$_SESSION['is_login'] = true;
        // $_SESSION['nickname'] = $row["first_name"];
		// header("Location: blog_post.php");
		echo "Blog Post uploaded successfully";
		
	} else {
		//Failure
		$message = "user account creation failed.";
		die("Database query failed. " . mysqli_error($connection));
		header("Location: blog.php");
	}
?>

<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>


























