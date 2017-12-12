<?php
    include_once('../config/init.php');
    include_once('../database/toDoList.php');

    if(!isset($_POST['submit']) || !isset($_SESSION['username']) || $_POST['submit'] == "")
    {
        header("Location: ../pages/home.php");
        die();
    }

    $idList = $_POST['submit'];

    var_dump($_SESSION['username']);
    var_dump($idList);

    $result = deleteList($_SESSION['username'], $idList);
    var_dump($result);
    die();

    if($result)
    {
        $headerStr = "Location: ../pages/toDoLists.php";
        header($headerStr);
        die();
    }
    else
    {
        header("Location: ../pages/toDoLists.php");
    }
?>