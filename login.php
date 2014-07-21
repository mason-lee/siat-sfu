<?php 
// if($_SERVER["HTTPS"] != "on") {
//     header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//     exit;
// }
session_start();
require_once('includes/db_connection.php');

ini_set('display_errors', 1);

?>

<?php
$nameErr = "";
$passErr= "";
$name = "";
$errormsg = "";

$username = $_POST["username"];
$password = $_POST["password"];    

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
            $nameErr = "Only English characters are allowed.";
        }
    }

    if(empty($password)) {
        $passErr = "Password is required.";
    }

    $encrypted_password = md5($password);
    // echo $password;
    // echo $encrypted_password;

    // if(!empty($username) && !empty($password)) {
    if(!empty($username) && !empty($encrypted_password)) {
        
        // if(isset($username) && isset($encrypted_password)) {
            // $result = mysqli_query($connection,  "SELECT * FROM members WHERE user_name = '{$username}' && pass_word = '{$encrypted_password}'");
            $result = mysqli_query($connection,  "SELECT * FROM members WHERE user_name = '{$username}' && pass_word = '{$encrypted_password}'");
            $row = mysqli_fetch_array($result);
            $pass_db = $row["pass_word"];

            if($row["user_name"] == $username && $pass_db == $encrypted_password){

                $_SESSION['is_login'] = true;
                $_SESSION['nickname'] = $row["first_name"];
                $_SESSION['id'] = $row["user_id"];

                $_SESSION['writer_school'] = $row["high_school"];
                $_SESSION['member_lastname'] = $row["last_name"];
                $_SESSION['member_username'] = $row["user_name"];
                $_SESSION['member_email'] = $row["email"];
                $_SESSION['member_year'] = $row["graduation_year"];
                $_SESSION['description'] = $row["description"];
                $_SESSION['website'] = $row["website"];
                $_SESSION['flickr'] = $row["flickr_id"];
                $_SESSION['twitter'] = $row["twitter_id"];
                
                // ob_start();
                header("Location: ./members_page_detail.php?id=".$_SESSION['id']);
                // ob_flush();
                exit;
            }
            else {
                unset($_SESSION['is_login']); 
                $_SESSION['is_login'] = false; 
                header("Location: ./login_fail.php");
                die("Database query failed.");
                exit;
            }
        //}//If user entered username and password
        // 
    }
    else {
        $errormsg = "<br>please enter username and password.";
    }
}

?>
<?php
    $title_name = "Login";
    $section = "login";
    include('includes/new_header.php');
?>

<div class="form-container">
    <div class="login-box">
        <h3>
            SIAT wants to provide better information to 
            potential students and their parents.<br>
            Please be an ambassador for SIAT program!
        </h3>
        <div class="login-box-form">

            <span class="error">
                <?php 
                    echo $errormsg;
                ?>
            </span>
            <!-- <form action="validate_login.php" method="POST"> -->
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
                        <input class="b1" type="submit" value="Log In"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>        

<?php  // 5. Close database connection  
    mysqli_close($connection);
?>

<?php 
include('includes/footer.php');
?>