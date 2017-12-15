<?php
    include_once('../config/init.php');
    include_once('../database/toDoList.php');

    if(!isset($_POST['list']) || !isset($_SESSION['username']) || $_POST['list'] == "")
    {
        header("Location: ../pages/home.php");
        die();
    }

    $idList = $_POST['list'];


    deleteList($_SESSION['username'], $idList);
    header("Location: ../pages/home.php");

?>