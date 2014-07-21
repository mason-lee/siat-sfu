<?php
	session_start();
	require_once("includes/db_connection.php");
	ini_set('display_errors', 1);
?>


<?php
/*
	To see if I am getting the correct indexes of selected 
	checkboxes
*/
// if(!empty($_POST['selected_member'])) {
//     print_r($_POST['selected_member']);
// }

	/*
		Getting the data via ajax request.....
	*/
	echo '<pre>';
	var_dump($_SESSION);
	echo '</pre>';
	// $members_id = $_POST['selected_member'];
	$members_id = $_GET['userid'];
	// $members_id = intval($_POST['id']);
	// $members_id = $_GET['id'];
	// var_dump($_GET);
	// echo $members_id;
	// print_r($members_id);
	/*
		So that I can display these members on members_following.php page
	*/
	$_SESSION['remember_selected_members'] = $members_id;

	// print_r($_SESSION['remember_selected_members']);
	
	$id_visitor = $_SESSION['visitor_id'];
	
	// echo "visitor id is ";
	// echo $id_visitor;

	// foreach($members_id as $value) {

		//Perform database query
		$query = "INSERT INTO visitor_to_member (";
		$query .= "visitors_visitor_id, members_user_id";
		$query .= ") VALUES (";
		$query .= " '$id_visitor', '$members_id'";
		$query .= ")";
		
		$result = mysqli_query($connection, $query);
		// header("Location: members_page.php");
// }
?>

<?php
  	// 5. Close database connection  
	mysqli_close($connection);
?>

