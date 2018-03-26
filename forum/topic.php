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
<div>
<?php
//first select the category based on $_GET['cat_id']
$sql = "SELECT
            topic_id,
            topic_subject
        FROM
            forum_topics
        WHERE
            forum_topics.topic_id = '" . mysqli_real_escape_string($conn, $_GET['id']) . ";'";

$result = mysqli_query($conn, $sql);

if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysqli_error($conn);
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {

        //do a query for the topics
        $sql = "SELECT
                    forum_posts.post_topic,
                    forum_posts.post_content,
                    forum_posts.post_date,
                    forum_posts.post_by,
                    forum_posts.post_topic,
                    users.userID,
                    users.username
                FROM
                    forum_posts
                LEFT JOIN
                    users
                ON
                    forum_posts.post_by = users.userID
                WHERE
                    forum_posts.post_topic = " . mysqli_real_escape_string($conn, $_GET['id']) . "";


        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
            echo 'This topic could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'This post does not seem to exists.';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
                      <th>Post</th>
                      <th>Created at</th>
                      <th>User</th>

                      </tr>';

                while($row = mysqli_fetch_assoc($result))
                {

                ?>
                <tr>
                    <td class="leftpart">
                        <h3><?=$row['post_content']?></h3>
                    </td>
                    <td class="rightpart">
                        <?php echo date('d-m-Y', strtotime($row['post_date'])); ?>
                    </td>
                    <td class="username">
                        <h3><?=$row['username']?></h3>
                    </td>
                </tr>
                </div>
                   <?php } ?>

                <div>
                    <form method="post" action="reply.php?id=<?=$_GET['id']?>">
                        <textarea name="reply-content"></textarea>
                        <input type="submit" value="Submit reply" />
                    </form>
                </div>
                <?php

            }
        }
    }
}
?>

</body>
</html>

