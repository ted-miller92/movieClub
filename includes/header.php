<?php 
session_start();
include('config.php'); 
// include('form-config.php');
// if the user has not logged in, they will be directed to login.php
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = 'Please log in first';
    header('Location:login.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial scale=1">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&family=Lobster&display=swap" rel="stylesheet"> 

    <!--Font Awesome-->
    <script src="https://use.fontawesome.com/e90390b66f.js"></script>
</head>
<body>
    <header>
    <div id="hero">
        <!-- begin logout/welcome message -->
            <!-- begin username/logout div -->
            <?php
            if(isset($_SESSION['username'])) : ?>
                <div class="welcome-logout">
                    <p><?php echo htmlspecialchars($_SESSION['username']);?></p>
                    <a href="index.php?logout='1' ">Log Out</a>
                </div> <!-- end logout/welcome div -->
            <?php endif ;?>
            <!-- end username/logout div -->
        
            <!-- begin success div -->
            <?php if(isset($_SESSION['success'])) : ?>
            <div id="success">
                <p><?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </p>
                <a href="index.php?logout='1' ">Log Out</a>
            </div><!-- end div success -->
            <script type="text/javascript">
                // close the succes div in 5 secs
                window.setTimeout("closeSuccessDiv();", 5000);
                function closeSuccessDiv(){
                document.getElementById("success").style.display=" none";
                }
            </script>
            <?php endif ; ?>
            <!-- end success div -->
        <!-- end logut/welcome messages -->

        <div id="menuIcon" onClick="hideMenu()" >
            <i class="fa fa-fw fa-bars"></i>
        </div>
        <nav>
            <ul id="menu" class ="menu">
                <?php 
                echo create_nav($nav); 
                ?>
            </ul>
        </nav>

        <a href="index.php"><h1>Movie Club</h1></a>
    </div><!-- end hero -->
</header>
