<?php

    include_once('../database/itemList.php');
    include_once('../config/init.php');

    global $conn;

    $idList = $_POST['list'];
    $item = $_POST['item'];
    $dueDate = $_POST['dueDate'];
    $assignedTo = $_POST['assignedTo'];

    $result = createItem($idList, $item, $dueDate, $assignedTo);

    header("Location: ../pages/todoList.php?list=" . $_POST['list']);

?>