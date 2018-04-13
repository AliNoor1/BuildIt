<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/header.php"; ?>


<!DOCTYPE html>

<html>
<head>
	<link href="../css/BuildIT_Forum_style.css" type="text/css" rel="stylesheet">
	<link href="../css/navbar.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div id="bread">
    <ul>
        <li class="active-bread"><a href="#">Forum</a></li>
    </ul>
</div>
<h1 class="header">Forums</h1>
	<div class="search-forum">
        <form method="get" action="/search/" id="searchform">
            <input type="text" placeholder="Search..." name="query">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

<div class="wrapper">
    <div class="menu">
        <a class="item" href="/forum/index.php">Home</a> -
        <a class="item" href="/forum/create_topic.php">Create Topic</a>
        <?php if ($_SESSION['admin']==1) {
            echo"-
        <a class=\"item\" href=\"/forum/create_cat.php\">Create Category</a>
        ";
        }
        ?>

    </div>

    <hr>

    <div class="content">
        <?php
        $sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            forum_categories";

        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
            echo 'The categories could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'No categories defined yet.';
            }
            else
            {
                ?>
<!--                //prepare the table-->
              <table class="ftable">
              <tr>
                <th>Category</th>
				<th>Topics</th>
				<th>Author</th>
              </tr>
            <?php

                while($row = mysqli_fetch_assoc($result))
                {
                    $querystring = "
                  select count(forum_topics.topic_id) as cnt from forum_topics
                    inner join forum_categories on forum_categories.cat_id=forum_topics.topic_cat
                    where forum_categories.cat_name like '". $row['cat_name'] . "';";
                    $count_cat_query = mysqli_query($conn, $querystring) or die(mysqli_error($conn));
                    $cat_cnt = mysqli_fetch_array($count_cat_query)['cnt'];
                    ?>
                    <tr>
                        <td class="category_row">
                            <a href="category.php?cat_id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a>
                            <br><?=$row['cat_description']?>
                        </td>
						<td class="posts_row">
                            <a href="category.php?cat_id=<?=$row['cat_id']?>"><?=$cat_cnt?></a>
                        </td>
						<td class="author_row">
                            <a href="#"><img class= "imageForum" src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" alt="profile_img"> John Doe</a>
                        </td>
                    </tr>
        <?php
                }
            }
        }
        ?>
    </div>
</div>

</body>

</html>


<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/footer.php"; ?>
