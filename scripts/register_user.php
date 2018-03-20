<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 3/19/18
 * Time: 9:47 PM
 */

// grab things from the post fields in the register form
$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
$city = mysqli_real_escape_string($conn,$_POST['city']);
$state = mysqli_real_escape_string($conn,$_POST['state']);

$username = mysqli_real_escape_string($conn,$_POST['username']);

// encrypt password using md5
$password = md5(mysqli_real_escape_string($conn, $_POST['password']));
$email = mysqli_real_escape_string($conn, $_POST['email']);

// make sure the username is unique
$checkusername = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$username."'");

if(mysqli_num_rows($checkusername) == 1)
{
    echo "<h1>Error</h1>";
    echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
}
else
{
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
        echo "<p>Your account was successfully created. Please <a href=\"/login/index.php\">click here to login</a>.</p>";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your registration failed. Please go back and try again.</p>";
    }
}
