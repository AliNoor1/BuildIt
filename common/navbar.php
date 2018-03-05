<!-- NAVIGATION BAR -->
<div class="topnav">
    <a style="background-color:#3c4b68;" href="/">
        <i class="fa fa-home"></i>
    </a>
    <a href="#">Design</a>
    <a href="#">Forums</a>
    <a href="#">Contracts</a>
    <?php
    if (!empty($_SESSION['LoggedIn']))
    {
        echo "<a style='float:right' href='#'>My Account</a>";
        echo "<a style='float:right' href='/logout/index.php'>Logout</a>";
    }
    else{
        echo "<a style='float:right' href='/login/index.php'>Login/Sign Up</a>";
    }

    ?>
</div>