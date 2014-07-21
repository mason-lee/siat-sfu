<?php 
	session_start();
	// require_once('includes/cache.php');
	$title_name = "Mason | Members";
	$section = "members_page";
	include('includes/header.php');
	require_once("includes/db_connection.php");
	if(!isset($_SESSION['is_login'])){
	    header('Location: ./login_ask.php');
	}

	// ini_set('display_errors', 1);
?>
<?php
	$members_twitter = $_GET['id'];
?>
<script type="text/javascript">


// alert(javaScriptVar);

// function displayTweet()
// {
// 	var javaScriptVar = "<?php echo $members_twitter; ?>";
	
// 	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
//     	xhr = new XMLHttpRequest();
// 	} else if (window.ActiveXObject) { // IE 8 and older
//     	xhr = new ActiveXObject("Microsoft.XMLHTTP");
// 	}
// 	xhr.onreadystatechange = display_data;
// 	xhr.open("GET", "twitter/codebird_example.php?id="+javaScriptVar+"", true);
// 	// xhr.open("GET", "twitter/codebird_example.php?id=9", true);
// 	xhr.send();

// 	function display_data() {	
// 	if (xhr.readyState == 4) {
// 		if (xhr.status == 200) {
// 			document.getElementById("update-tweet").innerHTML = xhr.responseText;
// 			console.log('success');
// 	    } else {
// 	        	console.log('There was a problem with the request.');
// 	    	}
// 		}
// 	}
	
// }

// function updateTweet() {
// 	setInterval(displayTweet, 10000);
// }

// window.onload = updateTweet;


</script>

<div class="timeline">
	<div class="timeline-top-wrapper">
		<div class="top_timeline_member">

<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM members WHERE user_id = '$id'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);

	$firstname = $row['first_name'];
	$lastname = $row['last_name'];
	$email = $row['email'];
	$highschool = $row['high_school'];
	$graduationyear = $row['graduation_year'];
	$website = $row['website'];
	$description = $row['description'];
	// $field = $_GET['field'];
	$flickr = $row['flickr_id'];
	$twitter = $row['twitter_id'];	



	echo '<div class="three">';
	echo '<div class="profile_pic_container">';
		echo '<img src="img/profile.png">';				
	echo '</div>';


	if(isset($_SESSION['visitor_id'])) {
		$visitor = $_SESSION['visitor_id'];	
	}
	
	/*
		Select members the logged in visitor is following
	*/
	// if(isset($visitor)) {
	// 	$result_followed = mysqli_query($connection, "SELECT DISTINCT members_user_id from visitor_to_member WHERE visitors_visitor_id = '$visitor'");	
	// }
	
	// while($row_follow = mysqli_fetch_array($result_followed)){
	// 	$member_followed = $row_follow['members_user_id'];

	// 	if($member_followed === $id) {
	// 		echo "<button class='btn followButton following follow-on-profile'>Follow</button>";	
	// 	}
	// 	else {
	// 		echo "<button class='btn followButton follow-on-profile'>Follow</button>";	
	// 	}
	// }

	echo '</div>';
	
	echo '<div class="nine">';
		echo "<ul class='member-info-box member-info eleven'>";
			echo "<li>";	
				echo "<a href='members_page_detail.php?id=$id&firstname=$firstname&lastname=$lastname&email=$email&highschool=$highschool&graduationyear=$graduationyear&website=$website&description=$description&flickr=$flickr&twitter=$twitter'>";
					echo "<h3>";
						echo $firstname;
						echo $lastname;
					echo "</h3>";
				echo "</a>";
			echo "</li>";
			echo "<li>
					<ul>
						<li>
							<span class='icon-study'></span>
						</li>
						<li>
							graduated from $highschool in ";
							echo $graduationyear;
						echo "</li>
					</ul>
				</li>";						
			echo "<li>
					<ul>
						<li>
							<span class='icon-display'></span>
						</li>
						<li>";
						echo $website;
						echo "
						</li>
					</ul>
				</li>";
			echo "<li>
					<ul>
						<li>
							<span class='icon-user'></span>
						</li>
						<li>";
							echo $description;
						echo "</li>
					</ul>
				</li>";
			echo "<li>
					<ul>
						<li>
							<span class='icon-flickr'></span>
						</li>
						<li>";
						echo $flickr;
					echo "</li>
					</ul>
					</li>";
			echo "<li>
					<ul>
						<li>
							<span class='icon-twitter'></span>
						</li>
						<li>";
							echo $twitter;
						echo "</li>
					</ul>
				</li>";
		echo "</ul>";

		
		if($_SESSION['id']===$id) {
			echo "<a class='edit_member one' href='edit_members.php'>EDIT</a>";
		}

	echo '</div>';
	//End nine (right of top_timeline)
	echo '</div>';
	//End top_timeline
echo '</div>';
//end top_timeline_wrapper
echo '<div class="bottom_timeline">';
	echo '<div class="three blog_post_member">';
		echo '<h2 class="timeline-subtitle">Twitter timeline</h2>';	
			include('twitter/codebird_example.php');	
		echo '<div id="update-tweet">

			</div>';	
	echo '</div>';
	//End three

	echo '<div class="nine twitter_flickr_member">';
		echo '<div class="six profile-column-left">';	
			echo '<ul class="member_detail_blog">';
			echo '<li>';
				echo '<h2 class="timeline-subtitle">Blog Post</h2>';
			echo '</li>';
			echo '<li>';
				echo '<a href="blog_post.php">';
				echo "View All";
				echo '</a>';
			echo '</li>';
		echo '</ul>';

		if(isset($_SESSION['is_login']) && !isset($_SESSION['visitor_is_login'])) {
			$member_logged_in = $_SESSION['id'];
			
			if(!mysqli_ping($connection)) {
				$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			}else {
				// echo "Sorry, there is a problem with our service. We are working on to fix this";
			}

			$result = mysqli_query($connection, "SELECT blog_post_title, blog_post_content FROM blog_content WHERE members_user_id='$member_logged_in'");
			
			if(mysqli_num_rows($result)>0) {
				while($row_blog = mysqli_fetch_array($result)) {
					$title = $row_blog['blog_post_title'];
					$body = $row_blog['blog_post_content'];

					echo "<div class='blog-post'>";
						echo "<div class='blog-titile'>";
							echo $title;
					    echo "</div>";
						
						echo "<div class='blog-content'>";
					  		echo $body;
					  	echo "</div>";
					echo "</div>";
				} 
			}
			else {
				echo "<h5>No blog post</h5>";
			}
		}//End "When member is logged in part"
		
		/*
			
			If visitor is logged in
			
	 	*/
		// var_dump($_SESSION);
		elseif(isset($_SESSION['visitor_is_login'])) {

			if(!mysqli_ping($connection)) {
				$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			} else {
				// echo "Sorry, there is a problem with our service. We are working on to fix this";
			}

			$member_s_id = $_GET['id'];
			$result_blog_of_visitor = mysqli_query($connection, "SELECT blog_post_title, blog_post_content FROM blog_content WHERE members_user_id='$member_s_id'");

			if(mysqli_num_rows($result_blog_of_visitor)>0) {
				while($row_blog_of_visitor = mysqli_fetch_array($result_blog_of_visitor)) {
					$title_blog = $row_blog_of_visitor['blog_post_title'];
					$body_blog = $row_blog_of_visitor['blog_post_content'];

					echo "<div class='blog-post'>";
						echo "<div class='blog-titile'>";
							echo $title_blog;
					    echo "</div>";
						
						echo "<div class='blog-content'>";
					  		echo $body_blog;
					  	echo "</div>";
					echo "</div>";
				}
			}
			else {
				echo "No blog post";
			}
		}
		echo '</div>';		

		echo '<div class="six profile-column-right">';
			echo '<h2 class="timeline-subtitle">Flickr photostream</h2>';	
			include('flickr/process_flickr.php');
		echo '</div>';
	echo "</div>";
	//End nine
	echo '</div>';
	//End bottom_timeline
// }
?>
</div><!--End timeline-->



<script type="text/javascript">
$(document).ready(function(){
	$('button.followButton').on('click', function(e){
    	e.preventDefault();
    	$button = $(this);
    	
    	// selected_id = $('.selected_id').text();
    	selected_id = this.id;
        console.log(selected_id);
    	
    	if($button.hasClass('following')){
        
        //Do Unfollow
        $.ajax({
        	type: "GET",
        	url: "unfollow.php",
        	data: {
        		'action': 'unfollow',
        		'userid': selected_id
        	},
        	success: function(){
        		$button.removeClass('following');
		        $button.removeClass('unfollow');
		        $button.text('Follow');
        	}
        }); 
        
        
    } else {

        $.ajax({
        	type: "GET",
        	url: "follow.php",
        	data: 
	        	{	
	        		'action': 'follow',
	        		'userid': selected_id
	        	},
        	success: function(){
        		$button.addClass('following');
        		$button.text('Following');
        	}
        });

        
    }
});

$('button.followButton').hover(function(){
     $button = $(this);
    if($button.hasClass('following')){
        $button.addClass('unfollow');
        $button.text('Unfollow');
    }
}, function(){
    if($button.hasClass('following')){
        $button.removeClass('unfollow');
        $button.text('Following');
    }
});

});
	
</script>

<?php 
	// var_dump($_GET);
	include('includes/footer.php'); 
	mysqli_close($connection);
?>

<?php 
	// require_once('includes/cache_footer.php'); 
?>


