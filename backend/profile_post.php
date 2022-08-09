<?php
session_start();
// database connect
require_once 'inc/db.php';

if($_POST['chnage_name']){
    $id = $_SESSION['s_id'];
    $name = $_POST['chnage_name'];
    $name_change_query = "UPDATE users SET name='$name' WHERE id=$id";
    mysqli_query($db_connect, $name_change_query);
    $_SESSION['s_name'] = $name;
    $_SESSION['name_change__alart'] = "You name changed Successfully";
    header('location: profile.php');
}else{
    header('location: profile.php');
}

if($_POST['profile_picture']){
    $id = $_SESSION['s_id'];
    $explode_image_name = explode('.', $_FILES['filename']['name']);
    $image_extention = end($explode_image_name);
    $rename = $id. '.'. $image_extention;
    $new_location_for_profile_image = "uploads/profile_picture/$rename";

    // profile image after rename then update database profile image start
    $update_profile_image_query = "UPDATE users SET profile_picture='$rename' WHERE id=$id";
    mysqli_query($db_connect, $update_profile_image_query);
    // profile image after rename then update database profile image end
    
    $old_location = $_FILES['filename']['tmp_name'];
    move_uploaded_file($old_location, $new_location_for_profile_image);
    $_SESSION['profile_image_status'] = 'Profile Image Changed Successfully';
    header('location: profile.php');
}else{
    header('location: profile.php');
}

if($_POST['phone_number']){
    $id = $_SESSION['s_id'];
    $number = $_POST['phone_number'];
    $number_change_query = "UPDATE users SET phone_number='$number' WHERE id=$id";
    mysqli_query($db_connect, $number_change_query);
    $_SESSION['s_phone_number'] = $number;
    $_SESSION['phone_number_alart'] = 'Phone Number Changed Successfully';
    header('location: profile.php');

}else{
    header('location: profile.php');
}

if($_POST['email_change']){
    $id = $_SESSION['s_id'];
    $email_change = $_POST['email_change'];
    $number_change_query = "UPDATE users SET phone_number='$email_change' WHERE id=$id";
    mysqli_query($db_connect, $number_change_query);
    $_SESSION['s_email'] = $email_change;
    $_SESSION['email_change_alart'] = 'Email Changed Successfully';
    header('location: profile.php');

}else{
    header('location: profile.php');
}

if($_POST['previous_password']){
    $id = $_SESSION['s_id'];
    $previous_password = $_POST['previous_password'];
    $encipted_password = md5($previous_password);
    $password_matching_query = "SELECT COUNT(*) AS 'result' FROM `users` WHERE id=$id AND password='$encipted_password'";
    $after_match_password = mysqli_fetch_assoc(mysqli_query($db_connect, $password_matching_query));


    if($after_match_password['result'] == 1){
        if($_POST['new_password'] != $_POST['confirm_password']){
            $_SESSION['new_password_error'] = 'Confirm Password did not match!';
            header('location: profile.php');
        }else{
            $id = $_SESSION['s_id'];
            $new_password = $_POST['new_password'];
            $encipted_password = md5($new_password);
            $change_password_query = "UPDATE users SET password='$encipted_password' WHERE id=$id";
            mysqli_query($db_connect, $change_password_query);
            $_SESSION['password_update'] = 'Password Update Successfully';
            header('location: profile.php');
        }
    }else{
        $_SESSION['previous_password_error'] = 'Previous Password Is Wrong';
        header('location: profile.php');
    }

}else{
    header('location: profile.php');
}

