<?php

// what is a session?
session_start();
// a session is a way to store variables across pages (staying logged on)

include('config.php');
// include('includes/header.php');

// connect to the database
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

// register the user
if(isset($_POST['reg_user'])){
    $first_name = mysqli_real_escape_string($iConn, $_POST['first_name']);

    $last_name = mysqli_real_escape_string($iConn, $_POST['last_name']);

    $email = mysqli_real_escape_string($iConn, $_POST['email']);

    $username = mysqli_real_escape_string($iConn, $_POST['username']);

    $password1 = mysqli_real_escape_string($iConn, $_POST['password1']);

    $password2 = mysqli_real_escape_string($iConn, $_POST['password2']);

    if(empty($first_name)){
        array_push($errors, 'First Name required');
    }
    if(empty($last_name)){
        array_push($errors, 'Last Name required');
    }
    if(empty($email)){
        array_push($errors, 'Email required');
    }
    if(empty($username)){
        array_push($errors, 'Username required');
    }
    if(empty($password1)){
        array_push($errors, 'Password required');
    }
    if(empty($password2)){
        array_push($errors, 'Please confirm your password');
    }
    if($password1 !== $password2){
        array_push($errors, 'Passwords must match');
    }

    // we are checking username and password and selecting it frfom the table

    // this function prevents multiples of the same username
    $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1 ";

    $result = mysqli_query($iConn, $user_check_query) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

    $rows = mysqli_fetch_assoc($result);

    if($rows){
        if($rows['username'] == $username){
            array_push($errors, 'Username already exists');
        }
        if($rows['email'] == $email){
            array_push($errors, 'Email is already in use');
        }
    } // end if(rows)

    // if no errors, 

    if(count($errors) < 1){
        // function md5() will return a 32 character hexdecimal password
        $password = md5($password1);

        // insert registration data into table in DB
        $query = "INSERT INTO users(first_name, last_name, email, username, password) VALUES ('$first_name', '$last_name', '$email', '$username', '$password')";

        mysqli_query($iConn, $query);

        $SESSION['username'] = $username;
        $SESSION['success'] = $success;

        header('Location:login.php');
    } // end error counting 
} // end if(isset(reg_user))

if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($iConn, $_POST['username']);
    $password = mysqli_real_escape_string($iConn, $_POST['password']);

    if(empty($username)){
        array_push($errors, 'Please enter your username');
    }
    if(empty($password)){
        array_push($errors, 'Please enter your password');
    }

    if(count($errors) == 0){
        $password = md5($password);
        // now make sure there is only one username/password
        // we will SELECT from table

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        $results = mysqli_query($iConn, $query);

        // if username/password is equal to one (1) it's all good
        if(mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = $success;
            // if we are successful, we will be directed to index.php

            header('Location:index.php');
        } else {
            array_push($errors, 'Wrong username or password');
        }
    } // end if(count($errors) == 0)
} // end if(isset()) for login