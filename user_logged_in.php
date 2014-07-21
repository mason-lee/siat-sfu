<?php
	session_start();
	
	if(!isset($_SESSION['is_login'])){
	    header('Location: ./login.php');
	}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title_name; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
	<div class="logo">
		<a href="index.php"></a>	
	</div>
	<div class="navigation">
		<nav>
			<!-- <a class="<?php if ($section == "home") {echo "on"; } ?>" href="index.php">
				<h3>Home</h3>
			</a> -->
			<a class="<?php if ($section == "home") {echo "on"; } ?>" href="index.php">
				<h3>About</h3>
			</a>
			<a class="<?php if($section == "members") {echo "on"; } ?>" href="members.php">
				<h3>Event</h3>
			</a>
			<a class="<?php if($section == "members_page") {echo "on"; } ?>" href="members_page.php">
				<h3>People</h3>
			</a>
			<a class="<?php if($section == "members") {echo "on"; } ?>" href="blog.php">
				<h3>Blog</h3>
			</a>			
		</nav>
		<nav class="action">
				<a href="./edit_account.php">Edit</a>
				Welcome <?php echo $_SESSION['nickname'];?>
        		<a href="./loggin_out.php">Logout</a>  
			<!-- <a href="signup_ask.php" class="<?php if ($section == "register") {echo "on"; } ?>">
				<h3>Sign up</h3>
			</a> -->
		</nav>
	</div>
</header>

<div class="wrapper">
<div class="container">
	<div class="bg">
		<h1>
			SIAT’s recruitment outreach website
		</h1>
	</div>

	<div class="hello">
		<h2>
			Our mission
		</h2>
		<h3>
			SIAT program is only 10 years old. An essence of SIAT program, a unique combination of computing media and design, and its potential for graduates, is not well understood between high school students and their parents. SIAT wants to provide better information to potential students and their parents.
		</h3>
		<div class="button-padding">
			<h2>
				Be an ambassador for SIAT program!
			</h2>
			<a class="button" href="signup.php"> 
				Register
			</a>
		</div>
	</div>
</div>

<?php include('includes/footer.php') ?>
<!-- <html>
    <body>
        Welcome <?php echo $_SESSION['nickname'];?><br />
        <a href="./loggin_out.php">Logout</a>    
    </body>
</html> -->