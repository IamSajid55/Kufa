<?php
    // database connect
    $db_connect = mysqli_connect('localhost', 'root', '', 'php');

    foreach($_POST as $settings_name => $settings){
        $settings_value = htmlspecialchars($settings, ENT_QUOTES);
        $settigns_update_query = "UPDATE settings SET settings_value='$settings_value' WHERE settings_name= '$settings_name'";
        mysqli_query($db_connect,$settigns_update_query);
    }
    header('location: settings.php');
    