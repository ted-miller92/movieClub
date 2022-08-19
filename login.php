<?php

include('server.php');
include('includes/form-header.php');

?>
<div id="wrapper">
    <h1>Movie Club</h1>
    <div id="formWrapper">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post">
            <!-- <fieldset> -->
            <label for="username">Username</label>
            <input name="username" type="text" value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']) ;?>">

            <label for="password">Password</label>
            <input name="password" type="password">
            <div class="buttonWrapper">
                <button type="submit" class="button" name="login_user">Login</button>

                <button type="button" class="button" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF'] ;?>' ">Reset</button>
            </div><!-- end buttonWrapper -->
            <?php include('errors.php'); ?>
            <!-- </fieldset> -->
        </form>
        <h3>Not a member?</h3>
        <div class="buttonWrapper">
            
            <p><a class="button" href="register.php">Click here</a> to register</p>
        </div><!--end buttonWrapper-->
    </div><!-- end formWrapper -->
</div><!-- end wrapper -->
</body>
</html>