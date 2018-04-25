<?php include $_SERVER['DOCUMENT_ROOT']."/scripts/base.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/scripts/get_user_info.php"?>
<?php include $_SERVER['DOCUMENT_ROOT']."/scripts/get_contractor_info.php"?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<title>Login</title>
<body>
<div id="main">

    <?php
//    check if user is logged in
    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username']))
    {
        echo "<meta http-equiv='refresh' content='0;/user/' />";
    }

    elseif (!empty($_POST['username']) && !empty($_POST['password']) && $_POST['usertype'] == "builder") {
        include $_SERVER['DOCUMENT_ROOT'] . "/scripts/login_user.php";
    }
    elseif (!empty($_POST['username']) && !empty($_POST['password']) && $_POST['usertype'] == "contractor") {
        include $_SERVER['DOCUMENT_ROOT'] . "/scripts/login_contractor.php";

    }
    else
    {
    ?>

   <h1>Member Login</h1>

   <p>Thanks for visiting! Please either login below, or <a href="/register/index.php">click here to register</a>.</p>

    <form method="post" action="/login/index.php" name="loginform" id="loginform">
    <fieldset>
        <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
        <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
        <div>
            <input type="radio" id="builder"
                   name="usertype" value="builder" checked="checked">
            <label for="builder">Builder</label>

            <input type="radio" id="contractor"
                   name="usertype" value="contractor">
            <label for="contractor">Contractor</label>
        </div>
        <input type="submit" name="login" id="login" value="Login" />
    </fieldset>
    </form>

    <?php
}
?>

</div>
</body>
</html>
