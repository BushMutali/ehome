<?php
require 'app/db.php';
$password = "admin1234";
$email = "admin@ehomekenya.com";
$username = "admin";

$hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, last_name,username,user_email, user_password, role)
VALUES (
'admin', 'admin', '$username', '$email', '$hashed', 'admin'
)
";
if (mysqli_query($conn, $sql)){
    echo 'Done';
}
