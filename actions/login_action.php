<?php
    include_once('../config/init.php');
    include_once('../database/user.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = logInUser($username, $password);

    if($result)
    {
        $_SESSION['username']= $username;
    }

    $_SESSION['login_result'] = $result;

    header("Location: ../pages/home.php");
?>