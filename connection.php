<?php

$dbhost ="localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "pupkitt";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname))
{
    die("Failed to Connect");
}