<?php
	session_start();
	$title_name = "Timeline";
	$section = "timeline";
	include('includes/header.php');
	// ini_set('display_errors', 1);

	if(!isset($_SESSION['is_login'])){
	    header('Location: ./login_ask.php');
	}
	require_once("includes/db_connection.php");
?>
<?php
	$visitor_highschool = $_SESSION['visitor_highschool'];
	$visitor_email = $_SESSION['visitor_highschool'];
	$visitor_lastname = $_SESSION['visitor_lastname'];
    $visitor_email = $_SESSION['visitor_email'];
    $visitor_graduationyear = $_SESSION['visitor_graduationyear'];
    $visitor_description = $_SESSION['visitor_description'];
?>

<div class="timeline">
	<div class="timeline-top-wrapper">
		<div class="top_timeline">
			<div class="three">
				<div class="profile_pic_container">
					<img src="img/profile.png">
				</div>
			</div>
			<div class="nine">
				<h1>
					<?php echo $_SESSION["nickname"];?>'s Timeline
				</h1>
				<ul class="member-info-box member-info">
					<?php
						echo "<ul>
								<li>
									<span class='icon-location'></span>
								</li>
								<li>going to ";
									echo $visitor_highschool;
									echo ", expect to graduate in ";
									echo $visitor_graduationyear;
								echo "</li>";
								echo "</ul>";						
						// echo "<li><i class='icon-display'></i>";
						// echo $website;
						// echo "</li>";
						echo "<ul>
								<li>
									<span class='icon-user'></span>
								<li>";
							echo "<li>";
								echo $visitor_description;
							echo "</li>";
						echo "</ul>";
					?>
				</ul>

				<?php 
					echo '<a class="edit-button" href="./edit_account.php?subject=';
					echo $_SESSION["visitor_id"];
					echo '">Edit</a>';
				?>
			</div>
		</div>
	</div>

	<div class="bottom_timeline">
		<div class="three">
			<ul>
				<li>
					<h2 class="timeline-subtitle">Suggesting People</h2>
				</li>
			</ul>


			<?php

			// // var_dump($_SESSION);
			// $logged_in_visitor = $_SESSION['visitor_id'];
			// $query_people = "SELECT DISTINCT visitors_visitor_id, members_user_id FROM visitor_to_member WHERE visitors_visitor_id = '$logged_in_visitor'";
			// // print_r($query_people);
			// $result_people = mysqli_query($connection, $query_people);
			// while($row_people = mysqli_fetch_array($result_people)) {
			// 	$members_followed = $row_people['members_user_id'];
				
			// 	$query_select_school = "SELECT high_school FROM members WHERE user_id = '$members_followed'";
			// 	$result_select_school = mysqli_query($connection, $query_select_school);

			// 	while($row_select_school = mysqli_fetch_array($result_select_school)) {

			// 		$school_members = $row_select_school[0];

			// 		$query_same_school = "SELECT * FROM members WHERE high_school = '$school_members'";
			// 		$result_same_school = mysqli_query($connection, $query_same_school);

			// 		while($row_same_school = mysqli_fetch_array($result_same_school)) {
			// 			$firstname = $row_same_school["first_name"];
			// 			$lastname = $row_same_school["last_name"];

			// 			echo "<div class='blog-post-box suggest-box'>
			// 					<div class='blog-post-box-left'>
			// 						<img src='img/profile.png'>
			// 					</div>
			// 					<div class='blog-post-box-right'>
			// 						$firstname $lastname
			// 					</div>
			// 				</div>";
			// 		}


			// 	}


				
			// }



			// var_dump($_SESSION);
                $logged_in_visitor = $_SESSION['visitor_id'];
                $query_people = "SELECT DISTINCT visitors_visitor_id, members_user_id FROM visitor_to_member WHERE visitors_visitor_id = '$logged_in_visitor'";
                // print_r($query_people);
                $result_people = mysqli_query($connection, $query_people);
                //print_r($result_people[0]);
                // First, I will get all ids, and then create a slightly different query
                $ids = array();
                while($row_people = mysqli_fetch_array($result_people)) {
                    array_push($ids, $row_people['members_user_id']);
                }

                // print_r($ids);

                $nids = join(',',$ids); // you have to create a list of ids, like 5, 6, 18, so I had to use join
      

                $query_select_school = "SELECT high_school FROM members WHERE user_id IN ('$nids')";
                // print_r($query_select_school);
                
                $result_select_school = mysqli_query($connection, $query_select_school);

                while($row_select_school = mysqli_fetch_array($result_select_school)) {
                        $school_members = $row_select_school[0];

                        $query_same_school = "SELECT * FROM members WHERE high_school = '$school_members'";
                        $result_same_school = mysqli_query($connection, $query_same_school);

                        while($row_same_school = mysqli_fetch_array($result_same_school)) {
                                $firstname = $row_same_school["first_name"];
                                $lastname = $row_same_school["last_name"];

                                echo "<div class='blog-post-box suggest-box'>
                                        <div class='blog-post-box-left'>
                                                <img src='img/profile.png'>
                                        </div>
                                        <div class='blog-post-box-right'>
                                                $firstname $lastname
                                        </div>
                                	</div>";
                     		   }
                			}

			?>
		</div>
		<div class="nine">
			<div class="six profile-column-left">			
				<ul>
					<li>
						<h2 class="timeline-subtitle">Blog Post</h2>
					</li>	
					<li class="blog-all">
						<a href="blog_post.php">View All</a>
					</li>
				</ul>
				

				<?php
					if(isset($_SESSION['visitor_id'])) {
					$timeline_user = $_SESSION['visitor_id'];	
				}
				else {
					$timeline_user = $_SESSION['user_id'];		
				}

				/*
					filter out which members this user is following.
				*/	

				$query_for_selecting_members = "SELECT DISTINCT visitors_visitor_id, members_user_id FROM visitor_to_member WHERE visitors_visitor_id = $timeline_user";
				$result = mysqli_query($connection, $query_for_selecting_members);

				while($row = mysqli_fetch_array($result)) {
					$followed_members = $row['members_user_id'];
					
					$query_blog = "SELECT * FROM blog_content WHERE members_user_id = $followed_members";
					$result_blog = mysqli_query($connection, $query_blog);
					
					while($row_blog = mysqli_fetch_array($result_blog)) {
						$blog_title = $row_blog["blog_post_title"];
						$blog_writer = $row_blog["blog_post_writer"];
						$blog_content = $row_blog["blog_post_content"];
						$blog_school = $row_blog["writer_school"];
						
						echo "
							<div class='blog-post'>
								<div class='blog-post-box'>
									<div class='blog-post-box-left'>
										<img src='img/profile.png'>
									</div>
									<div class='blog-post-box-right'>
										<div class='blog-writer'><a href='blog_bywriter.php?title=$blog_title&author=$blog_writer&content=$blog_content&school=$blog_school'>$blog_writer</a></div>
										<div class='blog-school'>From $blog_school</div>
									</div>
								</div>
								
								<div class='blog-title'><a href=\"blog_content.php?title=$blog_title&author=$blog_writer&content=$blog_content&school=$blog_school\">$blog_title</a></div>
								<div class='blog-content'>$blog_content</div>";
						echo "<div class='share-box'>";
							echo "<ul>";
								echo "<li id='twit-share-button'>";
									echo '<a href="https://twitter.com/share" class="twitter-share-button" data-text="Check out this blog post! (The link will be page URL once this website is up on-line.)" data-hashtags="siat">Tweet</a>';
							// Facebook
							// Share button here.
								echo "</li>";
							echo "</ul>";
						echo "</div>";
						echo '</div>';
					}
				}
				?>	

			</div>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			<div class="six profile-column-right">
				<?php include("profile.php");?>
			</div>
		</div>
	</div>
</div>

<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>
<?php include('includes/footer.php') ?>

