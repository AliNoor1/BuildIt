<?php include "base.php";?>

<!DOCTYPE html>
<html>

<head>
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<title>Profile</title>

<body>

    <!-- NAVIGATION BAR -->
    <div class="topnav">
        <a style="background-color:rgba(0, 0, 0, 0.40)" href="/">
            <i class="fa fa-home"></i>
        </a>
        <a href="#">Design</a>
        <a href="#">Forums</a>
        <a href="#">Contracts</a>
        <a style="float:right" href="logout.php">Sign Out</a>
    </div>

    <div class="parent">
        <!-- LEFT PROFILE -->
        <div class="profileLeft">
            <img src="/img/users/default.jpg" alt="profile_pic"></img>

            <div class="userLocation">
                <i class="fa fa-map-marker"></i>
                <p>Boulder, CO</p>

            </div>

            <div class="userEmail">
                <i class="fa fa-envelope-o"></i>
                <p><?=$_SESSION['email']?></p>

            </div>

        </div>


        <div class="profileRight">

            <div class="Name_Bio">
                <h1><?=$_SESSION['firstname']?> <?=$_SESSION['lastname']?></h1>
                <p>Bio text bio text bio text</p>
            </div>

        </div>
    </div>
<?php

}
else
{?>
    <div>
    <h1>Error</h1>
    <p>Sorry, your account could not be found. Please <a href=index.php>click here to login</a>.</p>
    </div>

        <?php
}
?>



	</body>
	
</html>
