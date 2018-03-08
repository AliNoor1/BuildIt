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
        echo "<a style='float:right' href='/user/index.php?username=".$_SESSION['username']."'>".$_SESSION['firstname']."</a>";
        echo "<a style='float:right' href='/logout/index.php'>Logout</a>";
    }
    else{
        echo "<a style='float:right' href='/login/index.php'>Login/Sign Up</a>";
    }

    ?>
    <div class="search-container">
        <form method="get" action="/search/" id="searchform">
            <input type="text" placeholder="Search..." name="query">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>