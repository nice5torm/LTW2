<?php
include_once('../config/init.php');

function getListMembership($user)
{
    global $conn;

    $stmt = $conn->prepare
    (
        "SELECT * FROM toDoList JOIN members ON toDoList.idList = members.idList JOIN user ON user.username = members.user WHERE user = ?"
    );

    $stmt->execute(array($user));
    $results = array();
    while($row = $stmt->fetch())
    {
        array_push($results, $row);
    }
    return $results;
}

function getToDoList($idList)
{
    global $conn;

    $stmt = $conn->prepare
    (
        "SELECT * FROM toDoList WHERE idList = ?"
    );

    $stmt->execute(array($idList));
    return $stmt->fetch();
}

function getList($user)
{
    global $conn;

    $stmt = $conn->prepare
    (
        "SELECT * FROM toDoList WHERE creator = ?"
    );

    $stmt->execute(array($user));
    $results = array();
    while($row = $stmt->fetch())
    {
        array_push($results, $row);
    }
    return $results;
}

function createList($creator, $title) {
    global $conn;

    $stmt = $conn->prepare
    (
        'INSERT INTO toDoList (creator,title) VALUES (?,?)'
    );
    $stmt->execute(array($creator, $title));

    $stmt = $conn->prepare
    (
        'SELECT idList FROM toDoList WHERE  creator=? AND title=?'
    );
    $stmt->execute(array($creator, $title));
    $row=$stmt->fetch();

    $stmt = $conn->prepare
    (
        'INSERT INTO members (user,idList) VALUES (?,?)'
    );
    $stmt->execute(array($creator, $row));
    return $row;

}

function deleteList($creator,$idList)
{
    global $conn;

    $stmt = $conn->prepare
    (
        'SELECT * FROM toDoList WHERE creator = ? AND idList=?'
    );
    $stmt->execute(array($creator, $idList));

    if ($stmt->fetch())
    {

        $stmt = $conn->prepare
        (
            'DELETE FROM toDoList WHERE idList=? '
        );
        $result = $stmt->execute(array($idList));
        return ($result);
    }
    else
        {
        return 'Not Found';
    }
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
