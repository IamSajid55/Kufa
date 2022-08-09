<?php
// database connect
require_once 'inc/db.php';

$fact_delete_query = "DELETE FROM facts_area WHERE id=$_GET[id]";
mysqli_query($db_connect, $fact_delete_query);

if($fact_delete_query){
    header('location: fact_list.php');
}