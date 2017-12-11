<?php
    include_once('../database/user.php');
    include_once('../config/init.php');

    global $conn;

    $username = $_SESSION['username'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $email = $_POST['email'];

    $result = editUser($username, $password, $country, $email);

    header("Location: ../pages/home.php");