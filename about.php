<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="css/about.css" type="text/css">
<div id="wrapper">
    <h2><?php echo $headline; ?></h2>
    <main>
        <h3>About Movie Club</h3>
        <p>Join a community of movie lovers and enthusiasts. This a place that welcomes film buffs and fans of any and all cinema.</p>
        <p>As a registered member, you can view the growing database of movies. If you have a film you'd like added, <a target="_blank" href="contact.php">hit us up</a> with your suggestion.</p>

        <h3>About the Website</h3>
        <p>This website uses PHP as a server-side scripting language to offer an interactive experience.</p>
        <p>The <a href="movies.php">Movie List</a> page queries a database using MySQLI and renders a "movie-view" page that includes extra details about the movie.</p>
        <p>The <a href="director-of-the-day.php">Directors page</a> is a switch page that displays information on seven different popular directors, depending on the day of the week.</p>
        <p>Users can use the <a href="contact.php">Contact page</a> to fill out a form with information about a movie that they would like to be included in the list, and this information is emailed to a site manager. In the future, the form will be tweaked to allow direct insertion into the database and the ability to update and edit movies that are already in the database.</p>

    </main>
    <aside>
        
    </aside>
</div>
<?php include('includes/footer.php'); ?>