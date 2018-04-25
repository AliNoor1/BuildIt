<?php
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    $login_query = "SELECT * FROM contractors WHERE username = '".$username."'";
    $checklogin = mysqli_query($conn, $login_query);

    if(mysqli_num_rows($checklogin) == 1)
    {
        $row = mysqli_fetch_array($checklogin);
        if(password_verify($password,$row['password'])){
            echo "Password verified";
            $email=$row['email'];
            update_session_info_contractor($conn, $username);
            $_SESSION['LoggedIn'] = 1;
            $_SESSION['usertype'] = 'contractor';
            echo "<meta http-equiv='refresh' content='0;/contractor/' />";
        }
        else{
            echo "Wrong password. Please <a href=\"/\">click here to return to the main page.</a>.</p>";
        }
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"/\">click here to return to the main page.</a>.</p>";
    }