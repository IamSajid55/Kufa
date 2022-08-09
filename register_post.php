<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email_address'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$flag = false;

// databese connected start
$db_connect = mysqli_connect('localhost', 'root', '', 'php');

if($name){
    if(ctype_alpha($name)){
        $_SESSION['old_name'] = $name;
    }else{
        $flag = true;
        $_SESSION['name_error'] = "Name is Invalid";
    }
}else{
    $flag = true;
    $_SESSION['name_error'] = "Name is required*";
}

if($email){
    if(filter_var($email , FILTER_VALIDATE_EMAIL)){
        $_SESSION['old_email'] = $email;
    }else{
        $flag = true;
        $_SESSION['email_error'] = "Email Address is Invalid";
    }
}else{
    $flag = true;
    $_SESSION['email_error'] = "Email Address is required*";
}

if($phone_number){
    $_SESSION['old_number'] = $phone_number;
}

if($password){
    if(strlen($password) >= 8){
        if(preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)
        ){
            $_SESSION['old_password'] = $password;
        }else{
            $flag = true;
            $_SESSION['password_error'] = "the password does not meet the requirements!";
        }
    }else{
        $flag = true;
        $_SESSION['password_error'] = "Password must be minimum 8 characters length*";
    }
}else{
    $flag = true;
    $_SESSION['password_error'] = "Password is required*";
}
if($confirm_password){
    if($password != $confirm_password){
        $flag = true;
        $_SESSION['confirm_password_error'] = "Confirm Password Should be Match*";
    }else{
        echo "$confirm_password <br >";
    }
}else{
    $flag = true;
    $_SESSION['confirm_password_error'] = "Confirm Password Missing*";
}

if($flag){
    header('location: register.php');
}else{
    
    $email_check_query = "SELECT COUNT(*) AS 'VALIDITY' FROM users WHERE email_address='$email'";
    $after_check_email_validity = mysqli_query($db_connect, $email_check_query);

    if(mysqli_fetch_assoc($after_check_email_validity)['VALIDITY'] == 1){
        header('location: register.php');
        $_SESSION['email_taken'] = "<b>$email,</b> email already taken";
    }else{
        // Password encrypted before insert user info in database
        $encrypted_password = md5($password);

        // insert user info in database query
        $insert_query = "INSERT INTO users (name, email_address, phone_number, password) VALUES ('$name', '$email', '$phone_number', '$encrypted_password')";

        // connecting database to insert query
        mysqli_query($db_connect, $insert_query);
        header('location: login.php');

        $_SESSION['congratulation'] = "<b>$name,</b> Your Account Created By Successfully";
        $_SESSION['email_pass'] = "$email";
        $_SESSION['password_pass'] = "$password";
    }
}