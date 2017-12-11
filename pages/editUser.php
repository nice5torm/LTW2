<?php

    include_once("./header.php");
?>
<section id="edit">
    <h2>Edit User</h2>
    <form action="../actions/editUser_action.php" method="post">
        <div class="form-input">Password:
            <input type="password" name="password" placeholder="Enter password"> <br>
        </div>
        <div class="form-input">Country:
            <input type="text" name="country" placeholder="Enter Country"> <br>
        </div>
        <div class="form-input">Email:
            <input type="email" name="email" placeholder=" ex: user2@hotmail.com"> <br>
        </div>
        <div>
            <input type="Submit" name="submit" value="Submit" class="submit-button">
        </div>
    </form>
</section>
<?php
    include_once("./footer.php");
?>

