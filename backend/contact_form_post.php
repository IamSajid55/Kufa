<?php
session_start();
// database connect
require_once 'inc/db.php';

$customer_name = $_POST['customer_name'];
$customer_email_address = $_POST['customer_email_address'];
$message = $_POST['message'];

if($_POST){
    $customer_contact_info_insert_query = "INSERT INTO contacts (customer_name, customer_email_address, customer_message) VALUES ('$customer_name', '$customer_email_address', '$message')";
    mysqli_query($db_connect, $customer_contact_info_insert_query);
    $_SESSION['submit_successful_status'] = 'Thanks For Your Message.';
    header('location: ../index.php#contact');
}


