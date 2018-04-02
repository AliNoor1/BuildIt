<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 3/19/18
 * Time: 9:47 PM
 */

// grab things from the post fields in the register form
// use trim to get rid of white spaces, etc
$firstname = trim(mysqli_real_escape_string($conn,$_POST['firstname']));
$lastname = trim(mysqli_real_escape_string($conn,$_POST['lastname']));
$city = trim(mysqli_real_escape_string($conn,$_POST['city']));
$state = trim(mysqli_real_escape_string($conn,$_POST['state']));

$username = trim(mysqli_real_escape_string($conn,$_POST['username']));

//$password = md5(mysqli_real_escape_string($conn, $_POST['password']));
$email = trim(mysqli_real_escape_string($conn, $_POST['email']));

// make sure the username is unique
$checkusername = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$username."'");

if(mysqli_num_rows($checkusername) == 1)
{
    echo "<h1>Error</h1>";
    echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
}
elseif(empty(trim($_POST['password']))){
    echo "Enter a password.";
}
elseif(strlen(trim($_POST['password']))<6){
    echo "The password must have at least 6 characters.";
}
else
{
    // use bcrypt for password hashing (slower algorithm than md5 and requires multiple rounds, making attacks require unfeasible amounts of resources). bcrypt accounts for salting as well (if two people have the same password, each will have a different hash). VARCHAR 255 to account for data
    $password=password_hash(trim(mysqli_real_escape_string($conn, $_POST['password'])),PASSWORD_DEFAULT);
    // insert information into users database
    $querystring = "INSERT INTO users (firstName,lastName,city,state,username, password, email, joinDate) 
                            VALUES('".$firstname."','".
        $lastname."','".
        $city."','".
        $state."','".
        $username."','".
        $password."','".
        $email."',
        NOW())";

    $registerquery = mysqli_query($conn, $querystring);

    if($registerquery)
    {
        echo "<h1>Success</h1>";
        echo "<p>Your account was successfully created. Please <a href=\"/\">click here to return to the main page.</a>.</p>";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your registration failed. Please go <a href='/register/index.php'>back</a> and try again.</p>";
    }
}
