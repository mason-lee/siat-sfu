<?php
	session_start();
	// $section = "profile";
	// include('includes/header.php');
	// if(!isset($_SESSION['is_login'])){
	//     header('Location: ./login_ask.php');
	// }
	// require_once("includes/db_connection.php");	
?>
		<?php
		

			if(isset($_SESSION['visitor_id'])) {
				$timeline_user = $_SESSION['visitor_id'];	
			}
			else {
				$timeline_user = $_SESSION['user_id'];		
			}

			$query_for_selecting_members = "SELECT DISTINCT visitors_visitor_id, members_user_id FROM visitor_to_member WHERE visitors_visitor_id = $timeline_user";
			$result = mysqli_query($connection, $query_for_selecting_members);

			echo "<ul class='profile-buttons'>";
						echo "<li>";
							echo "<h2 class='timeline-subtitle'>Members</h2>";
						echo "</li>";

						echo "<li class='add_people_button'>";
							echo "<a href='members_page.php'>All Members</a>";
						echo "</li>";
					echo "</ul>";

			while($row = mysqli_fetch_array($result)) {
				$followed_members = $row['members_user_id'];
				$query_member_profile = "SELECT * FROM members WHERE user_id = $followed_members";
				$result_of_followed_members = mysqli_query($connection, $query_member_profile);
				
				while($row_members = mysqli_fetch_array($result_of_followed_members)) {
					$id = $row_members["user_id"];
					$firstname = $row_members["first_name"];
					$lastname = $row_members["last_name"];
					$email = $row_members["email"];
					$highschool = $row_members["high_school"];
					$graduationyear = $row_members["graduation_year"];
					$description = $row_members["description"];
					$website = $row_members["website"];
					$flickr = $row['flickr_id'];
					$twitter = $row['twitter_id'];

					echo "
					<form method='post' action='unfollow.php'>
						<div class='blog-post'>
							<div class='blog-post-box'>
								<div class='checkbox-bg'>";
									// echo "<input class='profile-button' id='thing' type='checkbox' name='selected_member[]' value=$id>
									// <label for='thing'></label>";
							echo "
								</div>
							<div class='blog-post-box-wrapper'>
								<div class='blog-post-box-left'>
									<img src='img/profile.png'>
								</div>
								<div class='blog-post-box-right-profile'>
									<a href='members_page_detail.php?id=$id'>$firstname $lastname</a>
								</div>
							</div>

							<div class='profile-box-content'>
								<ul>
									<li class='profile-box-title'>Email</li>
									<li>$email</li>
									<li class='profile-box-title'>High school</li>
									<li>$highschool in $graduationyear</li>
									<li class='profile-box-title'>Description</li>
									<li>$description</li>		
								</ul>
							
							</div>
						</div>
					</div>
					";
				}
			}

				// echo "<input type='submit' class='button' name='submit_button' value='Unfollow'>";
				echo "</form>";
			
		?>
