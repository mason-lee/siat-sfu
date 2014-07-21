<?php 
	$title_name = "Mason | Blog";
	$section = "blog";
	include('includes/header.php'); 
?>

<div class="form-container">
	<div class="blog-wrapper">
		<?php
			$title = $_GET['title'];
			$author = $_GET['author'];
			$content = $_GET['content'];
			$school = $_GET['school'];
		?>
		<?php
			echo "<div class='blogging-wrapping'>
					<ul>
						<li class='blog-title-inblog'>$title</li>
						<li class='blog-writer'>by $author</li>
						<li class='blog-writer'>graduated from $school</li> 
						<li class='blog-content'>$content</li>
					</ul>
					</div>
				";
		?>
		<a href="https://twitter.com/share" class="twitter-share-button" data-text="Check out this blog post! (The link will be page URL once this website is up on-line.)" data-hashtags="siat">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
</div>
