<?php include $_SERVER['DOCUMENT_ROOT']."/scripts/base.php"; ?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <head>
		<link href="/css/navbar.css" type="text/css" rel="stylesheet">
		<link href="/css/register.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

<title>Sign Up</title>
<body>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php";?>
    
<div class="main">
    <?php
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $state = mysqli_real_escape_string($conn,$_POST['state']);

        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $checkusername = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$username."'");

        if(mysqli_num_rows($checkusername) == 1)
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
        }
        else
        {
            $querystring = "INSERT INTO users (firstName,lastName,city,state,username, password, email, joinDate) 
                            VALUES('".$firstname."','".$lastname."','".$city."','".$state."','".$username."','".$password."','".$email."',NOW())";
            var_dump($querystring);

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
    }
    else
    {
        ?>

        <h1>Create an Account</h1>

        <p>Signing up is free and easy. You gain access to our forums page and can share projects or 
		designs with other users.</p>

        <form method="post" action="index.php" name="registerform" class="registerform">
            
                <label for="firstname">First Name:</label><input type="text" name="firstname" id="firstname" /><br />
                <label for="lastname">Last Name:</label><input type="text" name="lastname" id="lastname" /><br />
                <label for="city">City:</label><input type="text" name="city" id="city" /><br />
                <label for="state">State:</label><input type="text" name="state" id="state" /><br />
                <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
                <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
                <label for="email">Email Address:</label><input type="text" name="email" id="email" /><br />
                <input type="submit" name="register" id="register" value="Sign Up" />
                       
        </form>

        <?php
    }
    ?>

</div>
</body>
</html>