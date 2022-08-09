<?php
// database connect
require_once 'inc/db.php';

foreach($_POST as $settings_name => $settings_value){
    $settings = htmlspecialchars($settings_value, ENT_QUOTES);
    $contact_general_post = "UPDATE settings SET settings_value='$settings' WHERE settings_name='$settings_name'";
    mysqli_query($db_connect, $contact_general_post);
}
header('location: contact_page.php');