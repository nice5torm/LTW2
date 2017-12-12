<?php
include_once('../database/itemList.php');
include_once('../config/init.php');

global $conn;

$idList = $_POST['submit'];
$item= $_POST['item'];

createItem($idList, $item);

header("Location: ../pages/todoList.php?submit=".$_POST['submit']);
