<?php

    include_once("./header.php");

?>

<?php

    include_once "../database/toDoList.php";

    if(isset($_SESSION['username']))
    {
        $results = getList($_SESSION['username']);

        ?>

        <h1>To Do Lists that I created</h1>

        <?php

        foreach($results as $result)
        {
            ?>

            <form action="../pages/toDoList.php" method="get">
                <button type="Submit" name="submit" value="<?php echo $result['idList']?>" class="submit-button"><?php echo $result['title']?></button>
            </form>

            <?php
        }

        ?>

        <h1>All To Do Lists</h1>

        <?php

        $results = getListMembership($_SESSION['username']);

        foreach($results as $result)
        {
            ?>

            <form action="../pages/toDoList.php" method="get">
                <button type="Submit" name="submit" value="<?php echo $result['idList']?>" class="submit-button"><?php echo $result['title']?></button>
            </form>

            <?php
        }
    }
    else
    {
        echo 'You must login first';
    }

?>

<?php

    include_once("./footer.php");

?>