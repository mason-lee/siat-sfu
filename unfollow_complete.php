<?php
	session_start();
	require_once("includes/db_connection.php");
	ini_set('display_errors', 1);
	include('includes/header.php');
?>
<div class="form-container">
	<div class="center-stuff">
		<h1>
			Unfollow succeeded!
		</h1>
		<a class="button" href="timeline.php">
			Return to profile page
		</a>
	</div>
</div>

<?php include('includes/footer.php') ?>

<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>


