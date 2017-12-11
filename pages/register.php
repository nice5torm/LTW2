<?php
	include_once('./header.php');
?>
<section id="register">
    <h2>Register</h2>
    <form action="../actions/register_action.php" method="post">
        <div class="form-input">Username:
            <input type="text" name="username" placeholder="Enter username"> <br>
        </div>
        <div class="form-input">Password:
            <input type="password" name="password" placeholder="Enter password"> <br>
        </div>
        <div class="form-input">Age:  
            <input type="number" name="age" placeholder="Age"> <br>
        </div>
 	<div class="form-input">Email: 
            <input type="email" name="email" placeholder=" ex: user2@hotmail.com"> <br>
        </div>
        <div class="form-input">Country:
            <input type="text" name="country" placeholder="Enter Country"> <br>
        </div>
        <div class="form-input">Gender: <br>
            <input type="radio" name="gender" value="male"> Female<br>
            <input type="radio" name="gender" value="female"> Male<br>
            <input type="radio" name="gender" value="other"> Other
        </div>
        <div>
            <input type="Submit" name="submit" value="Submit" class="submit-button">
        </div>
    </form>
</section>
<?php
	include('./footer.php');
?>
