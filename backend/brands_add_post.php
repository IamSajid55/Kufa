<?php
session_start();
// database connect
require_once 'inc/db.php';
$brandname = $_POST['brandname'];
$brand_image = $_FILES['brand_image']['name'];

if($brandname && $brand_image){
    // brand image after rename then insert database brand image start
    $brand_insert_query = "INSERT INTO brands (brand_name) VALUES('$brandname')";
    $brand_insert_db = mysqli_query($db_connect, $brand_insert_query);
    // brand image after rename then insert database brand image end

    $explode_image_name = explode('.', $brand_image);
    $image_extention = end($explode_image_name);
    $brand_id = mysqli_insert_id($db_connect);
    $rename = $brand_id. '.'. $image_extention;
    $new_location_for_brand_image = "uploads/brands/$rename";
    $old_location = $_FILES['brand_image']['tmp_name'];
    move_uploaded_file($old_location, $new_location_for_brand_image);

    // profile image after rename then update database profile image start
    $update_brand_image_query = "UPDATE brands SET brands_image='$rename' WHERE id=$brand_id";
    mysqli_query($db_connect, $update_brand_image_query);
    // profile image after rename then update database profile image end

    $_SESSION['brand_added_success'] = "Brands Added Successfully.";
    header('location: brands_list.php');
}else{
    $_SESSION['brand_status'] = "Some info missing!";
    header('location: brands_add.php');
}
