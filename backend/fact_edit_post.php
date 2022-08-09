<?php
session_start();
// database connect
require_once 'inc/db.php';

$ID = $_SESSION['fact_ID'];
$factpercentage = $_POST['factpercentage'];
$facttitle = $_POST['facttitle'];
$facticon = $_POST['facticon'];
$status = $_POST['status'];

if($factpercentage && $facttitle && $facticon){
    $update_fact_from_db = "UPDATE facts_area SET fact_percentage = '$factpercentage', fact_title='$facttitle', fact_icon = '$facticon', status = '$status' WHERE id = $ID";
    mysqli_query($db_connect, $update_fact_from_db);
    $_SESSION['fact_edit_success'] = "Your Fact Edit Successfully.";
    header('location: fact_list.php');
}else{
    $_SESSION['fact_edit_error'] = "Some Info You Missed";
    header("location: fact_edit.php?id=$ID");
}