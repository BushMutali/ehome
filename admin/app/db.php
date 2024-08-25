<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ehome";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
    die("Conection failed: " . mysqli_connect_error());
}