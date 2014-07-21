<?php
	session_start();
	// $title_name = "Mason | Blog";
	// $section = "blog";
	// if(!isset($_SESSION['is_login'])){
	//     header('Location: ./login_ask.php');
	// }
	require_once("includes/db_connection.php");
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'> -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">

	<link rel="stylesheet" type="text/css" href="css/media_query.css">
    <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link rel="stylesheet" type="text/css" href="css/font/icomoon/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/search.js"></script>
	</head>
<body>
<div class="blog-nav">
	<div class="container">
	<div class="logo-new">
		<?php
			if(isset($_SESSION['visitor_id'])) {
				echo "<a href=\"timeline.php\"></a>";			
			}
			else {
				echo "<a href='members_page_detail.php?id=";
				echo $_SESSION['id'];
				echo "'></a>";			
			}
		?>
		
	</div>

	<div class="navigation-blog"> 
		

		<ul>
			<li>
				<div id="search-wrapper">
					<input type="text" id="search" autocomplete="off">
					<h4 id="results-text">Showing results for: <b id="search-string">Array</b></h4>
					<ul id="results"></ul>
				</div>
			</li>
			<li class="write-icon">
				<a class="icon-pen" href="blog.php">
				</a>
			</li>
			<li>
				<?php
					// echo '<a href="./loggin_out.php">Logout</a>';
				?>	
			</li>
		</ul>
	</div>
	</div>
</div>

<?php
	// ini_set('display_errors', 1);
?>
<div class="wrapper-blog">
	<div class="blog-wrapper">
		<h1>
			blog by siat members
		</h1>
		<div class="blog-header">
			
			<!-- <div class="write-icon">
				<a class="icon-pen"  href="blog.php">
			</div> -->
		</div>
		<div class="blogging-wrapping">
		<?php
			$result = mysqli_query($connection, "SELECT blog_post_title, blog_post_content, blog_post_writer, writer_school FROM blog_content ORDER BY blog_post_time DESC");
		?>
		<?php
			$table = '';
		
		while($row = mysqli_fetch_array($result)) {
				$title = $row['blog_post_title'];
				$author = $row['blog_post_writer'];
				$content = $row['blog_post_content'];
				$school = $row['writer_school'];

			$table .= "<ul>
						<li class='blog-title-inblog'><a href=\"blog_content.php?title=$title&author=$author&content=$content&school=$school\">$title</a></li>
						<li class='blog-writer'><a href='blog_bywriter.php?title=$title&author=$author&content=$content&school=$school'>by $author</a></li>
						<li class='blog-writer'><a href='blog_byschool.php?title=$title&author=$author&content=$content&school=$school'>graduated from $school</a></li>
						<li class='blog-content'>$content</li>
					</ul>";
		}
		$table .= '';
		echo $table;
		?>
		</div>
	</div>
</div>

<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>

<?php include('includes/footer.php') ?>