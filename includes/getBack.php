<?php 

include "./includes/connect.php"; 
session_start();
$user = $_SESSION['userName'];

if(!$user){
    header("Location:login.php");
}

?>