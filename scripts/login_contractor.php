<?php
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password'])); /* Need to switch from MD5 to more secure algorithm */

    $login_query = "SELECT * FROM contractors WHERE username = '".$username."' AND password = '".$password."'";
    $checklogin = mysqli_query($conn, $login_query);

    if(mysqli_num_rows($checklogin) == 1)
    {
        $row = mysqli_fetch_array($checklogin);
        $email = $row['email'];

        update_session_info_contractor($conn, $username);
        $_SESSION['LoggedIn'] = 1;
        $_SESSION['usertype'] = 'contractor';

        echo "<meta http-equiv='refresh' content='0;/contractor/' />";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"/login/index.php\">click here to try again</a>.</p>";
    }