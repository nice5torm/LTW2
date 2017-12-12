<?php
    include_once('../database/user.php');
    include_once('../config/init.php');

    global $conn;

    if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['age']) || !isset($_POST['gender']) || !isset($_POST['country']) || !isset($_POST['email']))
    {
        error();
    }
    else
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $email = $_POST['email'];

        $warning = createUser($username, $password, $age, $gender, $country, $email);

        if(!is_null($warning))
        {
            error($warning);
        }

        header("Location: ../pages/home.php");
    }

    function error($warning = "Registo Inválido")
    {
        $_SESSION['Register_Error'] = $warning;

        header("Location: ../pages/register.php");

        die();
    }
?>