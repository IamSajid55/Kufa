<?php
session_start();
// database connect
require_once 'inc/db.php';
$ID = $_SESSION['service_ID'];
$servicetitle = htmlspecialchars($_POST['servicetitle'], ENT_QUOTES);
$servicedescription = htmlspecialchars($_POST['servicedescription'], ENT_QUOTES);
$serviceicon = $_POST['serviceicon'];
$status = $_POST['status'];

if($servicetitle && $servicedescription && $serviceicon){
    $update_service_from_db = "UPDATE services SET service_title = '$servicetitle', service_description='$servicedescription', service_icon = '$serviceicon', status = '$status' WHERE id = $ID";
    mysqli_query($db_connect, $update_service_from_db);
    $_SESSION['service_status_edit'] = "Your Service Edit Successfully.";
    header('location: services_list.php');
}else{
    $_SESSION['service_status_error'] = "Some Information Missing.";
    header("location: service_edit.php?id=$ID");
}
