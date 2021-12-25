<?php

$server = "localhost";
$user = "root";
$password = "";
$dbname = "mysch_db";

$db = mysqli_connect($server, $user, $password, $dbname);

if(!$db){
    die("Database connection failed: " . mysqli_connect_error());
}

?>