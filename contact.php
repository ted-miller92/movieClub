<?php
// cannot echo above the doctype declaration
// simply making a change to test new PAT
$first_name = '';
$movie_name = '';
$director = '';
$email = '';
$rating = '';
$phone = '';
$genre = '';
$streaming = '';
$synopsis = '';
$privacy = '';

$first_name_error = '';
$movie_name_error = '';
$director_error = '';
$email_error = '';
$rating_error = '';
$phone_error = '';
$genre_error = '';
$streaming_error = '';
$synopsis_error = ''; 
$privacy_error = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // error handling
    if(empty($_POST['first_name'])){
        $first_name_error = 'Please fill out your first name';
    }else{
        $first_name = $_POST['first_name'];
    }
    if(empty($_POST['movie_name'])){
        $movie_name_error = 'Please enter the movie name';
    }else{
        $movie_name = $_POST['movie_name'];
    }
    if(empty($_POST['director'])){
        $director_error = 'Please enter the director\'s name';
    }else{
        $director = $_POST['director'];
    }
    if(empty($_POST['email'])){
        $email_error = 'Please enter your email address';
    }else{
        $email = $_POST['email'];
    }
    if(empty($_POST['rating'])){
        $rating_error = 'Rating required';
    }else{
        $rating = $_POST['rating'];
    }
    if(empty($_POST['genre'])){
        $genre_error = 'Please select genre(s)';
    }else{
        $genre = $_POST['genre'];
    }
    if($_POST['streaming'] == NULL){
        $streaming_error = 'Select at least one';
    }else{
        $streaming = $_POST['streaming'];
    }
    if(empty($_POST['synopsis'])){
        $synopsis_error = 'Please share your synopsis with us';
    }else {
        $synopsis = $_POST['synopsis'];
    }
    if(empty($_POST['privacy'])){
        $privacy_error = 'Please agree to terms';
    }else{
        $privacy = $_POST['privacy'];
    }
    $sticky_phone = '';
    if(empty($_POST['phone'])) {  // if empty, type in your number
        $phone_error = 'Please enter your phone number';
    }elseif(array_key_exists('phone', $_POST)){
        if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone'])){
            $phone_error = 'Invalid format. Enter in format xxx-xxx-xxxx';
            $sticky_phone = $_POST['phone'];
            unset($_POST['phone']);
        }else{
        $phone = $_POST['phone'];
        }
    }
    // end error handling

    // genre function
    function my_genre(){
        $genre_return = '';
        if(!empty($_POST['genre'])){
            $genre_return = implode(', ', $_POST['genre']);
        };
        return $genre_return;
    }

    if(isset($_POST['first_name'],
    $_POST['movie_name'],
    $_POST['director'],
    $_POST['email'],
    $_POST['phone'],
    $_POST['rating'],
    $_POST['genre'],
    $_POST['streaming'],
    $_POST['synopsis'],
    $_POST['privacy']
        )){
            $to = 'szemeo@mystudentswa.com'; // changed to Olga's email for grading purposes
            $subject = 'Test from Ted Miller contact.php' .date('m/d/y') ;
            $body = '
            First name: '.$first_name.' '.PHP_EOL.'
            Movie name: '.$movie_name.' '.PHP_EOL.'
            Director: '.$director.' '.PHP_EOL.'
            Rating: '.$rating.' '.PHP_EOL.' 
            Email: '.$email.' '.PHP_EOL.'
            Phone: '.$phone.' '.PHP_EOL.'
            Streaming: '.$streaming.' '.PHP_EOL.'
            Genre(s): '.my_genre().' '.PHP_EOL.'
            Synopsis: '.$synopsis.' '.PHP_EOL.'
            ';

            $headers = array(
                'From' => 'noreply@scriptedmiller.com',
                'Reply-to' => ''.$email.'',
                
            );

            mail($to, $subject, $body, $headers);
            header('location: thx.php');
        }
} // end if server request
?>
<?php include('includes/header.php');?>
<link rel="stylesheet" href="css/form.css" type="text/css">
<div id="wrapper">
<h2><?php echo $headline; ?></h2>
    <main>
        <h3>Contact Us</h3>
        <p>Do you have a movie you would like us to include in our list?</p>
        <p>Fill out the form below to send us some details and we will be sure to include it in our database!</p>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <label for="first_name">First Name</label>
                <span class="error"><?php echo $first_name_error;?></span>
                <input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name']);?>">
                

                <label for="movie_name">Movie Name</label>
                <span class="error"><?php echo $movie_name_error;?></span>
                <input type="text" name="movie_name" value="<?php if(isset($_POST['movie_name'])) echo htmlspecialchars($_POST['movie_name']);?>">
                

                <label for="director">Director</label>
                <span class="error"><?php echo $director_error;?></span>
                <input type="text" name="director" value="<?php if(isset($_POST['director'])) echo htmlspecialchars($_POST['director']);?>">
                

                <label for="email">Email</label>
                <span class="error"><?php echo $email_error;?></span>
                <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">
                

                <label for="phone">Phone Number</label>
                <span class="error"><?php echo $phone_error;?></span>
                <input type="tel" placeholder="xxx-xxx-xxxx" name="phone" value="<?php echo $sticky_phone;?>">
                

                <label for="rating">Rating</label>
                <span class="error"><?php echo $rating_error;?></span>
                <ul>
                    <li><input type="radio" name="rating" value="g" <?php if(isset($_POST['rating']) && $_POST['rating'] == 'g') echo 'checked="checked"';?>>G</li>
                    <li><input type="radio" name="rating" value="pg" <?php if(isset($_POST['rating']) && $_POST['rating'] == 'pg') echo 'checked="checked"';?>>PG</li>
                    <li><input type="radio" name="rating" value="pg13" <?php if(isset($_POST['rating']) && $_POST['rating'] == 'pg13') echo 'checked="checked"';?>>PG-13</li>
                    <li><input type="radio" name="rating" value="r" <?php if(isset($_POST['rating']) && $_POST['rating'] == 'r') echo 'checked="checked"';?>>R</li>
                </ul>
                

                <label for="genre">Movie Genre(s)</label>
                <span class="error"><?php echo $genre_error;?></span>
                <ul>
                    <li><input type="checkbox" name="genre[0]" value="action" <?php if(isset($_POST['genre']) && in_array('avtion',$genre)) echo 'checked="checked"';?>>Action</li>
                    <li><input type="checkbox" name="genre[1]" value="drama" <?php if(isset($_POST['genre']) && in_array('drama', $genre)) echo 'checked="checked"'; ?>>Drama</li>
                    <li><input type="checkbox" name="genre[2]" value="comedy" <?php if(isset($_POST['genre']) && in_array('comedy', $genre)) echo 'checked="checked"'; ?>>Comedy</li>
                    <li><input type="checkbox" name="genre[3]" value="horror" <?php if(isset($_POST['genre']) && in_array('horror', $genre)) echo 'checked="checked"'; ?>>Horror</li>
                    <li><input type="checkbox" name="genre[4]" value="romance" <?php if(isset($_POST['genre']) && in_array('romance', $genre)) echo 'checked="checked"'; ?>>Romance</li>
                    <li><input type="checkbox" name="genre[5]" value="family" <?php if(isset($_POST['genre']) && in_array('family', $genre)) echo 'checked="checked"'; ?>>Family</li>
                    <li><input type="checkbox" name="genre[6]" value="thriller" <?php if(isset($_POST['genre']) && in_array('thriller', $genre)) echo 'checked="checked"'; ?>>Thriller</li>
                </ul>
                

                <label for="streaming">Where can we watch this movie?</label>
                <span class="error"><?php echo $streaming_error;?></span>
                <select name="streaming">
                    <option value="" NULL <?php if(isset($_POST['streaming']) && $_POST['streaming'] == NULL) echo 'selected';?>>Select One</option>
                    <option value="netflix" <?php if(isset($_POST['streaming']) && $_POST['streaming'] == 'netflix') echo 'selected';?>>Netflix</option>
                    <option value="hulu" <?php if(isset($_POST['streaming']) && $_POST['streaming'] == 'hulu') echo 'selected';?>>Hulu</option>
                    <option value="hbo" <?php if(isset($_POST['streaming']) && $_POST['streaming'] == 'hbo') echo 'selected';?>>HBO</option>
                    <option value="kanopy" <?php if(isset($_POST['streaming']) && $_POST['streaming'] == 'kanopy') echo 'selected';?>>Kanopy</option>
                    <option value="prime" <?php if(isset($_POST['streaming']) && $_POST['streaming'] == 'prime') echo 'selected';?>>Prime</option>
                    <option value="vudu" <?php if(isset($_POST['streaming']) && $_POST['streaming'] == 'vudu') echo 'selected';?>>Vudu</option>
                    <option value="none" <?php if(isset($_POST['streaming']) && $_POST['streaming'] == 'none') echo 'selected';?>>N/A</option>
                </select>
                

                <label for="synopsis">Synopsis</label>
                <span class="error"><?php echo $synopsis_error;?></span>
                <textarea name="synopsis" ><?php if(isset($_POST['synopsis'])) echo htmlspecialchars($_POST['synopsis']);?></textarea>
                
                

                <label for="privacy">Privacy</label>
                <span class="error"><?php echo $privacy_error;?></span>
                <ul>
                    <li><input type="radio" name="privacy" <?php if(isset($_POST['privacy'])) echo 'checked="checked"';?>>I agree</li>
                </ul>
                
                <div id="buttonWrapper">
                    <input class="button" type="submit" value="Submit">
                    <a class="button" href="">Reset</a>
                </div>
        </form>
    </main>
</div><!-- end wrapper -->
<?php include('includes/footer.php');?> 