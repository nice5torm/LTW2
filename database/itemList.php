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

function createItem( $idList, $item, $dueDate, $assignedTo)
{
    global $conn;

    $stmt = $conn->prepare
    (
        'SELECT username FROM member WHERE idList=? '
    );
    $row=$stmt->execute(array($idList));

    if()


    $stmt = $conn->prepare
    (
        'INSERT INTO itemList (idList,item, dueDate, assignedTo) 
               	  	VALUES (?, ?, ?, ?)'
   	);
  	$stmt->execute(array($idList, $item, $dueDate, $assignedTo));

}

function deleteItem($item){
    global $conn;

    $stmt = $conn->prepare
    (
        'DELETE FROM itemList
                WHERE idItem=?'
    );
    $stmt->execute(array($item));

}

function updateItem($item, $done){
    global $conn;

    $stmt = $conn->prepare
    (
       'UPDATE itemList SET done=? WHERE idItem=?'
    );
    $result = $stmt->execute(array($done, $item));

    return $result;
}

function editItem($dueDate,$assignedTo, $item)
{
    global $conn;

    $stmt = $conn->prepare
    (
        'UPDATE itemList SET dueDate=? AND assignedTo=? WHERE idItem=?'
    );
    $result = $stmt->execute(array($dueDate,$assignedTo, $item));

    return $result;


}

