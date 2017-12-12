<?php
include_once('../config/init.php');

function getItemsFromList($idList)
{
    global $conn;

    $stmt = $conn->prepare
    (
        'SELECT * FROM itemList WHERE idList=?'
    );
    $stmt->execute(array($idList));

    $results = array();
    while($row = $stmt->fetch())
    {
        array_push($results, $row);
    }
    return $results;
}

function createItem($user, $idList, $item )
{
    global $conn;

    $stmt = $conn->prepare
    (
	'SELECT * FROM members WHERE  user=? AND idList=?'
    );
    $stmt->execute(array($user, $idList));

    if($stmt->fetch()){
   	$stmt = $conn->prepare
    	(
        	'INSERT INTO itemList (idList,item) 
               	  	VALUES (?, ?)'
   	);
  	$stmt->execute(array($idList, $item));

    }
}

function deleteItem($user,$idList,$item){
    global $conn;

    $stmt = $conn->prepare
    (
	'SELECT * FROM members WHERE  user=? AND idList=?'
    );
    $stmt->execute(array($user, $idList));

    if($stmt->fetch()){
        $stmt = $conn->prepare
        (
            'DELETE FROM itemList
              WHERE idList = ? AND item=?'
        );
        $stmt->execute(array($idList, $item));
    }
}

function updateItem($user, $idList, $item){
    global $conn;

    $stmt = $conn->prepare
    (
	'SELECT * FROM members WHERE  user=? AND idList=?'
    );
    $stmt->execute(array($user, $idList));

    if($stmt->fetch()){    
        $stmt = $conn->prepare
        (
            'UPDATE FROM itemList SET done=TRUE
              WHERE idList = ? AND item=?'
        );
        $stmt->execute(array($idList, $item));
    }
}

