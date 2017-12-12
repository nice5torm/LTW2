<?php
include_once('../database/itemList.php');
include_once('../config/init.php');

global $conn;

$username = $_SESSION['username'];
$idList = $_SESSION['list'];
$item= $_POST['item'];

createItem($username, $idList, $item);

header("Location: ../pages/home.php");
