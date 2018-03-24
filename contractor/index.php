<?php include $_SERVER['DOCUMENT_ROOT'] . "/scripts/base.php";?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/scripts/get_contractor_info.php";?>

<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];
}
elseif (!empty($_SESSION['LoggedIn']))
{
    $username = $_SESSION['username'];
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $http_query = http_build_query(array('username'=>$username));
    ?>
    <meta http-equiv='refresh' content='0;<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $http_query; ?>' />
<?php
}
else{
    header("HTTP/1.0 404 Not Found");
    die();
}
    $contractor = get_contractor_info($conn,$username);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="/css/BuildIT_User_Profile_style.css" type="text/css" rel="stylesheet">
    <link href="/css/navbar.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<title>Profile</title>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php";
var_dump($contractor)?>

<!-- PARENT CONTAINING LEFT AND RIGHT PROFILE DIVS SO THEY TAKE UP THE WHOLE PAGE EQUALLY -->
<div class="parent">
    <!-- LEFT PROFILE -->
    <div class="profileLeft">
        <!-- Profile Picture -->
        <img src="/img/users/default.jpg" alt="profile_pic">>

        <div class="userFollow">
            <a href="#"><i class="fa fa-group"></i> Follow <?=$contractor['firstname']?></a>
        </div>
        <div class="userMessage">
            <a href="#"><i class="fa fa-envelope-o"></i> Message <?=$contractor['firstname']?></a>
        </div>
    </div>
    <!-- RIGHT PROFILE -->
    <div class="profileRight">
        <div class="Name_Bio">
            <h1><?=$contractor['firstname']?> <?=$contractor['lastname']?></h1>
            <?php
            if (!empty($contractor['city']) && !empty($contractor['state'])) {
                ?>
                <div class="userLocation">
                    <p><i class="fa fa-map-marker"></i> <?=$contractor['city']?>, <?=$contractor['state']?></p>
                    <br>
                </div>
                <?php
            }
            ?>
            <?php

            if (!empty($_SESSION['LoggedIn']) && $contractor['userid'] === $_SESSION['userid']){
                if (empty($contractor['bio'])){
                    echo "<p contenteditable='true' id='bio'>Edit your bio!</p>";
                }
                else {
                    echo "<p contenteditable='true' id='bio'>" . $contractor['bio'] . "</p>";
                }
                echo "<br>";
                echo "<button type='button' id='bio-submit' style='visibility: hidden'>Save Bio Changes</Button>";
            }
            else
            {
                echo "<p> " . $contractor['bio'] . "</p>";
                echo "<br>";
            }
            ?>
        </div>

        <!-- PARENT CONTAINING USER DESIGNS AND PROJECTS DIV SO THEY ARE ON THE SAME LINE -->
        <div class="parent2">

            <div class="userDesigns">
                <h2 class="header2">Designs</h2>
            </div>

            <div class="userProjects">
                <h2 class="header2">Projects</h2>
            </div>

        </div>
        <div class="userForums">
            <h2>Forums</h2>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/js/update_bio.js"></script>

</body>

</html>