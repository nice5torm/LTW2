<?php

    include_once("./header.php");

    if(!isset($_SESSION['username']))
    {
        echo 'You must login first';
        die();
    }

    if(!isset($_GET['submit']))
    {
        echo 'No to do list selected';
        die();
    }

    include_once "../database/toDoList.php";
    include_once "../database/itemList.php";

    $toDoList = getToDoList($_GET['submit']);
    $toDoListItems = getItemsFromList($_GET['submit']);
?>

<div>
    <p>Creator: <?php echo $toDoList['creator']; ?></p>
    <p>Title: <?php echo $toDoList['title']; ?></p>
</div>

<?php

    foreach($toDoListItems as $item)
    {
        ?>

        <div>
            <p>Item: <?php echo $item['item']; ?></p>

            <?php
                if($item['done'])
                {
                    ?>
                    <input type="checkbox" name="checkbox" value="Done" checked>Done<br>
                    <?php
                }
                else
                {
                     ?>
                    <input type="checkbox" name="checkbox" value="Done">Done<br>
                     <?php
                }
            ?>

            <form action="../actions/deleteItem_action.php" method="post">
                <button type="Submit" name="submit" value="<?php echo $item[idItem] ?>" class="submit-button">Delete Item</button>
            </form>
        </div>

        <?php
    }

    ?>

        <form action="../actions/addItem_action.php" method="post">
            <input type="text" name="item" placeholder="Enter item">
            <button type="Submit" name="submit" value="<?php echo $_GET['submit']?>" class="submit-button">+</button>
        </form>

        <form action="../actions/deleteList_action.php" method="post">
                <button type="Submit" name="submit" value="<?php echo $_GET['submit']?>" class="submit-button">Delete List</button>
        </form>

<?php

    include_once("./footer.php");

?>
