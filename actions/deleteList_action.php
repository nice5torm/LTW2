<?php
    include_once('../config/init.php');
    include_once('../database/toDoList.php');

    if(!isset($_POST['submit']) || !isset($_SESSION['username']) || $_POST['submit'] == "")
    {
        header("Location: ../pages/home.php");
        die();
    }

    $idList = $_POST['submit'];


    $result = deleteList($_SESSION['username'], $idList);


    if($result)
    {
        $headerStr = "Location: ../pages/todoLists.php";
        header($headerStr);
    }
    else
    {
        header("Location: ../pages/todoLists.php");
    }
?>