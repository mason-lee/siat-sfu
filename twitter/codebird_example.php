<script src="./js/jquery.js"></script>

<?php
	
	// session_start();
	// require_once('includes/db_connection.php');
	

	// 1. create database connection
	$dbhost = "localhost";
	$dbuser = "mideuml";
	$dbpass = "mideuml";
	$dbname = "mideuml";

	// create new connection
  	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	/*
		Test if connection succeeded.
		If connection failed, skip the rest of PHP code, and print an error
	*/
	if(mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() . 
			" (" . mysqli_connect_errno() . ")"
	);	
	}

	// Require codebird
	require_once('codebird-php-master/src/codebird.php');
	// Require authentication parameters
	require_once('twitter_config.php');

	// $query_get = $_SERVER['PHP_SELF'];
	// $path = pathinfo($query_get);
	// $what_you_want = $path['basename'];
	
	// echo $what_you_want;

	// echo "<Br>";
	if(isset($_GET["id"])) {
		$id_for_twitter = $_GET["id"];	
	}
	else {
		echo "Your followers do not have twitter account.";
	}
	
	/*
		Get the user id !!!! FROM members_page_detail.php
	*/
	$query = "SELECT user_id, twitter_id FROM members WHERE user_id = '{$id_for_twitter}'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);
	$twitter_id = $row["twitter_id"];

	// Set connection parameters and instantiate Codebird	
	\Codebird\Codebird::setConsumerKey($consumer_key, $consumer_secret);
	$cb = \Codebird\Codebird::getInstance();
	$cb->setToken($access_token, $access_token_secret);
	
	$reply = $cb->oauth2_token();
	$bearer_token = $reply->access_token;
	
	// App authentication
	\Codebird\Codebird::setBearerToken($bearer_token);
		
	// Create query
	$params = array(
		'screen_name' => $twitter_id,
		// 'screen_name' => 'maizur_',	
		'count' => 10
	);	
		
	$num_tweets = $params['count'];
	// Make the REST call
	// $cb->setReturnFormat(CODEBIRD_RETURNFORMAT_JSON);
	$reply = $cb->statuses_userTimeline($params);
	$res = (array) $reply;

	// Convert results to an associative array
	/*
		JSON string to PHP array
	*/
	$data = json_decode(json_encode($res), true);	
	// file_put_contents(json_encode($res), 'twitter.json');
	// Optionally, store results in a file
	file_put_contents("single_mu.json", json_encode($res));

	$xml = new DOMDocument('1.0', 'utf-8'); // or whatever charset
	
	$xml->preserveWhiteSpace = true;
	$xml->formatOutput = true;


	echo "<div id='tweets_wrapper'>";

	for($i=0; $i<$num_tweets; $i++) {
		$text = $data[$i]['text'];
		$time = $data[$i]['created_at'];
		// print_r($time);
		$user_id = $data[$i]['user']['id'];
		$user_screenname = $data[$i]['user']['screen_name'];
		$user_location = $data[$i]['user']['location'];
		$user_description = $data[$i]['user']['description'];
		$user_url = $data[$i]['user']['url'];
		$user_followers_count = $data[$i]['user']['followers_count'];
		$user_friends_count = $data[$i]['user']['friends_count'];
		$user_listed_count = $data[$i]['user']['listed_count'];
		$user_profile_image_url = $data[$i]['user']['profile_image_url'];
		$user_profile_background_color = $data[$i]['user']['profile_background_color'];
		if(isset($data[$i]['entities']['media']['0']['media_url'])) {
			$user_entities_media = $data[$i]['entities']['media']['0']['media_url'];	
			// print_r($user_entities_media);
		}
		
		else {
			// $user_entities_media = "No media";
		}

										
		$tweets = $xml->createElement("tweets");
		$tweet = $xml->createElement("tweet");

		$tweet_id = $xml->createElement("id", $user_id);
		$tweet_text = $xml->createElement("text", $text);
		$tweet_time = $xml->createElement("time", $time);
		$tweet_screenname = $xml->createElement("screenName", $user_screenname);
		$tweet_location = $xml->createElement("location", $user_location);
		$tweet_description = $xml->createElement("description", $user_description);
		$tweet_url = $xml->createElement("url", $user_url);
		$tweet_followers_count = $xml->createElement("followerCount", $user_followers_count);
		$tweet_friends_count = $xml->createElement("friendsCount", $user_friends_count);
		$tweet_listed_count = $xml->createElement("listedCount", $user_listed_count);
		$tweet_profile_image_url = $xml->createElement("profilImage", $user_profile_image_url);
		$tweet_profile_background_color = $xml->createElement("profileColor", $user_profile_background_color);
		$tweet_entities_media = $xml->createElement("media", $user_entities_media);
			

		// Append the whole bunch.
		$tweet->appendChild($tweet_id);
		$tweet->appendChild($tweet_text);
		$tweet->appendChild($tweet_time);
		$tweet->appendChild($tweet_screenname);
		$tweet->appendChild($tweet_location);
		$tweet->appendChild($tweet_description);
		$tweet->appendChild($tweet_url);
		$tweet->appendChild($tweet_followers_count);
		$tweet->appendChild($tweet_friends_count);
		$tweet->appendChild($tweet_listed_count);
		$tweet->appendChild($tweet_profile_image_url);
		$tweet->appendChild($tweet_profile_background_color);
		$tweet->appendChild($tweet_entities_media);

		$tweets->appendChild($tweet);
		$xml->appendChild($tweets);
	


		// echo $xml->saveHTML();
		// $xml->save('twitter.xml');
		

		if(count($xml)>0) {
			
				$new_tweet_id = $tweet_id->textContent;
				
				$new_tweet_screenname = $tweet_screenname->textContent;
				$new_tweet_location = $tweet_location->textContent;
				$new_tweet_description = $tweet_description->textContent;
				$new_tweet_url = $tweet_url->textContent;
				$new_tweet_followers_count = $tweet_followers_count->textContent;
				$new_tweet_friends_count = $tweet_friends_count->textContent;
				$new_tweet_listed_count = $tweet_listed_count->textContent;
				$new_tweet_profile_image_url = $tweet_profile_image_url->textContent;
				$new_tweet_profile_background_color = $tweet_profile_background_color->textContent;

				$new_tweet_text[$i] = $tweet_text->textContent;
				$new_tweet_time[$i] = $tweet_time->textContent;

				$new_tweet_entities_media[$i] = $tweet_entities_media->textContent;


					echo "<div class='tweet'>";
							echo '<p class="blog-post">';
								$tweet_link[$i] = $new_tweet_text[$i];
								$new_tweet[$i] = $tweet_link[$i];

								$pattern = "/http:\/\/t.co\/.[^ ]*/";
								if(preg_match($pattern, $tweet_link[$i], $matches)) {
									$link[$i] = $matches[0];
									$live_link[$i] = '<a href='.$link[$i].'>' .$link[$i]. '</a>';
									$new_tweet[$i] = str_replace($link[$i], $live_link[$i], $tweet_link[$i]);
								}
								echo $new_tweet[$i];
								echo "<br>";
							


								if(isset($data[$i]['entities']['media']['0']['media_url'])){
									// echo "<br>";
									// print_r($new_tweet_entities_media[$i]);
									// echo "<br>";
									echo "<img src=\"".$new_tweet_entities_media[$i]."\" width=\"250\"/>"; //getting the profile image
								}
								else {
									echo " ";
								}

								echo $new_tweet_time[$i];
							echo '</p>';
					echo "</div>";	
				}

				else {
					echo "There is no tweet for any of your followers.";
				}
			}

			echo "</div>";

			echo "<div class='twit-profile-box'>";	
				echo "<div class='tweet-profile-top'>";
				echo "<div class='twit-image'>";
					echo "<img src=\"".$new_tweet_profile_image_url."\"/>"; //getting the profile image
				echo "</div>";	
					echo "<ul class='twit-intro'>";
						echo "<li>";
							echo $new_tweet_screenname."<br/>"; //getting the username
						echo "</li>";
						echo "<li>";
							echo "<a href='";
								echo $new_tweet_url; //getting the web site address
							echo "'>Website</a>";
						echo "</li>";
						echo "<li>";
							echo "Location: ".$new_tweet_location."<br/>"; //user location
						echo "</li>";
					echo "</ul>";
				echo "</div>";
				
					echo "<ul class='twit-summary'>";
						echo "<li>";
							echo "Updates <br>";
							echo "<strong>";
								echo $new_tweet_listed_count;
							echo "</strong>"; //number of updates
						echo "</li>";
						echo "<li>";
							echo "Follower <br>";
							echo "<strong>";
								echo $new_tweet_friends_count;
							echo "</strong>"; //number of followers
						echo "</li>";
						echo "<li>";
							echo "Following <br>";
							echo "<strong>";
								echo $new_tweet_friends_count;
							echo "</strong>"; // following
						echo "</li>";
					echo "</ul>";
					echo "<div class='twit-description'>".$new_tweet_description."</div>"; //user description
				echo "</div>";
				//End of twit-profile-box

/*
	JSON VERSION
*/
if(isset($_SESSION['nickname'])) {
	// echo 
	// 	"<div class='twit-profile-box'>";	
	// if(count($data)>0) {
	// 	echo 
	// 		"<div class='tweet-profile-top'>";
	// 	echo 
	// 		"<div class='twit-image'>";
	// 		echo 
	// 			"<img src=\"".$data['0']['user']['profile_image_url']."\"/>"; //getting the profile image
	// 	echo 
	// 		"</div>";	
	// 		echo 
	// 			"<ul class='twit-intro'>";
	// 			echo 
	// 				"<li>";
	// 				echo 
	// 					$data['0']['user']['name']."<br/>"; //getting the username
	// 			echo 
	// 				"</li>";
	// 			echo 
	// 				"<li>";
	// 				echo 
	// 					"<a href='";
	// 					echo 
	// 						$data['0']['user']['url']; //getting the web site address
	// 				echo 
	// 					"'>Website</a>";
	// 			echo 
	// 				"</li>";
	// 			echo 
	// 				"<li>";
	// 				echo 
	// 					"Location: ".$data['0']['user']['location']."<br/>"; //user location
	// 			echo 
	// 				"</li>";
	// 		echo 
	// 			"</ul>";
	// 	echo 
	// 		"</div>";
		
	// 		echo 
	// 			"<ul class='twit-summary'>";
	// 			echo 
	// 				"<li>";
	// 				echo 
	// 					"Updates <br>";
	// 				echo 
	// 					"<strong>";
	// 					echo 
	// 						$data['0']['user']['statuses_count'];
	// 				echo 
	// 					"</strong>"; //number of updates
	// 			echo 
	// 				"</li>";
	// 			echo 
	// 				"<li>";
	// 				echo 
	// 					"Follower <br>";
	// 				echo 
	// 					"<strong>";
	// 					echo 
	// 						$data['0']['user']['followers_count'];
	// 				echo 
	// 					"</strong>"; //number of followers
	// 			echo 
	// 				"</li>";
	// 			echo 
	// 				"<li>";
	// 				echo 
	// 					"Following <br>";
	// 				echo 
	// 					"<strong>";
	// 					echo 
	// 						$data['0']['user']['friends_count'];
	// 				echo 
	// 					"</strong>"; // following
	// 			echo 
	// 				"</li>";
	// 		echo 
	// 			"</ul>";		
	// 	}
	// 	else {
	// 		echo "There is no tweet for any of your followers.";
	// 	}
	// 	// echo "Description: ".$data['0']['user']['description']."<br/>"; //user description
	// echo "</div>";
	// //End of twit-profile-box
	// echo "<div class='tweet'>";
	// 	foreach ($data as $item){
	// 		echo '<p class="blog-post">';
	// 			$tweet = $item['text'];
	// 			$new_tweet = $tweet;
	// 			// echo $item['text'];
				
	// 			$pattern = "/http:\/\/t.co\/.[^ ]*/";
	// 			if(preg_match($pattern, $tweet, $matches)) {
	// 				// print_r($matches[0]);
	// 				$link = $matches[0];
	// 				$live_link = '<a href='.$link.'>'.$link.'</a>';
					
	// 				$new_tweet = str_replace($link, $live_link, $tweet);
	// 			}

	// 			echo $new_tweet;

	// 			if(!empty($item['entities']['media']['0']['media_url'])){
	// 				echo "<img src=\"".$item['entities']['media']['0']['media_url']."\" width=\"200\" height=\"200\"/>"; //getting the profile image
	// 			}
	// 			// echo "test";
	// 		echo '</p>';
	// 		// echo '<br/>';
	// 	}	
	// echo "</div>";
}
	

?>
<?php
	mysqli_close($connection);
?>
 