<?php 
session_start();
if(!isset($_SESSION['IS_LOGIN']))
{
    header('location:login.php');

}
?>