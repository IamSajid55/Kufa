<?php
// database connect
require_once 'inc/db.php';

$service_update_query = "UPDATE `services` SET delete_status='yes' WHERE id= '$_GET[id]'";
mysqli_query($db_connect, $service_update_query);
header('location: services_list.php');