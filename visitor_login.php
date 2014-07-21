<?php 
// if($_SERVER["HTTPS"] != "on") {
//     header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//     exit;
// }
session_start();
ini_set('display_errors', 1);
require_once('includes/db_connection.php');
?>

<?php
// Grab User submitted information
$username = $_POST["username"];
$password = $_POST["password"];

// print_r($result);
// print_r($row);

$nameErr = "";
$passErr= "";
$name = "";
$errormsg = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errormsg = "your information is not correct.";

    if(empty($username)) {
        $nameErr = "Name is required.";
    }
    else 
    {
        $name = test_input($username);
        //Check if name only contains lettere and whitespace
        if(!preg_match("/^[a-zA-Z ]*$/", $name))
        {
            $nameErr = "Only letters and white space allowed.";
        }
    }

    if(empty($password)) {
        $passErr = "Password is required.";
    }

    $new_password = md5($password);
    
    if(!empty($username) && !empty($new_password)) {
        require_once('includes/db_connection.php');
        

        /*
            Comment below (Srecko)
        */
        $result = mysqli_query($connection, "SELECT visitor_id, visitor_username, visitor_password, visitor_firstname, visitor_lastname, visitor_email, visitor_highschool, visitor_graduationyear, visitor_description FROM visitors WHERE visitor_username = '{$username}' && visitor_password = '{$new_password}'");
        $row = mysqli_fetch_array($result);
        $pass_db = $row["visitor_password"];

        if($row["visitor_username"] == $username && $pass_db == $new_password){
        
        /*
            Uncomment below and a bracket down below (Srecko)
        */

        // $result = mysqli_query($connection, "SELECT visitor_id, visitor_username, visitor_password, visitor_firstname, visitor_lastname, visitor_email, visitor_highschool, visitor_graduationyear, visitor_description FROM visitors WHERE visitor_username = '{$username}'");
        // $row = mysqli_fetch_array($result);
        // $pass_db = $row["visitor_password"];
        // if($row["visitor_username"] == $username){
        //     if(crypt($password, $pass_db) == $pass_db) {
    
            $_SESSION['is_login'] = true;
            $_SESSION['visitor_is_login'] = true;
            $_SESSION['visitor_id'] = $row["visitor_id"];
            $_SESSION['nickname'] = $row["visitor_firstname"];
            $_SESSION['visitor_lastname'] = $row["visitor_lastname"];
            $_SESSION['visitor_username'] = $row["visitor_username"];
            // $_SESSION['visitor_password'] = $row["visitor_password"];
            $_SESSION['visitor_email'] = $row['visitor_email'];
            $_SESSION['visitor_highschool'] = $row['visitor_highschool'];
            $_SESSION['visitor_graduationyear'] = $row['visitor_graduationyear'];
            $_SESSION['visitor_description'] = $row['visitor_description'];
            
            header("Location: ./timeline.php");
            exit;
        // }
    }
        else {
            // header("Location: ./index.php");
            unset($_SESSION['is_login']); 
            $_SESSION['is_login'] = false;
            header("Location: ./login_fail.php");
            // echo "Login Failed. Please try again";          
            die("Database query failed.");
            exit;
        }
    } else {
        $errormsg = "<br>please enter username and password.";
    }
}

// if (!isset($_SESSION['valid_user'])) {
    
?>
<?php 
$title_name = "Login";
include('includes/new_header.php');
error_reporting(E_ALL); 
?>

<div class="form-container">
    <div class="login-box">
        <h3>
            Thanks for visiting SIAT website.
        </h3>
        <div class="login-box-form">
            <span class="error">
                <?php
                    echo $errormsg;
                ?>
            </span>
           <!--  <form action="visitor_validate_login.php" method="POST"> -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-row">
                    <div class="form-row-body">
                        <label>Username</label>
                        <input type="text" name="username" size="50" placeholder="username"/>
                        <span class="error">*<?php echo $nameErr; ?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-row-body">
                        <label>Password</label>
                        <input type="password" name="password" size="50" placeholder="password" />
                        <span class="error">*<?php echo $passErr; ?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-row-body">
                        <input type="submit" value="Log In"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>        

<?php  // 5. Close database connection  
    mysqli_close($connection);
?>

<?php include('includes/footer.php');?>