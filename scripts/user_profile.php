<?php include "base.php";?>

<!DOCTYPE html>
<html>

<head>
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<title>Profile</title>

<body>

<?php

if($_SESSION['LoggedIn'])
{
    $username = $_SESSION['username'];

    $user_query = "SELECT * FROM users WHERE username = '".$username."'";
    $userinfo = mysqli_query($conn, $user_query);

    $row = mysqli_fetch_array($userinfo);
    $_SESSION['firstname'] = $row['firstName'];
    $_SESSION['lastname'] = $row['lastName'];
    ?>


    <!-- NAVIGATION BAR -->
    <div class="topnav">
        <a style="background-color:rgba(0, 0, 0, 0.40)" href="file:///C:/Users/Ali/Desktop/Buildit/BuildIt-master/BuildIT_attempt2.html">
            <img src="http://aperatifdurum.890m.com/images/homepageicon.png" alt="home" style="width:18px;height:18px;border:0;"></img></a>
        <a href="#">Design</a>
        <a href="#">Forums</a>
        <a href="#">Contracts</a>
        <a style="float:right" href="logout.php">Sign Out</a>
    </div>
    <div class="parent">
        <!-- LEFT PROFILE -->
        <div class="profileLeft">
            <img src="http://ishowmy.support/img/user-icon-360x360.jpg" alt="profile_pic"></img>

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
                <p>fdinfsadfbnm fsfdinfsadfbnm fsd fs df sdf s df sdf f sd f sdf sdf sdf sd f sdf s df sdf s df sdf sdf  sfd f a fdas f asd fa sd ffdinfsadfbnm fsd fs df sdf s df sdf f sd f sdf sdf sdf sd </p>

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
