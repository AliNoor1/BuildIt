<?php include $_SERVER['DOCUMENT_ROOT'] . "/scripts/base.php";?>

<!DOCTYPE html>
<html>
<head>
    <link href="/css/BuildIT_Forum_style.css" type="text/css" rel="stylesheet">
    <link href="/css/navbar.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<title>Forum</title>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php";?>
<h1>Forum</h1>

<div id="wrapper">
    <div id="menu">
        <a class="item" href="/forum/index.php">Home</a> -
        <a class="item" href="/forum/create_topic.php">Create a topic</a> -
        <a class="item" href="/forum/create_cat.php">Create a category</a>

    </div>

    <hr>

    <div id="content">
        <?php
        $sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            forum_categories";

        var_dump($sql);

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
              <table border="1">
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>
            <?php

                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                        <td class="leftpart">
                            <h3><a href="category.php?id=<?=$row['cat_id']?>"><?=$row['cat_name']?></a></h3>
                            <?=$row['cat_description']?>
                        </td>
                        <td class="rightpart">
                            <a href="topic.php?id=">Topic subject</a>
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