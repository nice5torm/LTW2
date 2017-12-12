<?php

    include_once 'API_base.php';

    function handleGet()
    {
        if(!isset($_GET['idItem']) || !isset($_GET['checked']))
        {
            echo "Unset Property";
        }
        else
        {
            include_once "../database/itemList.php";

            $result = updateItem($_GET['idItem'], $_GET['checked']);

            echo $result;
        }
    }
?>