<?php
include_once('../config/init.php');
include_once('../database/itemList.php');

if(unsetOrEmpty($_SESSION['username']) || !unsetOrEmpty($_POST['dueDate']) || !unsetOrEmpty($_POST['assignedTo']))
{
    $_SESSION['Edit_Error'] = "Some field is unset";

    header("Location: ../pages/editItem.php");
}
else
{
    $dueDate = $_POST['dueDate'];
    $idList = $_POST['list'];
    $assignedTo = $_POST['assignedTo'];
    $idItem= $_POST['idItem'];

    $result= editItem($dueDate, $assignedTo,$idItem, $idList);

    if($result==-1){
        $_SESSION['Edit_Error'] = "assigned as to be a member";
        header("Location: ../pages/editItem.php");
    }

    header("Location: ../pages/todoList.php?list=" . $_POST['list']);
}

function unsetOrEmpty($var)
{
    return (!isset($var) || $var = "" || is_null($var));
}
?>