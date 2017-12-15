<?php
include_once('../config/init.php');
include_once('../database/itemList.php');

if(unsetOrEmpty($_SESSION['username']) || !unsetOrEmpty($_POST['title']) || !unsetOrEmpty($_POST['assignedTo']))
{
    $_SESSION['Edit_Error'] = "Some field is unset";

    header("Location: ../pages/editItem.php");
}
else
{
    $username=$_SESSION['username'];
    $title = $_POST['title'];
    $idList = $_POST['idList'];
    $assignedTo = $_POST['assignedTo'];

    editUser($username,$title, $idList, $assignedTo);

    header("Location: ../pages/home.php");
}

function unsetOrEmpty($var)
{
    return (!isset($var) || $var = "" || is_null($var));
}
?>