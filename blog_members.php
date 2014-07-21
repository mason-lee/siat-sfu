<?php 
	session_start();
	require_once("includes/db_connection.php");
	$title_name = "Mason | Blog";
	$section = "blog";
	include('includes/header.php'); 
?>

<div class="form-container">
	<div class="container">
		<?php
			$id = $_GET['id'];
			$firstname = $_GET['firstname'];
			$lastname = $_GET['lastname'];
			// $email = $_GET['email'];
			// $highschool = $_GET['highschool'];
			// $graduationyear = $_GET['graduationyear'];
			// $website = $_GET['website'];
			// $description = $_GET['description'];
		?>
		<?php
			echo "<h1>Written by <span class='underline'>$firstname $lastname</span></h1>";
		?>
		
		<?php
			$query ="SELECT blog_post_title, blog_post_content, blog_post_writer, members_user_id 
					FROM blog_content 
					WHERE members_user_id ='{$id}'";
		
			$result = mysqli_query($connection, $query);

			// print_r($result);
		?>
		<?php

			while($row = mysqli_fetch_array($result)) {
				$title = $row["blog_post_title"];
				$writer = $row["blog_post_writer"];
				$content = $row["blog_post_content"];

				echo "<ul class='blog-post'>";
					echo "<li class='blog-title'>$title</li>";
					echo "<li class='blog-writer'>by $writer</li>";
					echo "<li class='blog-content'>$content</li>";
				echo "</ul>";
			}
		// 	while($row = mysqli_fetch_array($result)) {
		// 		$writer = $row['blog_post_writer'];
		// 		$title = $row['blog_post_title'];
		// 		$content = $row['blog_post_content'];
		// 		// $id_writer = $row['members_user_id'];
		// 		// echo $writer;
		// 		// echo $title;
		// 		// echo $content;
		// 		// echo $id_writer;
		// 	// foreach($id_writer as $value) {
		// 	echo "<table border='1'>
		// 		<tr>
		// 		<th>Writer</th>
		// 		<th>Title</th>
		// 		<th>Content</th>
		// 		</tr>";
				
		// 		echo "<tr>";
		// 			echo "<td>$writer</td>";
		// 			echo "<td>$title</td>";
		// 			echo "<td>$content</td>";
		// 		echo "</tr>";
		// 		// }
		// 	}
		// echo "</table>";
		// }	
	?>

	</div>
</div>
<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>


<?php include('includes/footer.php') ?>