<?php
// database connect
require_once 'inc/db.php';
session_start();

$servicetitle = htmlspecialchars($_POST['servicetitle'], ENT_QUOTES);
$servicedescription = htmlspecialchars($_POST['servicedescription'], ENT_QUOTES);
$serviceicon = $_POST['serviceicon'];
$status = $_POST['status'];

if($servicetitle && $servicedescription && $serviceicon && $status){
    $service_insert_query = "INSERT INTO services (service_title, service_description, service_icon, status) VALUES ('$servicetitle','$servicedescription','$serviceicon','$status')";
    mysqli_query($db_connect, $service_insert_query);
    $_SESSION['service_status_added'] = "Your Service Added Successfully.";
    header('location: services_list.php');
}else{
    $_SESSION['service_status'] = "Something is Missing";
    header('location: service_add.php#service_add');
}