<?php include('includes/header.php'); ?>


<?php 

date_default_timezone_set('America/Los_Angeles');

if(isset($_GET['today'])){
    $today = $_GET['today'];
}else{
    $today = date('l');
}
$day_array = array(
    "" => "Sunday",
    "" => "Monday",
    "" => "Tuesday",
    "" => "Wednesday",
    "" => "Thursday",
    "" => "Friday",
    "" => "Saturday",
);
// switch

switch($today){
    case 'Sunday':
        $director = 'Paul Thomas Anderson';
        $bio = 'Anderson was born in 1970. He was one of the first of the "video store" generation of film-makers. His father was the first man on his block to own a V.C.R., and from a very early age Anderson had an infinite number of titles available to him. While film-makers like Spielberg cut their teeth making 8 mm films, Anderson cut his teeth shooting films on video and editing them from V.C.R. to V.C.R.';
        $photo = 'images/directors/paul_thomas_anderson.jpg';
        $movies_array = array(
            'Magnolia', 'Punch Drunk love', 'There Will Be Blood', 'Boogie Nights'
        );
        break;
    case 'Monday':
        $director = 'Sofia Coppola';
        $bio = 'Sofia Coppola was born on May 14, 1971 in New York City, New York, USA as Sofia Carmina Coppola. She is a director, known for Somewhere (2010), Lost in Translation (2003), and Marie Antoinette (2006). She is the first American woman and third woman overall to be nominated for the Best Director Academy Award.';
        $photo = 'images/directors/sofia_coppola.jpg';
        $movies_array = array(
            'Marie Antoinette', 'Lost in Translation', 'The Virgin Suicides', 'One The Rocks'
        );
        break;
    case 'Tuesday':
        
        $director = 'Taika Watiti';
        $bio = 'Taika Waititi, also known as Taika Cohen, hails from the Raukokore region of the East Coast of New Zealand, and is the son of Robin (Cohen), a teacher, and Taika Waititi, an artist and farmer. His father is Maori (Te-Whanau-a-Apanui), and his mother is of Ashkenazi Jewish, Irish, Scottish, and English descent. Taika has been involved in the film industry for several years, initially as an actor, and now focusing on writing and directing.';
        $photo = 'images/directors/taika_watiti.jpg';
        $movies_array = array(
            'Jojo Rabbit', 'What We Do in the Shadows', 'Hunt for the Wilderpeople', 'Thor: Ragnarok'
        );
        break;
    case 'Wednesday':
        
        $director = 'Alfonso Cuaron';
        $bio = 'Alfonso Cuaron is a Mexican film director, film producer, screenwriter, cinematographer and film editor.Cuarón is the first Mexico-born filmmaker to win the Academy Award for Best Director. He has been nominated for Academy Awards in six different categories, a record he shares with Walt Disney and George Clooney. Cuarón has received 11 Academy Award nominations';
        $photo = 'images/directors/alfonso_cuaron.jpg';
        $movies_array = array(
            'Roma', 'Y Tu Mama Tambien', 'Children of Men', 'Gravity'
        );
        break;
    case 'Thursday':
        
        $director = 'Christopher Nolan';
        $bio = 'Best known for his cerebral, often nonlinear, storytelling, acclaimed writer-director Christopher Nolan was born on July 30, 1970, in London, England. Over the course of 15 years of filmmaking, Nolan has gone from low-budget independent films to working on some of the biggest blockbusters ever made.';
        $photo = 'images/directors/christopher_nolan.jpg';
        $movies_array = array(
            'Batman Begins', 'Dunkirk', 'Inception', 'Tenet'
        );
        break;
    case 'Friday':
        
        $director = 'Kathryn Bigelow';
        $bio = 'A very talented painter, Kathryn spent two years at the San Francisco Art Institute. At 20, she won a scholarship to the Whitney Museum\'s Independent Study Program. She was given a studio in a former Offtrack Betting building, literally in an old bank vault, where she made art and waited to be critiqued by people like Richard Serra, Robert Rauschenberg and Susan Sontag. Later she earned a scholarship to study film at Columbia University School of Arts, graduating in 1979. She was also a member of the British avant garde cultural group, Art and Language. Kathryn is the only child of the manager of a paint factory and a librarian.';
        $photo = 'images/directors/kathryn_bigelow.jpg';
        $movies_array = array(
            'The Hurt Locker', 'Zero Dark Thirty', 'Strange Days', 'Near Dark'
        );
        break;
    case 'Saturday':
        
        $director = 'M. Night Shyamalan';
        $bio = 'Born in Puducherry, India, and raised in the posh suburban Penn Valley area of Philadelphia, Pennsylvania, M. Night Shyamalan is a film director, screenwriter, producer, and occasional actor, known for making movies with contemporary supernatural plots. Shyamalan gained international recognition when he wrote and directed 1999\'s The Sixth Sense (1999), which was a commercial success and later nominated for six Academy Awards, including Best Picture, Best Director and Best Original Screenplay.';
        $photo = 'images/directors/m_night_shyamalan.jpg';
        $movies_array = array(
            'The Sixth Sense', 'Unbreakable', 'The Village', 'Signs'
        );
        break;    
    }
?>
<link rel="stylesheet" href="css/directors.css" type="text/css">
<div id="wrapper">
    <h2><?php echo $headline; ?></h2>
    <h3><?php echo $today;?> is <?php echo $director;?> Day</h3>
    <aside>
        <div id="photoWrapper">
            <img id="directorPhoto" src="<?php echo $photo;?>" alt="<?php echo $director; ?>">
        </div>
        <h5>Movies by <?php echo $director; ?></h5>
        <ul>
            <?php foreach($movies_array as $movie): ?>
                <li><?php echo $movie;?></li>
            <?php endforeach;?>
        </ul>
    </aside>
    <main>
        
        <p><?php echo $bio;?></p>
        
        
    </main>
    
</div>
<?php include('includes/footer.php'); ?>