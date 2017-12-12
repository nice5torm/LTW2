<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Welcome</title>
</head>

<body>

<?php
    include_once('../config/init.php');
?>

    <nav class="navbar">

        <?php if (!isset($_SESSION['username']))
        {
        ?>

	<a href="./home.php">Home</a>
        <div class="register">
             <a href="register.php">Register</a>
        </div>
        <form class="log-form" action="../actions/login_action.php" method="post">
             <input type="text" name="username" placeholder="Enter username"> 
             <input type="password" name="password" placeholder="Enter password">
             <input type="Submit" name="submit" value="Go" class="submit-button">

            <?php
                if(isset($_SESSION['login_result']) && $_SESSION['login_result'] == false)
                {
                     unset($_SESSION['login_result']);

                     ?>

		<script language=javascript>alert( 'Login invalido!' );</script>

                    <?php
                }
                ?>

         </form>

         <?php
        }
        else
        {
         ?>
            <a href="./home.php">Home</a>
            <a href="./todoLists.php">Lists</a>
            <a class="logout" href="../actions/logout_action.php">Logout</a>
            <a href="./editUser.php">Edit</a>

         <?php
        }
        ?>

    </nav>