<?php 
	$school = $_GET['school'];
	$school_changed = strtoupper($school);

	$title_name = "Mason | Members";
	$section = "members";

	include('includes/header.php');
?>
<?php echo"
	<div class='form-container'>
		<div class='container'>
			<div class='center-stuff'>
				<h2>
					Our members graduated from
				</h2><br> 
				<h2 class='underline'>$school_changed</h2>
			</div>";
?>
	<?php 	
		$logFile = 'form.txt';
		$lines = file($logFile); // Get each line of the file and store it as an array
		$table = '<table><tr><th>Name</th><th>Email</th><th>Secondary School</th></tr>'; // A variable $table, we'll use this to store our table and output it later !
		
		foreach($lines as $line){ // We are going to loop through each line
		    // list($lastname, $firstname, $email, $school) = explode(',', $line);
		    $data = explode('|', $line);
			$fullname = $data[0];
			$username = $data[1];
			$email = $data[3];
			$highschool = $data[4];
			$highschool_changed = strtoupper($highschool);

			// $test = trim($school_changed, $highschool_changed);
			// $highschool_trimmed = trim($highschool);
			if(strcmp($school_changed,$highschool_changed) == -1) {
			// $table .= "<tr>
			// 			<td><a href=\"member_detail.php?fullname=$fullname&username=$username&email=$email&school=$highschool\">$fullname</a></td>
			// 			<td>$email</td>
			// 			<td>$highschool</td>

			// 			<td>school = $school<br /> highschool = $highschool <br/>
			// 			test3 = $test
			// 			</td>
			// 		</tr>";
			$table .= "<tr>
						<td><a class=\"underline\" href=\"member_detail.php?fullname=$fullname&username=$username&email=$email&school=$highschool\">$fullname</a></td>
						<td>$email</td>
						<td>$highschool</td>
					</tr>";
			
			}
			//$table .= '<tr><td><a href="member_detail.php?fullname=testing">'.$fullname.'</a></td><td>'.$email.'</td><td>'.$school.'</td></tr>';
			// $table .= '<tr><td><a href="#">'.$data[0].'</a></td><td>'.$data[3].'</td><td>'.$data[4].'</td></tr>';
		}// end for
		$table .= '</table>
				</div> 
			</div>';
		echo $table;
		
	?>

<?php include('includes/footer.php') ?>












