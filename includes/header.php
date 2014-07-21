<?php
	/*
		Setting cookies must be before any HTML output
		unless output buffering is turned on.
	*/
	// $name = "SIAT_Alumni";
	// $value = 45;
	// $expire = time() + (60*60*24*7);
	// setcookie($name, $value, $expire);
	
	/*
		Setting Cookies
	*/
	// require_once("includes/session.php");
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}

	include('includes/db_connection.php');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title_name; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Simon Fraser University (SFU) School of Interactive Art and Technology (SIAT) Connecting with Alumni and current students" />
    <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'> -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/media_query.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/font/icomoon/style.css">
    <script src="js/jquery.js"></script>
    <!-- <link rel="stylesheet" href="http://i.icomoon.io/public/temp/896518d48d/UntitledProject1/style.css"> -->
	</head>
<body>

<header>
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
		<div class="navigation">
			<ul>
				<li>
					<?php
						if(!isset($_SESSION['visitor_is_login'])) {
							echo "<a href='members_page.php'>Members</a>";
						}
					?>
				</li>
				<li>
					<!-- <a href="blog_post.php" class="<?php if($section == "blog") {echo "on"; } ?>"> -->
					<a href="blog_post.php">
						Blog
					</a>
				</li>
				<li>
					<?php
						echo '<a href="./loggin_out.php">Logout</a>';
					?>	
				</li>
			</ul>
		</div>
	</div>	
	
</header>
<?php
	// ini_set('display_errors', 1);
?>
<div class="wrapper">
















