<?php

    include_once("./header.php");
    include_once "../database/toDoList.php";


    //ver como mudar a pagina para a das listas

    if(isset($_SESSION['username']))
    {

        $results = getList($_SESSION['username']);
     ?>
        <div class="todoLists">
         <select name="My Lists">
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
        </select>
        <select name="All Lists" onchange=goToPage(this)>
            <spript>function goToPage(select){
                window.location = select.value;
                }
            </spript>
            <?php

            $results = getListMembership($_SESSION['username']);

            foreach($results as $result)
            {
                ?>
                <option value="../pages/todoList.php/<?php echo $result['idList']?>">
                    <?php echo $result['title']?>
                    <form action="../pages/todoList.php" method="get">
                        <button type="Submit" name="list" value="<?php echo $result['idList']?>" class="submit-button"><?php echo $result['title']?></button>
                    </form>
                </option>


                <?php
            }
            ?>
        </select>

    </div>

    <a class="logout" href="../actions/logout_action.php">Logout</a>
    <a href="./editUser.php">Edit</a>

<?php
        }
        ?>

</nav>

<?php
    include_once("./footer.php");
?>