<?php
session_start();
// database connect
require_once 'inc/db.php';

$portfolioname = htmlspecialchars($_POST['portfolioname'], ENT_QUOTES);
$portfoliocategory = htmlspecialchars($_POST['portfoliocategory'], ENT_QUOTES);
$portfoliodescription = htmlspecialchars($_POST['portfoliodescription'], ENT_QUOTES);
$portfoliofile = $_FILES['portfoliofile']['name'];

if($portfolioname && $portfoliocategory && $portfoliofile){
    $portfolio_insert_query = "INSERT INTO portfolios (portfolio_name,portfolio_category, portfolio_description) VALUES ('$portfolioname','$portfoliocategory', '$portfoliodescription')";
    $portfolio_insert_db = mysqli_query($db_connect, $portfolio_insert_query);
    $portfolio_id = mysqli_insert_id($db_connect);
    $explode_image_name = explode('.', $_FILES['portfoliofile']['name']);
    $image_extention = end($explode_image_name);
    $rename = $portfolio_id. '.'. $image_extention;
    $new_location_for_portfolio_image = "uploads/portfolios/$rename";
    $old_location = $_FILES['portfoliofile']['tmp_name'];
    move_uploaded_file($old_location, $new_location_for_portfolio_image);

    // profile image after rename then update database profile image start
    $update_portfolio_image_query = "UPDATE portfolios SET portfolio_image='$rename' WHERE id=$portfolio_id";
    mysqli_query($db_connect, $update_portfolio_image_query);
    // profile image after rename then update database profile image end

    $_SESSION['portfolio_status_added'] = 'Portfolio Added Successfully.';
    header('location: portfolio.php#portfolio');
}else{
    $_SESSION['portfolio_status'] = "Some info missing!";
    header('location: portfolio.php');
}
