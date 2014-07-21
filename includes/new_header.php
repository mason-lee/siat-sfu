<?php
	session_start();
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
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/media_query.css">

    <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/font/icomoon/style.css">
    <script src="js/jquery.js"></script>
</head>

<div class="main-nav-wrapper">
	<div class="container">
		<div class="logo">
			<a href="index.php">
				<img src="img/logo.svg">
			</a>
		</div>
		<div class="new_nav">
			<ul>
				<li>
					<a href="login_ask.php">Log In</a>
				</li>
				<li>
					<a class='signup-overlay'>Sign Up</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="box-overlay">
	<div class="overlay-ask">
		<h3>
			Are you related to SIAT?
			Do you have your @sfu.ca email?
		</h3>
		<div class="b1-wrapper">
			<a class="b1" href="signup.php">
				Yes
			</a>
			<a class="b1" href="signup_visitor.php">
				No
			</a>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(".box-overlay").css({
			display: "none"
		});

		$(".signup-overlay").click(function() {
		    // var position = $(".container").offset();
		    $(".box-overlay").css({ 
		    	display: "block"
		    });
		});

		$(".box-overlay").click(function() {
			$(".box-overlay").css({
				display: "none"
			});
		});
});
</script>
<div class="wrapper">