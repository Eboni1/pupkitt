<?php
session_start();
include "../connection.php";
include "../functions.php";

$search = $_POST['search'];
$status = $_POST['options'];

if(!empty($search)){
    $query = "SELECT * FROM `users` WHERE `fullname` LIKE '%$search%'";
}elseif(!empty($status)){
    
}