<?php
// database connect
require_once 'inc/db.php';

// Settings Value Select Form Database
foreach($_POST as $settings_name => $settings){
    $settings_value = htmlspecialchars($settings, ENT_QUOTES);
    $settigns_update_query = "UPDATE settings SET settings_value='$settings_value' WHERE settings_name= '$settings_name'";
    mysqli_query($db_connect,$settigns_update_query);
}
header('location: service_add.php');