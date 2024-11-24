<?php

$ServerName = "localhost";
$userName = "root";
$password = "";
$dbname = "votingsystem";

$conn = mysqli_connect($ServerName,$userName,$password,$dbname);

if(!$conn){
    die(mysqli_error($conn));
}


?>