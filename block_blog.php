<?php
	session_start();
	$title_name = "Mason | Blog";
	$section = "blog";
	if(!isset($_SESSION['is_login'])){
	    header('Location: ./login_ask.php');
	}
	require_once("includes/header.php");
?>

<div class="blog-container">
	
	<div class="center-stuff">
		<h3>
			Sorry, you don't have access to post a blog.
		</h3>
		<div class="blog-container">
			<a class="orange-button" href="blog_post.php">
				Go back to blog
			</a>
		</div>
		
	</div>
</div>
	
<?php include('includes/footer.php') ?>