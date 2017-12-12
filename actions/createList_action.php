<?php
include_once('../database/toDoList.php');
include_once('../config/init.php');

global $conn;

$username = $_SESSION['username'];
$title = $_POST['title'];

$result= createList($username, $title);
if(isset($result))
{
    $_SESSION['list']= $result;
}

header("Location: ../pages/todoLists.php");