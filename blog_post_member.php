<?php
	include('includes/db_connection.php');
	// $blogger = $_GET['id'];
	// $query_blog = "SELECT * FROM blog_content WHERE memebers_user_id = '{$id}'";
	
	if(isset($id)){
		$result = mysqli_query($connection, "SELECT blog_post_title, blog_post_content, blog_post_writer, writer_school FROM blog_content WHERE memebers_user_id = '$id'");	
	}
	else {
		echo "I am not getting the id yet.";
	}
	
	while($row_blog = mysqli_fetch_array($result)) {
		$title = $row_blog['blog_post_title'];
		$body = $row_blog['blog_post_content'];

		echo "<div>";
			echo "<div>";
				echo $title;
		    echo "</div>";
			
			echo "<div>";
		  		echo $body;
		  	echo "</div>";
		echo "</div>";
	}
?>

<?php
	mysqli_close($connection);
?>