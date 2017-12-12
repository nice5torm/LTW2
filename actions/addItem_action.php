<?php
include_once('../database/itemList.php');
include_once('../config/init.php');

global $conn;

$idList = $_POST['list'];
$item= $_POST['item'];

createItem($idList, $item);

header("Location: ../pages/todoList.php?list=".$_POST['list']);
