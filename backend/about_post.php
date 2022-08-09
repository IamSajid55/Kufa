<?php
    // database connect
    $db_connect = mysqli_connect('localhost', 'root', '', 'php');
    session_start();
    foreach($_POST as $settings_name => $settings){
        $settings_value = htmlspecialchars($settings, ENT_QUOTES);
        $settigns_update_query = "UPDATE settings SET settings_value='$settings_value' WHERE settings_name= '$settings_name'";
        mysqli_query($db_connect,$settigns_update_query);
    }
    header('location: about.php');

    if($_FILES['about_image']['size'] == 0){
        header('location: about.php');
    }else{
        $picture_name = "about_image";
        $name_explode = explode('.',$_FILES['about_image']['name']);
        $extaintion = end($name_explode);
        $about_image_name = $picture_name.'.'.$extaintion;
        $old_location = $_FILES['about_image']['tmp_name'];
        $new_location = "uploads/images/about_image/$about_image_name";
        move_uploaded_file($old_location,$new_location);
    
        $image_name_update = "UPDATE general_images SET images_name='$about_image_name' WHERE about_images='about_image'";
        mysqli_query($db_connect,$image_name_update);
        header('location: about.php');
    }