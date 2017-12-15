<?php
include_once('../config/init.php');
include_once('../database/toDoList.php');

if(!unsetOrEmpty($_POST['category']) || !unsetOrEmpty($_POST['title']))
{
    $_SESSION['Edit_Error'] = "Some field is unset";

    header("Location: ../pages/editList.php");
}
else
{
    $idList = $_POST['idList'];
    $title = $_POST['title'];
    $category = $_POST['category'];

    editUser($idItem, $dueDate, $assignedTo);

    header("Location: ../pages/home.php");
}

function unsetOrEmpty($var)
{
    return (!isset($var) || $var = "" || is_null($var));
}
?>