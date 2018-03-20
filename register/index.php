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
        include $_SERVER['DOCUMENT_ROOT']."/scripts/register_user.php";
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
