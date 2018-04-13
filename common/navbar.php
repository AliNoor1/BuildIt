    <!-- NAVIGATION BAR -->
<head>
  <link href="/css/login.css" type="text/css" rel="stylesheet">
  <link href="/css/navbar.css" type="text/css" rel="stylesheet">
</head>

<div class="topnav">
    <a class="homeButton" href="/">
        <i class="fa fa-home"></i>
    </a>
    <a class="topLinks" href="/design-page/">Design</a>
    <a class="topLinks" href="/forum/">Forums</a>
    <a class="topLinks" href="/contracts/">Contracts</a>

    <?php
    if (!empty($_SESSION['LoggedIn']))
    {
        if($_SESSION['usertype'] == 'builder') {
            echo "<a class=\"topLinks\" style='float:right' href='/user/index.php?username=" . $_SESSION['username'] . "'>" . $_SESSION['firstname'] . "</a>";
        }
        elseif($_SESSION['usertype'] == 'contractor'){
            echo "<a class=\"topLinks\" style='float:right' href='/contractor/index.php?username=" . $_SESSION['username'] . "'>" . $_SESSION['firstname'] . "</a>";
        }
        echo "<a class=\"topLinks\" style='float:right' href='/logout/index.php'>Logout</a>";
    }
    else{
        echo "<a class=\"login_signup\" onclick=\"document.getElementById('id01').style.display='block'\" style=\"width:auto;\"><i class=\"fa fa-user-circle\"></i></a>
              <div id=\"id01\" class=\"modal\">
              <span onclick=\"document.getElementById('id01').style.display='none'\" class=\"close\" title=\"Close Modal\">&times;</span>
                  <form class=\"modal-content\" name=\"modal-content\" method=\"post\" action=\"/login/index.php\">
                      <div class=\"login-input\" style=\"text-align:center; border-radius: 20px; border-top: 5px solid #898989; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);\">
                          <h1 id=desc_header style=\"font-size:50px\">Sign In</h1>
                          <p style=\"font-size:22px\">If you do not have an account, click <a href=\"/register/index.php\">here to register</a></p>
                          
						  
						  <label for=\"username\"><b>Username:</b></label>
                          <input type=\"username\" placeholder=\"Enter Username\" style=\"margin: 10px; border: 1px solid #898989; width: 100px; border-radius: 4px;\" name=\"username\" required>
                          </br>
                          <label for=\"password\"><b>Password:</b></label>
                          <input type=\"password\" placeholder=\"Enter Password\" style=\"margin: 10px; border: 1px solid #898989; width: 100px; border-radius: 4px;\" name=\"password\" required>
                          </br>
                          
						  <label for=\"checkbox\">
                          <input type=\"checkbox\" checked=\"checked\" name=\"remember\" style=\"margin-bottom:15px;\"> Remember me
                          </label>
                          </br>
						  
						  <div>
                              <input type=\"radio\" id=\"builder\" 
                                  name=\"usertype\" value=\"builder\" checked=\"checked\">
                              <label for=\"builder\">Builder</label>

                              <input type=\"radio\" id=\"contractor\"
                                  name=\"usertype\" value=\"contractor\">
                              <label for=\"contractor\">Contractor</label>
                          </div>
						  
						  
						  <div class=\"clearfix\">
                              <input type=\"submit\" name=\"login\" id=\"login\" value=\"Login\" />
                          </div>
						  
                      </div>
                      
					  
                  </form>
              </div>
              <script>    
              // Get the modal
              var modal = document.getElementById('id01');

              // When the user clicks anywhere outside of the modal, close it
              window.onclick = function(event) {
                  if (event.target == modal) {
                      modal.style.display = \"none\";
                  }
              }
              </script>";
    }
    ?>
    
    <div class="search-container">
        <form method="get" action="/search/" id="searchform">
            <input type="text" placeholder="Search..." name="query">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>