<?php
session_start();
// database connect
require_once 'inc/db.php';

$factpercentage = $_POST['factpercentage'];
$facttitle = $_POST['facttitle'];
$facticon = $_POST['facticon'];
$status = $_POST['status'];

if($factpercentage && $facttitle && $facticon){
    $fact_insert_query = "INSERT INTO facts_area (fact_percentage, fact_title, fact_icon, status) VALUES ('$factpercentage','$facttitle','$facticon','$status')";
    mysqli_query($db_connect, $fact_insert_query);
    $_SESSION['fact_status_added'] = "Your Fact Added Successfully.";
    header('location: fact_list.php');
}else{
    $_SESSION['fact_status_error'] = "Some Information Are Missing.";
    header('location: fact_add.php');
}