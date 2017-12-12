<?php
    include_once('../config/init.php');
    include_once('../database/toDoList.php');

    if(!isset($_POST['list']) || !isset($_SESSION['username']) || $_POST['list'] == "")
    {
        header("Location: ../pages/home.php");
        die();
    }

    $idList = $_POST['list'];


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