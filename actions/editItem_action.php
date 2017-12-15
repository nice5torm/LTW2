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
    $idList = $_POST['idList'];
    $assignedTo = $_POST['assignedTo'];

    editUser($dueDate, $assignedTo,$idList);

    header("Location: ../pages/home.php");
}

function unsetOrEmpty($var)
{
    return (!isset($var) || $var = "" || is_null($var));
}
?>