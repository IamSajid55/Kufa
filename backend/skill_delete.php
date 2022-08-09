<?php
// database connect
require_once 'inc/db.php';
$skill_ID = $_GET['id'];
$skill_delete_query = "DELETE FROM `skills` WHERE id=$skill_ID";
mysqli_query($db_connect, $skill_delete_query);
header('location: about.php#skilllists');