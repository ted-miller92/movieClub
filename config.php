<?php
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

ob_start();  // prevents header errors before reading the whole page!
define('DEBUG', 'TRUE');  // We want to see our errors

include('credentials.php');

// initialize variables
$first_name = '';
$last_name = '';
$email = '';
$username = '';
$password = '';
$success = 'Successfully logged on';
$errors = array();

function myError($myFile, $myLine, $errorMsg)
{
if(defined('DEBUG') && DEBUG)
{
    echo 'Error in file: <b> '.$myFile.' </b> on line: <b> '.$myLine.' </b>';
        echo 'Error message: <b> '.$errorMsg.'</b>';
        die();
    }  else {
        echo 'Houston, we have a problem!';
        die();
    }   
}

// create a function for navigation so that header.php can call nav function
$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['contact.php'] = 'Contact';
$nav['movies.php'] = 'Movies';
$nav['director-of-the-day.php'] = 'Directors';

function create_nav($nav){
    $nav_list = '';
    foreach($nav as $key => $value){
        if(THIS_PAGE == $key){
            $nav_list .= '<li class="current menuItem"><a href= "'.$key.'">'.$value.'</a></li>';
        }else{
            $nav_list .= '<li class="menuItem"><a href="'.$key.'">'.$value.'</a></li>';
        }
    }
    return $nav_list;
} // end create_nav function

// data about each page

switch(THIS_PAGE){
    case 'index.php':
        $title = 'Movie Club';
        $body_class = 'home';
        $headline = 'Movie Club Home';
        break;
    case 'about.php':
        $title = 'About Movie Club';
        $body_class = 'about';
        $headline = 'About Movie Club';
        break;
    case 'login.php':
        $title = 'Login';
        $body_class = 'login';
        $headline = 'Login to Move Club';
        break;
    case 'register.php':
        $title = 'Register for Movie Club';
        $body_class = 'register';
        $headline = 'Register for Movie Club';
        break;
    case 'contact.php':
        $title = 'Contact Movie Club';
        $body_class = 'contact';
        $headline = 'Send us a Suggestion';
        break;
    case 'movies.php':
        $title = 'Movie List';
        $body_class = 'movies';
        $headline = 'Movie List';
        break;
    case 'movie-view.php':
        $title = 'Movie Details';
        $body_class = 'movie-view';
        $headline = 'Movie Details';
        break;
    case 'director-of-the-day.php':
        $title = 'Director of the Day';
        $body_class = 'director-of-the-day';
        $headline = 'Director of the Day';
        break;
}