<?php 
//Trang của admin
include "config.php";
session_start();

if(isset($_SESSION['username']) && $_SESSION['username']){
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    echo "admin page-username = $username";
}else{
    header("Location:index.php");
}
?>