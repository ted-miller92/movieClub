<?php 
// register.php
include('server.php');
include('includes/form-header.php');






?>

<div id="wrapper">
    <h1>Movie Club</h1>
    <div id="formWrapper">
    <h2>Register Today</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
        <label for="first_name">First Name</label>
        <input name="first_name" type="text" value="<?php if(isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name']);?>">

        <!-- <input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name']);?>"> -->

        <label for="last_name">Last Name</label>
        <input name="last_name" type="text" value="<?php if(isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name']) ;?>">

        <label for="email">Email</label>
        <input name="email" type="text" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']) ;?>">

        <label for="username">Username</label>
        <input name="username" type="text" value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']) ;?>">
        
        <label for="password1">Enter Password</label>
        <input name="password1" type="password" value="<?php if(isset($_POST['password1'])) echo htmlspecialchars($_POST['password1']) ;?>">

        <label for="password2">Confirm Password</label>
        <input name="password2" type="password" value="<?php if(isset($_POST['password2'])) echo htmlspecialchars($_POST['password2']) ;?>">
        <div class="buttonWrapper">
            <button type="submit" name="reg_user" class="button">Register</button>

            <button type="button" onclick="window.location.href='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'">Reset</button>
        </div><!--end buttonWrapper -->
        <?php include('errors.php'); ?>
    </form>
    
    <h3>Already registered?</h3>
    <div class="buttonWrapper">
        <p><a class="button" href="login.php">Click here</a> to log in</p>
    </div>
</div><!-- end formWrapper -->
</div><!-- end wrapper -->
</body>
</html>