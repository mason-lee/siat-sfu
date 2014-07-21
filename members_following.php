<?php 
	session_start();
	$title_name = "Mason | Members";
	$section = "members_page";
	include('includes/header.php'); 
	include('includes/db_connection.php');

	if(!isset($_SESSION['is_login'])){
	    header('Location: ./login.php');
	}

	ini_set('display_errors', 1);
?>

<div class="form-container">
	<div class="container">
		<h1>
			Members you are following
		</h1>

		<?php 

			echo "<table border='1'>
			<tr>
				<th>Blog</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>High School</th>
				<th>Graduation Year</th>
				<th>Description</th>
				<th>Website</th>
			</tr>";

			/*
				Get the user_id of selected members
			*/
			
			$members_selected = $_SESSION['remember_selected_members'];
			
			foreach($members_selected as $value) {
				$sql = "SELECT user_id, first_name, last_name, email, high_school, graduation_year, description, website 
						FROM members 
						WHERE user_id IN (" . implode(',', array_map('intval', $members_selected)) . ")";
				$result = mysqli_query($connection, $sql);
			}

			while($row = mysqli_fetch_array($result)) {
				$id = $row["user_id"];
				$firstname = $row["first_name"];
				$lastname = $row["last_name"];
				$email = $row["email"];
				$highschool = $row["high_school"];
				$graduationyear = $row["graduation_year"];
				$description = $row["description"];
				$website = $row["website"];

				echo "<tr>";
					// echo "<td><a class='underline' href='blog_members.php?id=$value&firstname=$firstname&lastname=$lastname&email=$email&highschool=$highschool&graduationyear=$graduationyear&website=$website&description=$description'>Blog</a></td>";
				echo "<td><a class='underline' href='blog_members.php?id=$id&firstname=$firstname&lastname=$lastname'>Blog</a></td>";
					echo "<td>$firstname</td>";
					echo "<td>$lastname</td>";
					echo "<td>$email</td>";
					echo "<td>$highschool</td>";	
					echo "<td>$graduationyear</td>";
					echo "<td>$description</td>";
					echo "<td>$website</td>";
				echo "</tr>";
			}
			echo "</table>";
		?>
	</div>
</div>

<?php include('includes/footer.php') ?>
<?php mysqli_close($connection);?>