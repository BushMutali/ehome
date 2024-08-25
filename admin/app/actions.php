<?php
require 'db.php';
require 'functions.php';

// Admin Login 

if (isset($_POST['admin-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    login($conn, $username, $password);
}

// update user info

if (isset($_POST['update_info'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bio = $_POST['about'];
}

// update admin password

if (isset($_POST['change_password'])) {
    $current = $_POST['currentPassword'];
    $new = $_POST['password'];
    $new2 = $_POST['password2'];
    $username = $_POST['username'];

    if ($new2 != $new) {
        header("location: ../user-profile.php?error=do_not_match&showNotis");
        exit();
    }

    changePassword($conn, $username, $current, $new);
}