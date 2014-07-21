<?php 
	$title_name = "Mason | Home";
	$section = "home";

	include('includes/new_header.php');
?>

	<div class="bg">
		<img src="img/solid.png">
	</div>
<div class="container">
	<div class="hello">
		<h1>
			Connecting <br> 
			Computing<span class="plus"><img src="img/plus.svg"></span>
			Media<span class="plus"><img src="img/plus.svg"></span>
			Design
		</h1>
		<h1 class="question">
			Is <span class="pink">design</span> your thing?
		</h1>
	</div>
	<div class="landing-action">
		<a class="landing-button">
			Get connected
		</a>
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

		$(".landing-button").click(function() {
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
<?php
 include('includes/footer.php') 
 ?>