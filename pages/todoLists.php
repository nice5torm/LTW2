<?php

    include_once("./header.php");

?>

<?php

    include_once "../database/toDoList.php";

    if(isset($_SESSION['username']))
    {
        $results = getList($_SESSION['username']);

        ?>
        <div class="todoLists">
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
                    <form action="../pages/todoList.php" method="get">
                        <button type="Submit" name="list" value="<?php echo $result['idList']?>" class="submit-button"><?php echo $result['title']?></button>
                    </form>

                <?php
            }
            ?>

        </div>
        <div class="createList">
            <form action="../actions/createList_action.php" method="post">
                <input type="text" name="title" placeholder="Enter title">
                <input type="Submit" name="submit" value="+" class="submit-button">
            </form>
        </div>

        <?php
    }
    else
    {
        echo 'You must login first';
    }

?>

<?php

    include_once("./footer.php");

?>