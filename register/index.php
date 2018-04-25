<?php include $_SERVER['DOCUMENT_ROOT']."/scripts/base.php"; ?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <head>
		<link href="/css/navbar.css" type="text/css" rel="stylesheet">
		<link href="/css/register.css" type="text/css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
//            todo - there's a bug here.
            $(document).ready(function(){
                $(".contractor-only").hide();
                $('input[type=radio][name=usertype]').change( function(){
                    $(".contractor-only").toggle();
                });
            });

        </script>
	</head>

<title>Sign Up</title>
<body>
    <!--NAVBAR-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php";?>
    
<div class="main">
    <?php
    if(!empty($_POST['username']) && !empty($_POST['password']) && $_POST['usertype'] == "builder")
    {
        include $_SERVER['DOCUMENT_ROOT']."/scripts/register_user.php";
    }
    elseif (!empty($_POST['username']) && !empty($_POST['password']) && $_POST['usertype'] == "contractor")
    {
        include $_SERVER['DOCUMENT_ROOT']."/scripts/register_contractor.php";
    }
    else
    {
        ?>

        <h1>Create an Account</h1>

        <p>Signing up is free and easy. You gain access to our forums page and can share projects or 
		designs with other users.</p>

        <form method="post" action="index.php" name="registerform" class="registerform">
                <div>
                    <input type="radio" id="builder"
                           name="usertype" value="builder" checked="checked">
                    <label for="builder">Builder</label>

                    <input type="radio" id="contractor"
                           name="usertype" value="contractor">
                    <label for="contractor">Contractor</label>
                </div>

                <div class="register-input">
                    <div class="contractor-only">
                        <label for="company">Company Name:</label>
                        <input type="text" name="company"/><br/>
                    </div>

                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname"/><br/>

                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname"/><br/>

                    <div class="contractor-only">
                        <label for="address1">Address Line 1:</label>
                        <input type="text" name="address1"/><br/>

                        <label for="address2">Address Line 2:</label>
                        <input type="text" name="address2"/><br/>
                    </div>

                    <label for="city">City:</label>
                    <input type="text" name="city"/><br/>

                    <label for="state">State:</label>
                    <input type="text" name="state"/><br/>

                    <label for="username">Username:</label>
                    <input type="text" name="username"/><br/>

                    <label for="password">Password:</label>
                    <input type="password" name="password"/><br/>

                    <label for="email">Email Address:</label>
                    <input type="text" name="email"/><br/>

                    <div class="contractor-only">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone"/><br/>
                    </div>
                </div>

                <input type="submit" name="register" id="register" value="Sign Up" />
                       
        </form>

        <?php
    }
    ?>

</div>
    <?php include $_SERVER['DOCUMENT_ROOT']."/common/footer.php";?>

</body>
</html>
