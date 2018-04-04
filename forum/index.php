<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/header.php"; ?>


<!DOCTYPE html>

<html>
<head>
	<link href="../css/BuildIT_Forum_style.css" type="text/css" rel="stylesheet">
	<link href="../css/navbar.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

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
        <a class="item" href="/forum/create_topic.php">Create Topic</a> -
        <a class="item" href="/forum/create_cat.php">Create Category</a>

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
                <th>Topic</th>
				<th>Posts</th>
				<th>Author</th>
              </tr>
            <?php

                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                        <td class="category_row">
                            <a href="category.php?id=<?=$row['cat_id']?>"><?=$row['cat_name']?> Workshops</a>
                            <?=$row['cat_description']?>
                        </td>
                        <td class="topic_row">
                            <a href="topic.php?id=">Topic subject</a>
                        </td>
						<td class="posts_row">
                            <a href="#">Number of posts</a>
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
