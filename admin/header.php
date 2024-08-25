<?php
require 'app/db.php';
require 'app/functions.php';
session_start();


if (!defined('CURRENCY')) {
    define('CURRENCY', 'KES ');
}

if (isset($_SESSION['admin_id'])) {
    $id = $_SESSION['admin_id'];
}else{
    $id = null;
}


$sql = "SELECT * FROM users WHERE user_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


$page_name = "Dashboard";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $page_name ?> - E-Home Kenya Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/icons/site.webmanifest">
    <link rel="mask-icon" href="assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">



    <!-- Vendor CSS Files -->
    <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
<script src="assets/js/notis.js"></script>

     <link rel="stylesheet" href="assets/css/notis.css">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- notis div  -->
     <?php if (isset($_GET['error'])) {
        $error = $_GET['error'];?>
    <div class="notis">
        <div class="notis-content">
            <i class="fas fa-solid fa-times check"></i>
            
                <?php 
                if ($error == 'email_taken') {
                    $message = "The email already exists!";
                } elseif ($error == 'send_email_failed!') {
                    $message = 'Failed to send email!';
                } elseif ($error == 'invalid_username') {
                    $message = 'The username does not exist!';
                } elseif ($error == 'invalid_password') {
                    $message = 'Invalid password!';
                } elseif ($error == 'do_not_match') {
                    $message = 'Passwords do not match!';
                }elseif ($error == 'invalid_current_password') {
                    $message = 'Invalid current password';
                }
            } ?>
            <div class="message">
                <span class="text text-1">Error</span>
                <span class="text text-2"><?= $message ?></span>
            </div>
        </div>
        <i class="fas fa-times close"></i>
        <div class="progress-bar"></div>
    </div>
    <!-- end notis div  -->