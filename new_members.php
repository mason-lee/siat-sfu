<?php 
	session_start();
	$title_name = "Mason | Members";
	$section = "members_page";
	include('includes/header.php'); 
	include('includes/db_connection.php');
	if(!isset($_SESSION['is_login'])){
	    header('Location: ./login.php');
	}
?>

<div class="form-container">
	<div class="container">
		<h1>
			Registered Members test
				<!-- <a href="member_detail.php?fullname=TEST">Test</a> -->
		</h1>

		<?php 
			$result = mysqli_query($connection, "SELECT * FROM members ORDER BY last_name");

			echo "<table border='1'>
			<tr>
			<th>Follow</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>High School</th>
			<th>Graduation Year</th>
			<th>Website</th>
			</tr>";

			while($row = mysqli_fetch_array($result)) {
				$firstname = $row['first_name'];
				$lastname = $row['last_name'];
				$email = $row['email'];
				$highschool = $row['high_school'];
				$graduationyear = $row['graduation_year'];
				$website = $row['website'];
				$description = $row['description'];
				$field = $row['field'];

				echo "<tr>";
				// echo "<td>" . $row['first_name'] . "</td>";
				echo "<td><input type='radio' name='follow'></td>";
				echo "<td><a class='underline' href='members_page_detail.php?firstname=$firstname&lastname=$lastname&email=$email&highschool=$highschool&graduationyear=$graduationyear&website=$website&description=$description&field=$field'>" . $row['first_name'] . "</a></td>";
				echo "<td>" . $row['last_name'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td><a class=\"underline\" href=\"school_members_page.php?highschool=$highschool\">" . $row['high_school'] . "</a></td>";
				echo "<td>" . $row['graduation_year'] . "</td>";
				echo "<td>" . $row['website'] . "</td>";
 				echo "<tr>";
			}
			echo "</table>";
		?>

	</div>
</div>

<?php include('includes/footer.php') ?>
<?php mysqli_close($connection);?>