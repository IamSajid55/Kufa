<?php
session_start();
// database connect
require_once 'inc/db.php';
$ID = $_SESSION['brands_ID'];
$brand_name = $_POST['brandname'];
$brands_image = $_FILES['brand_image']['name'];

if($brand_name && $brands_image){
    $explode_image_name = explode('.', $brands_image);
    $image_extention = end($explode_image_name);
    $rename = $ID. '.'. $image_extention;
    $new_location_for_brand_image = "uploads/brands/$rename";
    $old_location = $_FILES['brand_image']['tmp_name'];
    move_uploaded_file($old_location, $new_location_for_brand_image);

    $update_brand_from_db = "UPDATE brands SET brand_name= '$brand_name', brands_image='$rename' WHERE id = $ID";
    mysqli_query($db_connect, $update_brand_from_db);

    $_SESSION['brand_edit_success'] = "Brands Status Edit Successfully.";
    header('location: brands_list.php');
}else{
    $_SESSION['brand_edit_error'] = "Some Information Is Missing.";
    header("location: brands_edit.php?id=$ID");
}