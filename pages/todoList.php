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

<div class="infoItem container" >
    <p><b>Creator:</b> <?php echo $toDoList['creator']; ?></p>
    <p><b>Title:</b> <?php echo $toDoList['title']; ?></p>
    <p><b>Category:</b> <?php echo $toDoList['category']; ?></p>
</div>

<?php

    foreach($toDoListItems as $item)
    {
        ?>

        <div class="Item container">
            <p><b>Item:</b> <?php echo $item['item']; ?></p>
            <p><b>Due Date:</b> <?php echo $item['dueDate']; ?></p>
            <p><b>Assigned to:</b> <?php echo $item['assignedTo']; ?></p>

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
                <button type="Submit" name="item" value="<?php echo $item['idItem'] ?>" class="submit-button"><i class="fa fa-times" aria-hidden="true"></i></button>
            </form>
        </div>

        <?php
    }

    ?>

    <div class="container addItem">
        <h2>New item</h2>
        <form action="../actions/createItem_action.php" method="post">
            <div class="form-input">Name:
                <input type="text" name="item" placeholder="Enter name"> <br>
            </div>
            <div class="form-input">DueDate:
                <input type="date" name="dueDate" placeholder="Enter due date"> <br>
            </div>
            <div class="form-input">AssignedTo:
                <input type="text" name="assignedTo" placeholder="Enter assigned to"> <br>
            </div>
            <div>
                <button type="Submit" name="list" value="<?php echo $_GET['list']?>" class="submit-button">Add</button>
            </div>
        </form>
    </div>

    <div class="container listControl">
        <div class="edit list">
            <form action="./editList.php" method="post">
                <button type="Submit" name="list" value="<?php echo $_GET['list']?>" class="submit-button">Edit List</button>
            </form>
        </div>

        <div class="delete list">
            <form action="../actions/deleteList_action.php" method="post">
                <button type="Submit" name="list" value="<?php echo $_GET['list']?>" class="submit-button">Delete List</button>
            </form>
        </div>
    </div>

<?php

    include_once("./footer.php");

?>
