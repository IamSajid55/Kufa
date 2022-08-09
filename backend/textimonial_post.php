<?php
session_start();
// database connect
$db_connect = mysqli_connect('localhost', 'root', '', 'php');

$picture_random_name = date('Y_'). time(). rand(1000,2000);

$clientname = htmlspecialchars($_POST['clientname'], ENT_QUOTES);
$clientpost = htmlspecialchars($_POST['clientpost'], ENT_QUOTES);
$clientopinion = htmlspecialchars($_POST['clientopinion'], ENT_QUOTES);
$clientpicture = $_FILES['clientpicture']['name'];


if($clientname && $clientpost && $clientopinion && $clientpicture){
    $testimonial_insert_query = "INSERT INTO textimonials (client_name,client_post,client_opinion) VALUE ('$clientname','$clientpost','$clientopinion')";
    $testimonial_post = mysqli_query($db_connect,$testimonial_insert_query);
    $testimonial_id = mysqli_insert_id($db_connect);

    $explode_picture_name = explode('.',$clientpicture);
    $extantion = end($explode_picture_name);
    $rename = $picture_random_name. '.' .$extantion;
    $old_location = $_FILES['clientpicture']['tmp_name'];
    $new_location = "uploads/client_picture/$rename";
    move_uploaded_file($old_location,$new_location);

    $update_pic_db = "UPDATE textimonials SET client_picture = '$rename' WHERE id = $testimonial_id"; 
    $update_testimonial_pic = mysqli_query($db_connect,$update_pic_db);
    header('location: testimonial.php#textimonial_post');
}else{
    $_SESSION['textimonial_status'] = 'Some info missing!';
    header('location: testimonial.php');
}

?>