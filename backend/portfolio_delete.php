<?php
// database connect
require_once 'inc/db.php';
$portfolio_id = $_GET['id'];
$porfolio_update_query = "UPDATE `portfolios` SET status='Deactive' WHERE id= $portfolio_id";
mysqli_query($db_connect, $porfolio_update_query);
header('location: portfolio.php#portfolio');