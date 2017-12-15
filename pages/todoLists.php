<?php

include_once "../database/toDoList.php";

if(isset($_SESSION['username']))
{
    $results = getList($_SESSION['username']);

    ?>
    <div class="container todoLists">
        <h2>To Do Lists that I created</h2>

        <?php

        foreach($results as $result)
        {
            ?>

            <div class="List">
                <form action="../pages/todoList.php" method="get">
                    <button type="Submit" name="list" value="<?php echo $result['idList']?>" class="submit-button"><?php echo $result['title']?></button>
                </form>
            </div>
            <?php
        }
        ?>

        <h2>All To Do Lists</h2>

        <?php

        $results = getListMembership($_SESSION['username']);

        foreach($results as $result)
        {
            ?>
            <div class="List2">
                <form action="../pages/todoList.php" method="get">
                    <button type="Submit" name="list" value="<?php echo $result['idList']?>" class="submit-button"><?php echo $result['title']?></button>
                </form>
            </div>
            <?php
        }
        ?>

    </div>

    <div class="container addList">
        <h2>New list</h2>
        <form action="../actions/createList_action.php" method="post">
            <div class="form-input">List:
                <input type="text" name="title" placeholder="Enter title"> <br>
            </div>
            <div class="form-input">Category:
                <input type="text" name="category" placeholder="Enter category"> <br>
            </div>
            <div>
                <button type="Submit" name="list" value="addList" class="submit-button">Add</button>
            </div>
        </form>
    </div>

    <?php
}
else
{
    echo 'You must login first';
}

?>