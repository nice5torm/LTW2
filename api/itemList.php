<?php

    include_once 'API_base.php';

    function handlePost()
    {
        if(!isset($_POST['idItem']) || !isset($_POST['checked']))
        {
            echo "Unset Property";
        }
        else
        {
            include_once "../database/itemList.php";

            if($_POST['checked'] == "true")
            {
                updateItem($_POST['idItem'], true);
                echo 'set to true';
            }
            else
            {
                updateItem($_POST['idItem'], false);
                echo 'set to false';
            }
        }
    }
?>