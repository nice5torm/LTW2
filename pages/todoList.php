<?php

    include_once("./header.php");

    if(!isset($_SESSION['username']))
    {
        echo 'You must login first';
        die();
    }

    if(!isset($_GET['list']))
    {
        echo 'No to do list selected';
        die();
    }

    include_once "../database/toDoList.php";
    include_once "../database/itemList.php";

    $toDoList = getToDoList($_GET['list']);
    $toDoListItems = getItemsFromList($_GET['list']);
?>

<div class="infoItem" >
    <p>Creator: <?php echo $toDoList['creator']; ?></p>
    <p>Title: <?php echo $toDoList['title']; ?></p>
</div>

<?php

    foreach($toDoListItems as $item)
    {
        ?>

        <div class="Item">
            <p>Item: <?php echo $item['item']; ?></p>

            <?php
                if($item['done'])
                {
                    ?>
                    <input type="checkbox" name="checkbox" value="<?php echo $item['idItem']; ?>" checked>Done<br>
                    <?php
                }
                else
                {
                     ?>
                    <input type="checkbox" name="checkbox" value="<?php echo $item['idItem']; ?>">Done<br>
                     <?php
                }
            ?>

            <form action="../actions/deleteItem_action.php" method="post">
                <button type="Submit" name="item" value="<?php echo $item[idItem] ?>" class="submit-button">Delete Item</button>
            </form>
        </div>

        <?php
    }

    ?>
        <div class="addItem">
            <form action="../actions/addItem_action.php" method="post">
                <input type="text" name="item" placeholder="Enter item">
                <button type="Submit" name="list" value="<?php echo $_GET['list']?>" class="submit-button">+</button>
            </form>
        </div>

        <div class="delete list">
            <form action="../actions/deleteList_action.php" method="post">
                <button type="Submit" name="list" value="<?php echo $_GET['list']?>" class="submit-button">Delete List</button>
            </form>
        </div>


<?php

    include_once("./footer.php");

?>
