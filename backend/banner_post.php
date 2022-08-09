<?php
    // database connect
    $db_connect = mysqli_connect('localhost', 'root', '', 'php');

    foreach($_POST as $settings_name => $settings){
        $settings_value = htmlspecialchars($settings, ENT_QUOTES);
        $settigns_update_query = "UPDATE settings SET settings_value='$settings_value' WHERE settings_name= '$settings_name'";
        mysqli_query($db_connect,$settigns_update_query);
    }
    header('location: banner.php');

    if($_FILES['main_picture']['size'] == 0){
        header('location: banner.php');
    }else{
        $picture_name = "main_picture";
        $name_explode = explode('.',$_FILES['main_picture']['name']);
        $extaintion = end($name_explode);
        $main_picture_name = $picture_name.'.'.$extaintion;
        $old_location = $_FILES['main_picture']['tmp_name'];
        $new_location = "uploads/images/main_image/$main_picture_name";
        move_uploaded_file($old_location,$new_location);
        
        $image_name_update = "UPDATE general_images SET images_name='$main_picture_name' WHERE about_images='main_picture'";
        mysqli_query($db_connect,$image_name_update);
        header('location: banner.php');
    }