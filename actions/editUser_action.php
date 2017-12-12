<?php

    include_once('../config/init.php');
    include_once('../database/user.php');

    if(unsetOrEmpty($_SESSION['username']) || !unsetOrEmpty($_POST['password']) || !unsetOrEmpty($_POST['country']) || !unsetOrEmpty($_POST['email']))
    {
        $_SESSION['Edit_Error'] = "Some field is unset";

        header("Location: ../pages/editUser.php");
    }
    else
    {
        $username = $_SESSION['username'];
        $password = $_POST['password'];
        $country = $_POST['country'];
        $email = $_POST['email'];

        editUser($username, $password, $country, $email);

        header("Location: ../pages/home.php");
    }

    function unsetOrEmpty($var)
    {
        return (!isset($var) || $var = "" || is_null($var));
    }
?>