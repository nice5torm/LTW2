<?php
include_once('../config/init.php');

function createList($creator, $title) {
    global $conn;

    $stmt = $conn->prepare
    (
        'INSERT INTO toDoList 
              (creator,title) 
                VALUES (?,?)'
    );
    $stmt->execute(array($creator, $title));
    $stmt = $conn->prepare
    (
        'SELECT idList FROM toDoList WHERE  creator=? AND title=?'
    );
    $stmt->execute(array($creator, $title));
    return $stmt->fetch();

}

function deleteList($creator,$idList){
    global $conn;

    $stmt = $conn->prepare
    (
        'SELECT * FROM toDoList 
     		WHERE creator = ? AND idList=?'
    );
    $stmt->execute(array($creator, $idList));

    if ( $stmt->fetch() ){
        $stmt = $conn->prepare
        (
            'DELETE FROM toDoList 
              WHERE idList=?'
        );
        $result=$stmt->execute(array($idList));
    }
    return $result;
}

function updateList($creator, $title, $idList){
    global $conn;

    $stmt = $conn->prepare
    (
        'SELECT * FROM toDoList 
     		WHERE creator = ? AND idList=?'
    );
    $stmt->execute(array($creator, $idList));

    if ( $stmt->fetch() ){
        $stmt = $conn->prepare
        (
            'UPDATE FROM toDoList 
              SET title=? WHERE idList=?'
        );
        $stmt->execute(array( $title, $idList));
    }
    else{
        createList($creator, $title);
    }

}
