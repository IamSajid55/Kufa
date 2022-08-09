<?php
// database connect
$db_connect = mysqli_connect('localhost', 'root', '', 'php');
session_start();

$skilltitle = htmlspecialchars($_POST['skilltitle'], ENT_QUOTES);
$skillbio = htmlspecialchars($_POST['skillbio'], ENT_QUOTES);
$skillprogress = $_POST['skillprogress'];
$status = $_POST['status'];

if($skilltitle && $skillbio && $skillprogress){
    $skills_insert_query = "INSERT INTO skills (skill_title, skill_bio, skill_progress) VALUES ('$skilltitle','$skillbio','$skillprogress')";
    mysqli_query($db_connect, $skills_insert_query);
    header('location: about.php#skilllists');
}else{
    $_SESSION['skills_status'] = "Something is Missing";
    header('location: about.php#skilllists');
}