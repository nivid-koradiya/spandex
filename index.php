<?php 
session_start();
if(!isset($_SESSION['IS_LOGIN']))
{
    header('location:login.php');

}


?>

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/style.css">

<style>

    body{
        display: flex;
        justify-content: center;
        align-items: center
        ;
    }
</style>
<a href="entry.php" class="btn btn-primary custom-btn">Entry</a>