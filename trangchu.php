<?php 
//Trang của khách hàng
include "config.php";
session_start();
error_reporting(0);

if(!isset($_SESSION['username']))
{

}else{
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    echo "customer page-username = $username";
}

?>