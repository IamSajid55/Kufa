<?php
// database connect
require_once 'inc/db.php';

$contact_delete_query = "DELETE FROM contacts WHERE id=$_GET[id]";
mysqli_query($db_connect, $contact_delete_query);

if($contact_delete_query){
    header('location: contact_page.php');
}