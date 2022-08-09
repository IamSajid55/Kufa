<?php
// database connect
$db_connect = mysqli_connect('localhost', 'root', '', 'php');

$testimonial_id = $_GET['id'];
$delete_query = "DELETE FROM `textimonials` WHERE id= $testimonial_id";
mysqli_query($db_connect, $delete_query);
header('location: testimonial.php#textimonial_post');

?>