<?php
// database connect
require_once 'inc/db.php';

$service_update_query = "UPDATE `portfolios` SET status='Active' WHERE id= '$_GET[id]'";
mysqli_query($db_connect, $service_update_query);
header('location: portfolio.php#portfolio');