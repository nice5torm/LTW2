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

function createItem( $idList, $item )
{
    global $conn;

   	$stmt = $conn->prepare
    	(
        	'INSERT INTO itemList (idList,item) 
               	  	VALUES (?, ?)'
   	);
  	$stmt->execute(array($idList, $item));

}

function deleteItem($item){
    global $conn;

    $stmt = $conn->prepare
    (
        'DELETE FROM itemList
                WHERE item=?'
    );
    $stmt->execute(array( $item));

}

function updateItem($item, $done){
    global $conn;

        $stmt = $conn->prepare
        (
            'UPDATE FROM itemList SET done=?
              WHERE item=?'
        );
        $stmt->execute(array($item, $done));
}

