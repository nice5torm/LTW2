<?php
include_once('../config/init.php');

function createList($user, $title) {
    global $conn;

    $stmt = $conn->prepare
    (
        'INSERT INTO toDoList 
              (idUser,title) 
                VALUES (?,?)'
    );
    $stmt->execute(array($user, $title));
}

function deleteList($user,$title){
    global $conn;

    $stmt = $conn->prepare
    (
        'SELECT * FROM toDoList 
     		WHERE idUser = ? AND title=?'
    );
    $stmt->execute(array($user, $title));

    if ( $stmt->fetch() ){
        $stmt = $conn->prepare
        (
            'DELETE FROM toDoList 
              WHERE idUser = ? AND title=?'
        );
        $stmt->execute(array($user, $title));
    }
    else{
        echo "That List doesn't exist!";
    }
}
