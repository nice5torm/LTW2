<?php
 
    include_once "../config/init.php";
 
    $method = $_SERVER['REQUEST_METHOD'];
 
    if($method == 'GET')
    {
        handleGet();
    }
    else if($method == 'POST')
    {
        handlePost();
    }
    else
    {
        echo "Unknown Method";
    }
 
?>