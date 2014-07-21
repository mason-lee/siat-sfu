<?php

$error = array();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
// $school = $_POST['school'];
// $graduationyear = $_POST['graduationyear'];
// $description = $_POST['description'];
// $website = $_POST['website'];


if(isset($_POST['submit_button']))
{
  // use trim() so empty spaces don't count
  // use === to avoid false positives
  // empty() would consider "0" to be empty

  $first_name = trim($firstname);
  if(!is_string($first_name) || empty($first_name)) {
    $error['firstname'] = "Your first name is required.";
  }

  $last_name = trim($lastname);
  if(!is_string($last_name) || empty($last_name)) {
    $error['lastname'] = "Your last name is required.";
  }

  $user_name = trim($username);
  if(!is_string($user_name) || empty($user_name)) {
    $error['username'] = "Your username is required.";
  }

  $pass_word = trim($password);
  if(!is_string($pass_word) || empty($pass_word)) {
    $error['password'] = "Your password is required.";
  }

  $email_address = trim($email);
  if(!is_string($email_address) || empty($email_address)) {
    $error['email'] = "Your email address is required.";
  }

  print_r($error);
}

?>