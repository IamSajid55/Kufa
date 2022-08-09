<?php
// database connect
$db_connect = mysqli_connect('localhost', 'root', '', 'php');
session_start();

$logo = $_FILES['logo']['size'];
$sticky_logo = $_FILES['sticky_logo']['size'];

if($logo == 0){
//    $_SESSION['logo_change_error'] = 'Something Missing';
   header('location: settings.php');
}else{
    $name_explode = explode('.',$_FILES['logo']['name']);
    $extaintion = end($name_explode);
    $picture_name = "logo";
    $logo_name = $picture_name.'.'.$extaintion;
    $old_location = $_FILES['logo']['tmp_name'];
    $new_location = "uploads/images/logo/$logo_name";
    move_uploaded_file($old_location,$new_location);
    
    $image_name_update = "UPDATE general_images SET images_name='$logo_name' WHERE about_images='logo'";
    mysqli_query($db_connect,$image_name_update);
    $_SESSION['logo_Change_status'] = 'Logo Changed';
    header('location: settings.php');
}

if($sticky_logo == 0){
    // $_SESSION['sticky_logo_change_error'] = 'Something Missing';
    header('location: settings.php');
}else{
    $name_explode = explode('.',$_FILES['sticky_logo']['name']);
    $extaintion = end($name_explode);
    $picture_name = "sticky_logo";
    $sticky_logo_name = $picture_name.'.'.$extaintion;
    $old_location = $_FILES['sticky_logo']['tmp_name'];
    $new_location = "uploads/images/logo/$sticky_logo_name";
    move_uploaded_file($old_location,$new_location);
    
    $image_name_update = "UPDATE general_images SET images_name='$sticky_logo_name' WHERE about_images='sticky_logo'";
    mysqli_query($db_connect,$image_name_update);
    $_SESSION['sticky_logo_Change_status'] = 'Sticky Logo Changed';
    header('location: settings.php');
}

