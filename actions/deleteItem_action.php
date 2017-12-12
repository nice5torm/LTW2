<?php
    include_once('../config/init.php');
    include_once('../database/itemList.php');

    if(!isset($_POST['submit']) || !isset($_SESSION['username']) || $_POST['submit'] == "")
    {
        header("Location: ../pages/home.php");
        die();
    }

    $idItem = $_POST['submit'];

    $result = deleteItem($idItem);


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