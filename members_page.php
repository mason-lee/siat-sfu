<?php 
	session_start();
	$title_name = "Members";
	$section = "members_page";
	include('includes/header.php'); 

	include('includes/db_connection.php');
	if(!isset($_SESSION['is_login'])){
	    header('Location: ./login_ask.php');
	}
	// ini_set('display_errors', 1);
?>

<div class="timeline">
	<div class="top_timeline">
		<?php

			$result = mysqli_query($connection, "SELECT * FROM members ORDER BY first_name");
			
			while($row = mysqli_fetch_array($result)) {
				$id = $row['user_id'];
				$firstname = $row['first_name'];
				$lastname = $row['last_name'];
				$email = $row['email'];
				$highschool = $row['high_school'];
				$graduationyear = $row['graduation_year'];
				$website = $row['website'];
				$description = $row['description'];
				$flickr = $row['flickr_id'];
				$twitter = $row['twitter_id'];
				
					echo "<div class='find-profile'>";
						echo "<div class='find-profile-left'>";
							echo "<img src='img/profile.png'>";
						echo "</div>";
								
						echo "<div class='profile-summary'>";
							echo "<ul class='member-info'>";	
								echo "<li>";	
									echo "<a href='members_page_detail.php?id=$id'>";
										echo "<h3>$firstname $lastname</h3>";
									echo "</a>";
								echo "</li>";
								echo "<li>
										<ul>
											<li>
												<span class='icon-study'></span>
											</li>
											<li>
												graduated from $highschool in $graduationyear
											</li>
										</ul>
									</li>";						
								echo "<li>
										<ul>
											<li>
												<span class='icon-display'></span>
											</li>
											<li>
												$website
											</li>
										</ul>
									</li>";
								echo "<li>
										<ul>
											<li>
												<span class='icon-user'></span>
											</li>
											<li>
												$description
											</li>
										</ul>
									</li>";
								echo "<li>
										<ul>
											<li>
												<span class='icon-flickr'></span>
											</li>
											<li>$flickr</li>
										</ul>
										</li>";
								echo "<li>
										<ul>
											<li>
												<span class='icon-twitter'></span>
											</li>
											<li>
												$twitter
											</li>
										</ul>
									</li>";
							echo "</ul>";
						echo "</div>";

						echo "<div class='profile-follow'>";

						if(isset($_SESSION['visitor_id'])) {
						
							$logged_in_visitor = $_SESSION['visitor_id'];
							$result_followed = mysqli_query($connection, "SELECT DISTINCT * FROM visitor_to_member WHERE visitors_visitor_id = '$logged_in_visitor'");
							
							if(isset($logged_in_visitor)) {
								$added_button = false;


								if(mysqli_num_rows($result_followed)>0) {//If you follow anyone
									while($row_follow = mysqli_fetch_array($result_followed)) {
										$f_member_id = array();
										$f_member_id[] = $row_follow['members_user_id'];
										
										foreach ($f_member_id as $value) {
											if($id==$value && $added_button===false) {
												echo "<button class='btn followButton following' rel='6' id='{$id}'>Follow</button>";	
												$added_button = true;
											}									
										}
									}
								}


								/*
									For visitors who are not following anyone.
								*/
								if($added_button===false) {	
									echo "<button class='btn followButton' rel='6' id='{$id}'>Follow</button>";
								}
								
								// if(!isset($_SESSION['visitor_is_login'])) {
								// 	echo " ";
								// }
							}
						}

						else {
							echo " ";
						}
						
						
 						
						/*
							So, if the logged in visitor is following any member.
						*/
						
						// if(mysqli_num_rows($result_followed)>0) {
						// 	$following_members = array();
						// 	$row_follow = mysqli_fetch_array($result_followed);
						// 	$following_members[] = $row_follow['members_user_id'];
						// 	// print_r($following_members);
						// 	// while($row_follow = mysqli_fetch_array($result_followed)){
						// 	// 	$following_members[] = $row_follow['members_user_id'];

						// 	// }
						// 	// foreach ($following_members as $value) {
						// 	// 	if($id===$value) {
						// 	// 		echo "<button class='btn followButton following' rel='6' id='{$id}'>Follow</button>";				
						// 	// 	}
						// 	// }

						// 	echo "<button class='btn followButton' rel='6' id='{$id}'>Follow</button>";		
						// }
						/*
							When the visitor is not following anyone
						*/
						// else {
						// 	echo "<button class='btn followButton' rel='6' id='{$id}'>Follow</button>";	
						// }
						echo "</div>";
					echo "</div>";
				}
			?>
	</div>
</div>

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

<?php include('includes/footer.php') ?>
<?php mysqli_close($connection);?>