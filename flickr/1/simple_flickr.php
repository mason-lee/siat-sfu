<?php
	session_start();
	include('includes/db_connection.php');
?>
<?php
	$user_id = $_SESSION['id'];
	$query = "SELECT user_id, flickr_id from members where user_id = '{$user_id}'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);
	$flickr_id  = $row["flickr_id"];

$f = new phpFlickr($api_key);
$person = $f->people_findByUsername("dovetaildw");

/*
	A page that gets XML data from my flickr account
*/
$api_key = '7bdcc3b06b68475e1e1fc36c50e32c59';
// $tag = 'puppy';
$perPage = 5;

/*
	This URL is a XML file.
*/
$url = "http://api.flickr.com/services/feeds/photos_public.gne?id=117906895@N07&lang=en-us&format=rss_200";
// $url = "http://api.flickr.com/services/feeds/photos_public.gne?.id=".{$person['id']}."&lang=en-us&format=rss_200";



$xmlFileData = file_get_contents($url);
file_put_contents("flickr_output.xml", $xmlFileData);

//$xmlFileData = file_get_contents($url);
$xmlData = new SimpleXMLElement($xmlFileData);
//Uncomment the lines below to see the human readable version of SimpleXML object
 echo"<pre>";
 print_r($xmlData);
 echo"</pre>";

?>
<?php  // 5. Close database connection  
    mysqli_close($connection);
?>

<?php
//foreach($xmlData->channel->item as $item) { 

	// Define variables
//	$title = $item->title;
//	$link = $item->link;
//	$description = $item->description;

	// Build and output photos
//	$content = "<h2>" . $title . "</h2>";
//	$content .= "<a href=\"" . $link . "\" target=\"_blank\">View on Flickr</a><br />";
//	$content .= $description . "<br />";
//	echo $content ;
//} 
?>