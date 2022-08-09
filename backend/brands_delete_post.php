<?php
// database connect
require_once 'inc/db.php';

$brands_delete_query = "DELETE FROM brands WHERE id=$_GET[id]";
mysqli_query($db_connect, $brands_delete_query);

if($brands_delete_query){
    header('location: brands_list.php');
}