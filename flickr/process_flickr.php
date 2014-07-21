<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
<!-- example from http://birdegg.wordpress.com/2006/04/04/flickr-api-example/ -->
<style type="text/css">
	div.imgLiquidFill{	
		/*border: 1px solid #ccc;*/
		padding: 5px;
		margin: 5px;
		/*height: 19;*/
		/*float: left;*/

	}
	div.container {
	}
	div.spacer {
		clear: both;
	}

	.flickr_container {
		/*width: 66%;*/
		/*border: 1px solid #d4d4d4;*/
	}
	.flickr_container img {
		/*height: 114px;*/
	}
</style>
</head>
<body>
<div class="flickr_container">
<div class="spacer">

</div>
<?php
/*
Photos URLs:
http://static.flickr.com/{server-id}/{id}_{secret}.jpg
http://static.flickr.com/{server-id}/{id}_{secret}_[m|s|t|b].jpg
http://static.flickr.com/{server-id}/{id}_{secret}_o.(jpg|gif|png)

s small square 75x75 
t thumbnail, 100 on longest side 
m small, 240 on longest side 
- medium, 500 on longest side 
b large, 1024 on longest side (only exists for very large original images) 
o original image, either a jpg, gif or png, depending on source format 
*/

/*
	A page that displays flickr photos nicely
*/

	// session_start();
	require_once('includes/db_connection.php');
	require_once("phpFlickr-3.1/phpFlickr.php");
	// ini_set('display_errors', 1);
?>

<?php
	/*
		Get the user_id of the member being selected
	*/
	$id = $_GET['id'];

	// if(mysqli_ping($connection) == false) {
	if(!mysqli_ping($connection)){
		$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	}
	else {
		// echo "There is a problem with our service. Please come back soon, we will do our best to fix this problem.";
	}	

	$query = "SELECT user_id, flickr_id from members where user_id = {$id}";

	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);
	$flickr_id  = $row["flickr_id"];


$nsid = "117906895@N07";
// $flickr_id = "masonleetest";
$api_key = "7bdcc3b06b68475e1e1fc36c50e32c59";
$link_option = 2; 	//link to the original pic
					//line_option = 2 -> link to the flickr page

/*
	Get the members' flickr id with their username
*/
$f = new phpFlickr($api_key);
// $person = $f->people_findByUsername("dovetaildw");
/*
	$flickr_id is a member's flickr username
	$person is an array that holds member's flickr user id and username
*/
$person = $f->people_findByUsername($flickr_id);
// $photos = $f->people_getPublicPhotos($person['id'], NULL, NULL, 12);
// $photos = $f->people_getPublicPhotos($person['id'], NULL, NULL, 12);
/*
	Only get member's flickr user id
*/
// echo $person['id'];
// echo "<br>";

// print_r($person);

function photo_url($p, $size='m', $ext='jpg'){  
  return "http://static.flickr.com/{$p["server"]}/{$p["id"]}_{$p["secret"]}_$size.{$ext}";
}

function flickr_page_url($p, $uid){	
	return "http://www.flickr.com/photos/".$uid."/".$p["id"]."/";	
}

$url ="http://flickr.com/services/rest/?method=flickr.people.getPublicPhotos"."&user_id=".$person['id']."&api_key=".$api_key."&per_page=12";

$xml = simplexml_load_file($url) or die(" Unable to contact Flickr");

/*
	Limit the number of photos
*/
$perpage = $xml-> photos["perpage"];
$total = $xml-> photos["total"];
$pages = $xml-> photos["pages"];
$page = $xml-> photos["page"];

echo '<span class="flickr-data">Number of pages: ' . $pages;
echo '</span>';
echo '<br/>';
echo '<span class="flickr-data">Total photos: ' . $total;
echo '</span>';
echo '<br/>';

if($total>0) {
	foreach($xml->photos->photo as $photo){	
	print "\n"."<div class=flickr-post>";
	if($link_option == 1){
		print "\n".	'<a href="'.photo_url($photo,'m').'" target="_blank">'."\n";
	}
	else{
		print "\n".	'<a href="'.flickr_page_url($photo, $person['id']).'" target="_blank">'."\n";
	}
	print '<img src="'.photo_url($photo,'m'). '"'.' alt="'.$photo["title"].'"/>'."</a>"."\n";

	print "</div>"."\n";
}
}
else {
	print "Your follower doesn't have flickr photos to display.";
}



// if($pages>=2){
// 	for($i=2; $i<=$pages; $i++){
// 		$url ="http://flickr.com/services/rest/?method=flickr.people.getPublicPhotos"."&user_id=".$person['id']."&api_key=".$api_key."&page=".$i."&per_page=12";
		
// 		$xml = @simplexml_load_file($url) or die("Unable to contact Flickr");
		
// 		// iterate through photos
// 		foreach($xml->photos->photo as $photo){	
// 			print "\n"."<div class=imgLiquidFill>";
// 			if($link_option == 1){
// 				print "\n".	'<a href="'.photo_url($photo,'o').'" target="_blank">'."\n";
// 			}
// 			else{
// 				print "\n".	'<a href="'.flickr_page_url($photo, $person['id']).'" target="_blank">'."\n";
// 			}
// 			print '<img src="'.photo_url($photo,'m'). '"'.' alt="'.$photo["title"].'"/>'."</a>"."\n";
					
// 			print "</div>"."\n";
// 		}
// 	}
// }
?>

<?php
	mysqli_close($connection);
?>
<div class="spacer">
</div>
</div>
</body>