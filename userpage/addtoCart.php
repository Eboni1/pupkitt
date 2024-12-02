<?php
session_start();
include "../connection.php";
include "../functions.php";



if(!isset($_SESSION['cart'])){ $_SESSION['cart'] = [];}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    $id = $_POST['id'];

    if(isset($rows[$id])){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id] ++;
        }else{
            $_SESSION['cart'][$id] = 1;
        }
    }
}

$total = 0;

?>