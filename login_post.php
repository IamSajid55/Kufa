<?php
session_start();
$email = $_POST['email_address'];
$password = $_POST['password'];
// Database Connect
$db_connecting = mysqli_connect('localhost', 'root', '', 'php');

// Password encrypted function
$encrypted_password = md5($password);

// Checking after users login mysql check user info in database
$return_db_query = "SELECT COUNT(*) AS 'result' FROM `users` WHERE email_address='$email' AND password='$encrypted_password'";

// Database Connect to above query
$from_db = mysqli_query($db_connecting, $return_db_query);

if(mysqli_fetch_assoc($from_db)['result'] == 1){
    $from_db_name_query = "SELECT id,name, phone_number FROM users WHERE email_address= '$email'";
    $from_db_name = mysqli_query($db_connecting, $from_db_name_query);
    $from_db_name_query_assoc = mysqli_fetch_assoc($from_db_name);
    $_SESSION['s_email'] = $email;
    $_SESSION['s_name'] = $from_db_name_query_assoc['name'];
    $_SESSION['s_phone_number'] = $from_db_name_query_assoc['phone_number'];
    $_SESSION['s_id'] = $from_db_name_query_assoc['id'];
    header('location: backend/dashboard.php');
}else{
    header('location: login.php');
    $_SESSION['user_login_info_error'] = "User Login Information Is Wrong!";
}

if(!$email){
    header('location: login.php');
    $_SESSION['email_error'] = "Email is Wrong";
}

if(!$password){
    header('location: login.php');
    $_SESSION['password_error'] = "Password is Wrong";
}