<?php include $_SERVER['DOCUMENT_ROOT'] . "/scripts/base.php";?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/scripts/get_user_info.php";?>

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
    $user = get_user_info($conn,$username);
$_GET['cat'] = 'dog';
var_dump($user);
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="../css/BuildIT_User_Profile_style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<title>Profile</title>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php";?>

<!-- PARENT CONTAINING LEFT AND RIGHT PROFILE DIVS SO THEY TAKE UP THE WHOLE PAGE EQUALLY -->
<div class="parent">
    <!-- LEFT PROFILE -->
    <div class="profileLeft">
        <!-- Profile Picture -->
        <img src="../img/users/default.jpg" alt="profile_pic"></img>

        <div class="userFollow">
            <a href="#"><i class="fa fa-group"></i> Follow <?=$user['firstname']?></a>
        </div>
        <div class="userMessage">
            <a href="#"><i class="fa fa-envelope-o"></i> Message <?=$user['firstname']?></a>
        </div>
    </div>
    <!-- RIGHT PROFILE -->
    <div class="profileRight">
        <div class="Name_Bio">
            <h1><?=$user['firstname']?> <?=$user['lastname']?></h1>
            <?php
            if (!empty($user['city']) && !empty($user['state'])) {
                ?>
                <div class="userLocation">
                    <p><i class="fa fa-map-marker"></i> <?=$user['city']?>, <?=$user['state']?></p>
                    <br></br>
                </div>
                <?php
            }
            ?>
            <p>fdinfsadfbnm fsfdinfsadfbnm fsd fs df sdf s df sdf f sd f sdf sdf sdf sd f sdf s df sdf s df sdf sdf
                sfd f a fdas f asd fa sd ffdinfsadfbnm fsd fs df sdf s df sdf f sd f sdf sdf sdf sd </p>
            <?php

            if ($user['userid'] === $_SESSION['userid']){
                echo "<button type='button'>Update Bio</Button>";
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

</body>

</html>