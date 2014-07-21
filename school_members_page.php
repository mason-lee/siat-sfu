<?php 
	$highschool_selected = $_GET['highschool'];
	$highschool_selected_changed = strtoupper($highschool_selected);

	$title_name = "Mason | Members";
	$section = "members_page";
	include('includes/db_connection.php');
	include('includes/header.php');
?>

<?php echo"
	<div class='form-container'>
		<div class='container'>
			<div class='center-stuff'>
				<h2>
					Our members graduated from <span class='underline'>$highschool_selected</span>
				</h2> 
			</div>";
?>
	<?php
		$result = mysqli_query($connection, "SELECT * FROM members ORDER BY last_name");
	?>
	<?php 	
		$table = '
			<table>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>High School</th>
					<th>Graduation Year</th>
					<th>Website</th>
					<th>Description</th>
					<th>Field</th>
				</tr>';
		
		while($row = mysqli_fetch_array($result)) {
				$firstname = $row['first_name'];
				$lastname = $row['last_name'];
				$email = $row['email'];
				$highschool = $row['high_school'];
				$graduationyear = $row['graduation_year'];
				$website = $row['website'];
				$description = $row['description'];
				$field = $row['field'];

				$highschool_changed_db = strtoupper($highschool);

			if(strcmp($highschool_selected_changed, $highschool_changed_db) == 0) {
			$table .= "<tr>
						<td><a class=\"underline\" href=\"members_page_detail.php?firstname=$firstname&lastname=$lastname&email=$email&highschool=$highschool&graduationyear=$graduationyear&website=$website&description=$description&field=$field\">$firstname</a></td>
						<td>$lastname</td>
						<td>$email</td>
						<td>$highschool</td>
						<td>$graduationyear</td>
						<td>$website</td>
						<td>$description</td>
						<td>$field</td>
					</tr>";
			
			}	
		}
		$table .= '</table>
				</div> 
			</div>';
		echo $table;
	?>

<?php include('includes/footer.php') ?>
<?php mysqli_close($connection);?>












