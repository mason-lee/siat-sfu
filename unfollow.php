<?php
	session_start();
	require_once("includes/db_connection.php");
	ini_set('display_errors', 1);
?>


<?php
	// $members_id = $_POST['selected_member'];
	$members_id = $_GET['userid'];
	/*
		So that I can display these members on members_following.php page
	*/
	$_SESSION['remember_selected_members'] = $members_id;
	// print_r($_SESSION['remember_selected_members']);
	$id_visitor = $_SESSION['visitor_id'];
	// echo $id_visitor;
	// foreach($members_id as $value) {
		//Perform database query
		$query = "DELETE FROM visitor_to_member 
					WHERE visitors_visitor_id = $id_visitor
					AND members_user_id = $members_id";
		
		$result = mysqli_query($connection, $query);
		header("Location: unfollow_complete.php");
// }
?>

<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>


