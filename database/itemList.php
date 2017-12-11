<?php
include_once('../config/init.php');

function createItem($idUser, $idList,$item, $done) {
    global $conn;

    $stmt = $conn->prepare
    (
        'INSERT INTO itemList 
              (idList,item) 
                 VALUES (?, ?)'
    );

    $stmt->execute(array($idList,$item));

}



function deleteItem($list,$item){
    global $conn;

    $stmt = $conn->prepare
    (
        'SELECT * FROM toDoList 
     		WHERE idList = ? AND item=?'
    );
    $stmt->execute(array($list, $item));

    if ( $stmt->fetch() ){
        $stmt = $conn->prepare
        (
            'DELETE FROM toDoList 
              WHERE idList = ? AND item=?'
        );
        $stmt->execute(array($list, $item));
    }
    else{
        echo "That item doesn't exist!";
    }
}

