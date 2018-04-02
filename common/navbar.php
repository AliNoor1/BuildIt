	<!-- NAVIGATION BAR -->
<div class="topnav">
    <a class="homeButton" href="/">
        <i class="fa fa-home"></i>
    </a>
    <a class="topLinks" href="/design-page/">Design</a>
    <a class="topLinks" href="#">Forums</a>
    <a class="topLinks" href="#">Contracts</a>

    <?php
    if (!empty($_SESSION['LoggedIn']))
    {
        echo "<a class=\"topLinks\" style='float:right' href='/user/index.php?username=".$_SESSION['username']."'>".$_SESSION['firstname']."</a>";
        echo "<a class=\"topLinks\" style='float:right' href='/logout/index.php'>Logout</a>";
    }
    else{
        echo "<a class=\"login_signup\" href='/login/index.php'><i class=\"fa fa-user-circle\"></i></a>";
    }
    ?>
	
    <div class="search-container">
        <form method="get" action="/search/" id="searchform">
            <input type="text" placeholder="Search..." name="query">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
