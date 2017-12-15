<?php
include_once('../database/toDoList.php');
include_once('../config/init.php');

global $conn;

$username = $_SESSION['username'];
$title = $_POST['title'];
$category=$_POST['category'];

$result= createList($username, $title, $category);
if(isset($result))
{
    $_SESSION['list']= $result;
}

header("Location: ../pages/home.php");



?>