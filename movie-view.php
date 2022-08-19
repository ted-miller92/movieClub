<?php include('includes/header.php');?>
<link rel="stylesheet" href="css/movie-view.css" type="text/css">
<?php 

        //if isset $_GET
        if(isset($_GET['id'])){
            $id = (int)$_GET['id'];
        }else{
            header('Location: movies.php');
        }

        $sql = 'SELECT * FROM movies WHERE movie_id = '.$id.' ';

        // connect to the database using mysqli_connect() function
        $iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

        // create a variable $result
        $result = mysqli_query($iConn, $sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

        if(mysqli_num_rows($result) > 0){
    
            while($row = mysqli_fetch_assoc($result)) {
                $movie_id = stripslashes($row['movie_id']);
                $movie_name = stripslashes($row['movie_name']);
                $movie_director = stripslashes($row['movie_director']);
                $movie_genre = stripslashes($row['movie_genre']);
                $movie_year = stripslashes($row['movie_year']);
                $movie_synopsis = stripslashes($row['movie_synopsis']);
                $movie_length = stripslashes($row['movie_length']);
                $movie_quote = stripslashes($row['movie_quote']);
                $feedback = '';
                $title = 'Details for '.$movie_name.'';
            }//end while
        }else {
            $feedback = 'Something is not working.';
        }
        
?>

<div id="wrapper">
<h2><?php echo $headline; ?></h2>
    <main>
        <?php

        if($feedback == ''){
            $classColor = '';
            if($movie_id % 2 == 0){
                $classColor = 'purple';
            } else {
                $classColor = 'orange';
            }

            echo '<div class="movieView '.$classColor.'">';
                echo '<h3>'.$movie_name.'</h3>';
                echo '<p>'.$movie_director.'</p>';
                echo '<p>'.$movie_genre.'</p>';
                echo '<p>'.$movie_year.'</p>';
                echo '<p>'.$movie_length.' minutes</p>';
                echo '<p>'.$movie_synopsis.'</p>';
                echo '<a href="movies.php">Back to Movies</a>';
            echo '</div><!-- end movieViewDiv-->';
        }
        ?>
        
    </main>
    <aside>
        <div id="movieAside">
            <?php
            $movieStill = str_replace(' ', '_', $movie_name) . '_still' . '.jpg';
            ?>
            <div id="photoWrapper">
                <img src="images/stills/<?php echo $movieStill; ?>" alt="<?php echo $movie_name; ?>">
            </div><!-- end photoWrapper -->
            <p>"<?php echo $movie_quote;?>"</p>
        </div><!-- end movieAside -->
    </aside>
</div><!-- end wrapper -->
<?php include('includes/footer.php'); ?>