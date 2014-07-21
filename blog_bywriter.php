<?php 
	$writer_selected = $_GET['author'];
	$writer_selected_changed = strtoupper($writer_selected);

	$title_name = "Mason | Blog";
	$section = "blog";
	include('includes/db_connection.php');
	include('includes/header.php');
?>

<div class="form-container">
	<div class="blog-wrapper">
		<div class="center-stuff">
			<h1>
				Blog posts by <?php echo $writer_selected; ?>
			</h1>
		</div>

<?php
	// echo "<h2>";
	// echo $value;
	// echo "</h2>";
	$result = mysqli_query($connection, "SELECT blog_post_title, blog_post_content, blog_post_writer, writer_school FROM blog_content ORDER BY blog_post_time DESC");

	$table = '';
	while($row = mysqli_fetch_array($result)) {
		$title = $row['blog_post_title'];
		$content = $row['blog_post_content'];
		$writer = $row['blog_post_writer'];
		$school = $row['writer_school'];

		$writer_changed_db = strtoupper($writer);

		if(strcmp($writer_selected_changed, $writer_changed_db) == 0)
		{
			$table .= "
				<ul>
					<li class='blog-title-inblog'>$title</li>
					<li class='blog-writer'>by $writer</li>
					<li class='blog-content'>$content</li>
				</ul>
			";
		}
	}

	echo $table;

?>

</div>
</div>

<?php include('includes/footer.php') ?>
<?php mysqli_close($connection);?>