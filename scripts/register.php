<?php include "base.php"; ?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>User Management System (Tom Cameron for NetTuts)</title>
<link rel="stylesheet" href="../style.css" type="text/css" />
</head>
<body>
<div id="main">
    <?php
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $checkusername = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$username."'");

        if(mysqli_num_rows($checkusername) == 1)
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
        }
        else
        {
            $registerquery = mysqli_query($conn, "INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$password."', '".$email."')");
            if($registerquery)
            {
                echo "<h1>Success</h1>";
                echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
            }
            else
            {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your registration failed. Please go back and try again.</p>";
            }
        }
    }
    else
    {
        ?>

        <h1>Register</h1>

        <p>Please enter your details below to register.</p>

        <form method="post" action="register.php" name="registerform" id="registerform">
            <fieldset>
                <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
                <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
                <label for="email">Email Address:</label><input type="text" name="email" id="email" /><br />
                <input type="submit" name="register" id="register" value="Register" />
            </fieldset>
        </form>

        <?php
    }
    ?>

</div>
</body>
</html>