<?php 
	session_start();
	$title_name = "Mason | Blog";
	$section = "blog";
	if(!isset($_SESSION['is_login'])){
	    header('Location: ./login.php');
	}
	
	if(isset($_SESSION['visitor_is_login'])) {
		header('Location: ./block_blog.php');
	}
?>
<?php
	// include('includes/functions.php');
	// confirm_logged_in();
?>
<?php
	include('includes/header.php'); 
	ini_set('display_errors', 1); 
?>

<div class="blog-container">
	<form method="POST" action="blog_processing.php">
		<div class="blog-wrapper center-stuff">
			<h3>
				Share your story with others.
			</h3>
			<div class="blog-body">
				<!-- <input name="id" style="disply:none;" value="<?php echo $_SESSION['id'];?>"> -->	
				<div class="form-row-body">
					<input class="blog-input" style="display:none;" name="writer" value="<?php echo $_SESSION['id'];?>">
					<input class="blog-input" style="display:none;" name="writer_school" value="<?php echo $_SESSION['writer_school']?>">
				</div>
				<div class="form-row-body">
					<input class="blog-input" style="display:none;" name="writername" value="<?php echo $_SESSION['nickname'];?>">
				</div>
				<div class="form-row-body">
					<input class="blog-input" type="text" name="blogtitle" size="50" placeholder="Title">
				</div>
				<div class="form-row-body">
					<textarea class="blogcontent" placeholder="Write your story" name="blogcontent"></textarea>
				</div>
				<input class="orange-button" autocomplete="off" type="submit" name="submit_button" value="upload">
			</div>
		</div>
	</form>
</div>